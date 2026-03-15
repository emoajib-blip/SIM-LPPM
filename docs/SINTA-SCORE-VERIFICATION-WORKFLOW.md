# SINTA Score Manual Input & Verification Workflow Analysis

**Date:** 15 Maret 2026  
**Status:** Analysis & Recommendation  
**Scope:** Manual SINTA Score Input by Dosen + Admin LPPM Verification

---

## 1. Current System State

### 1.1 SINTA Score Data Storage

**Location:** `app/Models/Identity.php`

**Fields in `identities` table:**
```
SINTA Scores:
├─ sinta_id (string) - SINTA Author ID
├─ sinta_score_v2_overall (float) - SINTA Score V2 Overall
├─ sinta_score_v2_3yr (float) - SINTA Score V2 3-Year
├─ sinta_score_v3_overall (float) - SINTA Score V3 Overall [*Currently shown on dashboard]
├─ sinta_score_v3_3yr (float) - SINTA Score V3 3-Year
└─ affil_score_v3_overall/3yr (float) - Affiliation Scores

Google Scholar Metrics:
├─ google_scholar_id (string)
├─ gs_h_index (integer) [*Manually editable]
├─ gs_citations (integer)
├─ gs_documents (integer)
└─ gs_i10_index (integer)

Scopus Metrics:
├─ scopus_id (string)
├─ scopus_h_index (integer) [*Manually editable]
├─ scopus_citations (integer)
├─ scopus_documents (integer)
└─ scopus_i10_index (integer)

WoS Metrics:
├─ wos_id (string)
├─ wos_h_index (integer) [*Manually editable]
├─ wos_citations (integer)
├─ wos_documents (integer)
└─ wos_i10_index (integer)
```

**Status:** ✅ Fields exist and are cast properly

---

## 2. Manual Input Capability - CURRENT

### 2.1 Where Dosen Can Edit SINTA Scores

**Route:** `/settings` → Profile Tab  
**Component:** `app/Livewire/Settings/ProfileForm.php`

**Currently Editable Fields:**
```php
✅ sinta_id (string) - SINTA Author ID
✅ scopus_id (string) - Scopus Author ID
✅ google_scholar_id (string) - Google Scholar ID
✅ wos_id (string) - Web of Science ID
✅ gs_h_index (integer) - Google Scholar H-Index [*Manually input]
✅ scopus_h_index (integer) - Scopus H-Index [*Manually input]
✅ wos_h_index (integer) - WoS H-Index [*Manually input]
```

**NOT Currently Editable:**
```
❌ sinta_score_v2_overall
❌ sinta_score_v2_3yr
❌ sinta_score_v3_overall [*The 764 score you see]
❌ sinta_score_v3_3yr
❌ affil_score_v3_overall
❌ scopus_citations
❌ gs_citations
❌ wos_citations
```

**Code Evidence:**
```php
// ProfileForm.php - Line 167-187
$validated = $this->validate([
    'sinta_id' => ['nullable', 'string', 'max:255'],           // ✅ Can input
    'scopus_id' => ['nullable', 'string', 'max:255'],          // ✅ Can input
    'google_scholar_id' => ['nullable', 'string', 'max:255'],  // ✅ Can input
    'wos_id' => ['nullable', 'string', 'max:255'],             // ✅ Can input
    'scopus_h_index' => ['nullable', 'integer', 'min:0'],      // ✅ Can input
    'gs_h_index' => ['nullable', 'integer', 'min:0'],          // ✅ Can input
    'wos_h_index' => ['nullable', 'integer', 'min:0'],         // ✅ Can input
    // SINTA scores NOT in validation - NOT editable
]);
```

**Current Flow for H-Index Input:**
```
Dosen visits /settings/profile
    ↓
Sees text inputs for: scopus_h_index, gs_h_index, wos_h_index
    ↓
Enters values manually (e.g., 7)
    ↓
Clicks "Simpan Profil"
    ↓
Values saved directly to identity.scopus_h_index, etc.
    ↓
No verification step, no audit trail requirement
```

---

### 2.2 SINTA Score Import (Admin LPPM Only)

**Route:** `/admin-lppm/sync-sinta`  
**Component:** `app/Livewire/AdminLppm/SyncSinta.php`  
**Purpose:** Bulk import SINTA data from Excel

