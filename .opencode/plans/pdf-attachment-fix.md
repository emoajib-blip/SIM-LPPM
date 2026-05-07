# Fix: Lampiran PDF Tidak Muncul (Cache Stale Bug)

## Root Cause Analysis

### Bug Location
`app/Services/ProposalPdfService.php` - Lines 28-48

### The Problem
Cache invalidation logic menghitung `latestTimestamp` dari:
- `$proposal->updated_at`
- `substance_file` media
- `approval_file` media

**TAPI** tidak menghitung timestamp dari `commitment_letter` di partners, yang menyebabkan PDF cache tidak invalidate ketika mitra baru upload surat kesediaan.

```php
// Line 30-38 - HANYA cek substance & approval
$collections = ['substance_file', 'approval_file'];
foreach ($collections as $col) {
    $detailable = $proposal->detailable;
    $media = $detailable->getMedia($col)->first();
    if ($media) {
        $latestTimestamp = max($latestTimestamp, $media->updated_at->timestamp);
    }
}
```

### Impact
- Semua proposal yang sudah di-generate PDF-nya sebelumnya akan menggunakan versi cache lama
- Upload baru dari dosen/mitra tidak akan muncul di PDF export/preview

---

## Implementation Plan

### Step 1: Fix Cache Invalidation (Critical)
**File:** `app/Services/ProposalPdfService.php`
**Location:** After line 38 (after partner timestamp loop)

**Change:**
Tambahkan pengecekan timestamp untuk `commitment_letter` dari semua partners:

```php
// Line 40-48 (already exists but may need fixing)
// Check partner commitment letters
foreach ($proposal->partners as $partner) {
    $commitment = $partner->getMedia('commitment_letter')
        ->where('custom_properties.proposal_id', $proposal->id)
        ->first();
    if ($commitment) {
        $latestTimestamp = max($latestTimestamp, $commitment->updated_at->timestamp);
    }
}
```

**Note:** Code ini SUDAH ADA di line 40-48. Namun perlu dicek apakah `custom_properties.proposal_id` match dengan benar. Jika tidak, timestamp tidak akan terdeteksi.

---

### Step 2: Add Diagnostic Logging (Debug)
**File:** `app/Services/ProposalPdfService.php`
**Purpose:** Memastikan semua file terdeteksi dengan path yang benar

**Add logging at:**
- Line 293 (substance file check)
- Line 316 (commitment letter check)
- Line 273 (approval file check)

**Example:**
```php
// Before line 293
if ($substanceFile) {
    Log::debug('Substance file found for proposal ' . $proposal->id, [
        'path' => $substanceFile->getPath(),
        'exists' => file_exists($substanceFile->getPath()),
        'mime' => $substanceFile->mime_type,
    ]);
} else {
    Log::warning('Substance file NOT found for proposal ' . $proposal->id);
}
```

---

### Step 3: Clear Production Cache (Immediate Action)
**Command untuk dijalankan di server:**

```bash
# Clear all cached PDFs
rm -rf /home/simlppmi/sim-lppm/storage/app/public/pdf_cache/proposals/*

# Regenerate one proposal manually (via dashboard atau tinker)
php artisan tinker
$proposal = \App\Models\Proposal::find('UUID_PROPOSAL');
app(\App\Services\ProposalPdfService::class)->export($proposal, true);
```

---

### Step 4: Verify Fix
**Test scenario:**
1. Upload file PDF baru di proposal (substance atau commitment letter)
2. Export PDF
3. Cek apakah file baru muncul di hasil export
4. Cek log untuk diagnostic messages

---

## Risk Assessment

| Step | Risk Level | Impact | Reversibility |
|------|------------|--------|---------------|
| 1. Cache fix | Low | High | Easy (git revert) |
| 2. Diagnostic logging | None | Low | Trivial |
| 3. Clear cache | Medium | Critical | None (cache akan regenerate) |
| 4. Verify | None | N/A | N/A |

**Recommendation:** Deploy step 1 & 2 dulu, lalu clear cache (step 3) setelah verified di staging/localhost.

---

## Timeline Estimate
- **Step 1:** 5 menit
- **Step 2:** 10 menit
- **Step 3:** 2 menit (manual action)
- **Step 4:** 10 menit (testing)
- **Total:** ~30 menit

---

## Additional Notes

### Why Log Empty?
Log production kosong karena:
1. File tidak terdeteksi (retrieval issue) - bukan FPDI error
2. Cache lama masih valid (timestamp tidak berubah)
3. File path tidak resolve dengan benar di production environment

### Custom Properties Check
Pastikan `custom_properties.proposal_id` di database benar-benar match dengan UUID proposal. Cek dengan:
```sql
SELECT model_id, custom_properties FROM media 
WHERE collection_name = 'commitment_letter' 
AND model_type = 'App\Models\Partner';
```

Jika `custom_properties` kosong atau format salah, filter di `ProposalPdfService` tidak akan match.