**Current Flow:**
```
Admin LPPM uploads Excel file (SINTA format)
    ↓
SintaAuthorImport processes file
    ↓
Updates identity records with:
  - sinta_id
  - sinta_score_v2_overall
  - sinta_score_v2_3yr
  - sinta_score_v3_overall [*The 764 score]
  - sinta_score_v3_3yr
    ↓
NO verification - direct update
    ↓
Data visible immediately on dashboard
```

**Issue:** Admin LPPM imports SINTA scores directly without verification

---

## 3. The Problem

### 3.1 Current State
- ✅ Dosen CAN input H-Index values manually (scopus_h_index, gs_h_index, wos_h_index)
- ✅ Admin LPPM CAN import SINTA scores via bulk upload
- ❌ Dosen CANNOT input SINTA scores manually
- ❌ No verification workflow exists
- ❌ No "pending verification" status
- ❌ No audit trail for who changed what

### 3.2 Your Question
> "Apa memungkinkan update ini diajukan dosen kemudian di verifikasi oleh admin lppm?"
> 
> "Is it possible for this update to be submitted by dosen then verified by admin lppm?"

**Answer:** ✅ **YES, it's possible.** But you need to:

1. Add SINTA score fields to dosen's editable profile form
2. Create a "verification" table/status for pending updates
3. Create admin LPPM verification interface
4. Add workflow state machine

---

## 4. Recommended Implementation

### 4.1 New Database Structure

**Create new table:** `sinta_score_submissions`

```sql
CREATE TABLE sinta_score_submissions (
    id BIGINT PRIMARY KEY,
    identity_id INT NOT NULL,
    user_id VARCHAR(36) NOT NULL,
    
    -- Submitted scores
    sinta_score_v3_overall FLOAT,
    sinta_score_v3_3yr FLOAT,
    scopus_h_index INT,
    gs_h_index INT,
    wos_h_index INT,
    
    -- Verification
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    verified_by VARCHAR(36) NULL,
    verification_notes TEXT NULL,
    verified_at TIMESTAMP NULL,
    
    -- Audit trail
    submission_notes TEXT,
    submitted_at TIMESTAMP,
    rejected_reason TEXT NULL,
    
    FOREIGN KEY (identity_id) REFERENCES identities(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (verified_by) REFERENCES users(id),
    INDEX (status, verified_by)
);
```

---

### 4.2 Workflow States

```
DOSEN SUBMITS:
    ├─ Edit /settings/profile
    ├─ New section: "SINTA & Citation Scores"
    ├─ Input fields:
    │   ├─ sinta_score_v3_overall (764)
    │   ├─ sinta_score_v3_3yr
    │   ├─ scopus_h_index (0)
    │   ├─ gs_h_index (7)
    │   └─ wos_h_index (optional)
    ├─ Click "Ajukan untuk Verifikasi"
    ├─ Submission saved to sinta_score_submissions table
    └─ Status: PENDING

        ↓

ADMIN LPPM VERIFIES:
    ├─ New page: /admin-lppm/sinta-verifications
    ├─ See "Pending Submissions" count
    ├─ Click on submission to review
    ├─ Verify numbers against SINTA website/Scopus
    ├─ Action: Approve or Reject
    │   
    │   IF APPROVE:
    │   ├─ Update identity table directly
    │   ├─ Set sinta_score_v3_overall = 764
    │   ├─ Set sinta_score_v3_3yr = ...
    │   ├─ Update status → APPROVED
    │   ├─ Add verified_by = admin_user_id
    │   ├─ Add verified_at = now()
    │   └─ Send notification to dosen
    │
    │   IF REJECT:
    │   ├─ Set status → REJECTED
    │   ├─ Add rejected_reason = "Nilai tidak sesuai dengan SINTA website"
    │   └─ Send notification with reason to dosen

        ↓

DOSEN SEES UPDATED SCORE:
    ├─ On dashboard: sinta_score_v3_overall now shows 764
    ├─ Profile shows "Verified on 15/03/2026 by Admin LPPM"
    └─ Can submit new values anytime (creates new submission)
```

---

## 5. Implementation Steps

### Step 1: Create Migration

```php
// database/migrations/YYYY_MM_DD_create_sinta_score_submissions_table.php

Schema::create('sinta_score_submissions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('identity_id')->constrained('identities');
    $table->foreignUuid('user_id')->constrained('users');
    
    // Submitted Values
    $table->float('sinta_score_v3_overall')->nullable();
    $table->float('sinta_score_v3_3yr')->nullable();
    $table->integer('scopus_h_index')->nullable();
    $table->integer('gs_h_index')->nullable();
    $table->integer('wos_h_index')->nullable();
    
    // Verification
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->foreignUuid('verified_by')->nullable()->constrained('users');
    $table->text('verification_notes')->nullable();
    $table->timestamp('verified_at')->nullable();
    $table->text('submission_notes')->nullable();
    
    // Rejection reason
    $table->text('rejected_reason')->nullable();
    
    // Timestamps
    $table->timestamps();
    
    // Indexes
    $table->index('status');
    $table->index(['user_id', 'status']);
});
```

### Step 2: Create Model

```php
// app/Models/SintaScoreSubmission.php

class SintaScoreSubmission extends Model
{
    protected $fillable = [
        'identity_id', 'user_id', 'sinta_score_v3_overall', 
        'sinta_score_v3_3yr', 'scopus_h_index', 'gs_h_index', 'wos_h_index',
        'status', 'verified_by', 'verification_notes', 'verified_at',
        'submission_notes', 'rejected_reason'
    ];

    protected $casts = [
        'sinta_score_v3_overall' => 'float',
        'sinta_score_v3_3yr' => 'float',
        'verified_at' => 'datetime',
    ];

    public function identity() {
        return $this->belongsTo(Identity::class);
    }

    public function submitter() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier() {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
```

### Step 3: Update ProfileForm Component

Add to form:
```php
public float $sinta_score_v3_overall = 0;
public float $sinta_score_v3_3yr = 0;

public function submitSintaScores(): void
{
    $validated = $this->validate([
        'sinta_score_v3_overall' => ['required', 'numeric', 'min:0'],
        'sinta_score_v3_3yr' => ['required', 'numeric', 'min:0'],
    ]);

    $user = Auth::user();
    
    // Create submission record
    SintaScoreSubmission::create([
        'identity_id' => $user->identity->id,
        'user_id' => $user->id,
        'sinta_score_v3_overall' => $validated['sinta_score_v3_overall'],
        'sinta_score_v3_3yr' => $validated['sinta_score_v3_3yr'],
        'status' => 'pending',
        'submission_notes' => "Submitted on " . now()->format('d/m/Y'),
    ]);

    $this->toastSuccess('Skor SINTA diajukan untuk verifikasi.');
}
```

### Step 4: Create Admin LPPM Verification Component

```php
// app/Livewire/AdminLppm/VerifySintaScores.php

class VerifySintaScores extends Component
{
    public array $editing = [];

    #[Computed]
    public function pendingSubmissions()
    {
        return SintaScoreSubmission::where('status', 'pending')
            ->with(['submitter', 'identity.user'])
            ->latest()
            ->get();
    }

    public function approveSintaScore(int $submissionId): void
    {
        $submission = SintaScoreSubmission::findOrFail($submissionId);
        
        // Update identity with new scores
        $submission->identity->update([
            'sinta_score_v3_overall' => $submission->sinta_score_v3_overall,
            'sinta_score_v3_3yr' => $submission->sinta_score_v3_3yr,
            'scopus_h_index' => $submission->scopus_h_index,
            'gs_h_index' => $submission->gs_h_index,
            'wos_h_index' => $submission->wos_h_index,
        ]);

        // Mark submission as approved
        $submission->update([
            'status' => 'approved',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
        ]);

        // Send notification to dosen
        $submission->submitter->notify(new SintaScoreApproved($submission));

        $this->toastSuccess('Skor SINTA diterima dan diperbarui.');
    }

    public function rejectSintaScore(int $submissionId, string $reason): void
    {
        $submission = SintaScoreSubmission::findOrFail($submissionId);

        $submission->update([
            'status' => 'rejected',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'rejected_reason' => $reason,
        ]);

        // Send notification with rejection reason
        $submission->submitter->notify(new SintaScoreRejected($submission, $reason));

        $this->toastSuccess('Pengajuan ditolak.');
    }
}
```

### Step 5: Create Routes

```php
// routes/web.php - Admin LPPM group

Route::middleware(['role:admin lppm'])->group(function () {
    Route::get('sinta-verifications', VerifySintaScores::class)
        ->name('sinta-verifications');
});
```

---

## 6. View Components

### 6.1 Dosen's Profile - SINTA Score Section

**Location:** `resources/views/livewire/settings/profile-form.blade.php`

Add new section:
```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">SINTA & Citation Scores</h3>
        <p class="text-muted">Nilai penelitian dari platform internasional</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SINTA Score V3 Overall</label>
                    <input type="number" step="0.01" 
                        wire:model="sinta_score_v3_overall"
                        class="form-control" 
                        placeholder="Contoh: 764">
                    <small class="text-muted">Dari website SINTA Kemenristekdikti</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">SINTA Score V3 3-Year</label>
                    <input type="number" step="0.01" 
                        wire:model="sinta_score_v3_3yr"
                        class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Scopus H-Index</label>
                    <input type="number" wire:model="scopus_h_index"
                        class="form-control" placeholder="0">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Google Scholar H-Index</label>
                    <input type="number" wire:model="gs_h_index"
                        class="form-control" placeholder="7">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Web of Science H-Index</label>
                    <input type="number" wire:model="wos_h_index"
                        class="form-control">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" wire:click="submitSintaScores">
            <x-lucide-send class="icon" />
            Ajukan untuk Verifikasi
        </button>
        <small class="text-muted d-block mt-2">
            ℹ️ Admin LPPM akan memverifikasi nilai sebelum diperbarui
        </small>
    </div>
</div>
```

### 6.2 Admin LPPM - Verification Dashboard

**Location:** New file `resources/views/livewire/admin-lppm/verify-sinta-scores.blade.php`

```blade
<div>
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header">
                <h1>Verifikasi SINTA Score</h1>
            </div>

            <!-- Stats -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat">
                                <span class="stat-title">Menunggu Verifikasi</span>
                                <span class="stat-value">{{ count($this->pendingSubmissions) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Dosen</th>
                                <th>SINTA V3 Overall</th>
                                <th>Scopus H-Index</th>
                                <th>GS H-Index</th>
                                <th>Tanggal Ajukan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->pendingSubmissions as $submission)
                                <tr>
                                    <td>{{ $submission->submitter->name }}</td>
                                    <td>{{ $submission->sinta_score_v3_overall }}</td>
                                    <td>{{ $submission->scopus_h_index ?? '-' }}</td>
                                    <td>{{ $submission->gs_h_index ?? '-' }}</td>
                                    <td>{{ $submission->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-list gap-2">
                                            <button class="btn btn-sm btn-success"
                                                wire:click="approveSintaScore({{ $submission->id }})">
                                                <x-lucide-check class="icon" />
                                                Setujui
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="showRejectModal({{ $submission->id }})">
                                                <x-lucide-x class="icon" />
                                                Tolak
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
```

---

## 7. Benefits of This Approach

### For Dosen:
```
✅ Can update SINTA scores anytime
✅ Transparent process - see submission status
✅ No need to contact IT for score updates
✅ Scores verified before going live
```

### For Admin LPPM:
```
✅ Central place to review all submissions
✅ Audit trail of who approved what
✅ Batch verification possible
✅ Quality control over data accuracy
```

### For Institution:
```
✅ Verified, accurate SINTA data
✅ Audit trail for compliance
✅ Reduced data entry errors
✅ Dashboard shows only verified scores
```

---

## 8. Implementation Timeline

| Phase | Task | Est. Time |
|-------|------|-----------|
| 1 | Create migration & model | 30 min |
| 2 | Update ProfileForm component | 45 min |
| 3 | Create VerifySintaScores component | 60 min |
| 4 | Add verification views | 45 min |
| 5 | Create notifications | 30 min |
| 6 | Add routes & permissions | 15 min |
| 7 | Testing | 60 min |
| **TOTAL** | | **4.5 hours** |

---

## 9. Next Steps

### Option 1: Implement Full Verification Workflow
- Create `SintaScoreSubmission` table
- Add fields to profile form
- Build verification component
- **Time: 4-5 hours**

### Option 2: Simple Approach - Make SINTA Scores Directly Editable
- Add `sinta_score_v3_overall` to ProfileForm validation
- Let dosen edit directly (no verification)
- Keep current admin import for bulk updates
- **Time: 30 minutes**
- **Trade-off: No verification, potential data quality issues**

### Option 3: Hybrid - Admin Approval Required
- Dosen submits, needs admin approval to apply
- Similar to Option 1 but simpler UI
- **Time: 2-3 hours**

---

## 10. Conclusion

**Question:** Apakah bisa dosen submit dan admin verify?  
**Answer:** ✅ **Ya, sangat memungkinkan.**

**Recommended:** Implement **Option 1 (Full Verification Workflow)** because:
- Ensures data accuracy
- Maintains audit trail
- Separates submission from activation
- Professional workflow

**Difficulty Level:** Moderate (requires new table, component, and workflow)

---

> **"The 764 SINTA Score is currently admin-only. Let's empower dosen while keeping admins in control."**

