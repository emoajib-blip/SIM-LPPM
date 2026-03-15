# SINTA Score Management - Current Capabilities vs Desired Features

**Analysis Date:** 15 Maret 2026  
**Status:** Ready for Implementation  

---

## Executive Summary

**Your Question:**
> "Dosen masih bisa input manual. SINTA Score Overall 764. Algoritma SINTA v3 Overall Score. Apakah memungkinkan update ini diajukan dosen kemudian di verifikasi oleh admin lppm?"

**Answer:** ✅ **YES** - Fully possible and recommended.

---

## Current State (What Works Now)

### ✅ What Dosen CAN Do

**Location:** `/settings` → Profile Tab

| Field | Type | Current | Editable |
|-------|------|---------|----------|
| SINTA Author ID | Text | `sinta_id` | ✅ Yes |
| Scopus Author ID | Text | `scopus_id` | ✅ Yes |
| Google Scholar ID | Text | `google_scholar_id` | ✅ Yes |
| Web of Science ID | Text | `wos_id` | ✅ Yes |
| **Scopus H-Index** | Number | `0` | ✅ Yes |
| **Google Scholar H-Index** | Number | `7` | ✅ Yes |
| **WoS H-Index** | Number | `-` | ✅ Yes |

### ❌ What Dosen CANNOT Do

| Field | Type | Current | Can Edit |
|-------|------|---------|----------|
| **SINTA Score V3 Overall** | Float | `764` | ❌ **No** |
| **SINTA Score V3 3-Year** | Float | `-` | ❌ **No** |
| SINTA Score V2 Overall | Float | `-` | ❌ **No** |
| Scopus Citations | Int | `0` | ❌ **No** |
| Google Scholar Citations | Int | `(not visible)` | ❌ **No** |

---

## Current Admin Capabilities

### ✅ What Admin LPPM CAN Do

**Route:** `/admin-lppm/sync-sinta`

**Current Process:**
```
1. Download SINTA data from Kemenristekdikti website
2. Prepare Excel file with format:
   - Column A: SINTA ID
   - Column M: SINTA Score V3 Overall (the 764 value)
   - Column N: SINTA Score V3 3-Year
   - ... other columns
3. Upload file on /admin-lppm/sync-sinta
4. System auto-imports to identity table
5. Data goes LIVE immediately
```

**Issue:** ⚠️ No verification step, direct database update

---

## The Problem You've Identified

### Current Flow (Bad)
```
Admin LPPM imports Excel
    ↓
Data updates identity table directly
    ↓
No verification
    ↓
Dashboard shows 764 immediately
    ↓
Potential for data errors (typos, wrong file, etc.)
```

### Desired Flow (Good)
```
Dosen inputs/updates SINTA score (764)
    ↓
Submits for verification
    ↓
Admin LPPM reviews
    ↓
Checks against SINTA website
    ↓
Approves or rejects with reason
    ↓
If approved → Score goes live on dashboard
    ↓
Audit trail maintained
```

---

## Proposed Solution

### Phase 1: Enable Dosen Input (New)

**What Changes:**
```
ProfileForm component gets new fields:
├─ SINTA Score V3 Overall (number input)
├─ SINTA Score V3 3-Year (number input)
├─ Scopus H-Index (already exists, keep it)
├─ Google Scholar H-Index (already exists, keep it)
└─ "Ajukan untuk Verifikasi" button (new)
```

**User Flow:**
```
Dosen goes to /settings
    ↓
Fills in SINTA & Citation Scores section
    ├─ SINTA V3 Overall: 764
    ├─ Scopus H-Index: 0
    ├─ GS H-Index: 7
    └─ WoS H-Index: (optional)
    ↓
Clicks "Ajukan untuk Verifikasi"
    ↓
Data saved to NEW TABLE: sinta_score_submissions
    ↓
Status: PENDING (shown in orange badge)
    ↓
Toast: "Skor diajukan untuk verifikasi"
```

### Phase 2: Enable Admin Verification (New)

**What Gets Created:**
```
NEW Page: /admin-lppm/sinta-verifications
```

**Admin Sees:**
```
Dashboard with stats:
├─ Menunggu Verifikasi: 5
├─ Disetujui hari ini: 12
└─ Ditolak hari ini: 1

Table of pending submissions:
├─ Column: Dosen Name
├─ Column: SINTA V3 Overall (764)
├─ Column: Scopus H-Index (0)
├─ Column: GS H-Index (7)
├─ Column: Tanggal Ajukan (15/03/2026 14:30)
├─ Column: Actions
│   ├─ Button: Setujui ✓
│   ├─ Button: Tolak ✗
│   └─ Link: Lihat Detail
```

**Admin Actions:**
```
Click "Setujui" for John Doe (764)
    ↓
System:
  1. Updates identity table
     SET sinta_score_v3_overall = 764
  
  2. Updates submission
     SET status = 'APPROVED'
     SET verified_by = admin_user_id
     SET verified_at = 2026-03-15 14:35:00
  
  3. Sends notification to John Doe
     "Skor Anda telah diverifikasi ✓"
  
  4. Toast: "Skor SINTA diterima"

---

Click "Tolak" for Jane Smith (523)
    ↓
Shows modal to enter rejection reason:
  [Alasan Penolakan: "Nilai tidak sesuai dengan SINTA website"]
    ↓
System:
  1. Updates submission
     SET status = 'REJECTED'
     SET verified_by = admin_user_id
     SET verified_at = now()
     SET rejected_reason = "Nilai tidak sesuai dengan SINTA website"
  
  2. Sends notification to Jane
     "Pengajuan ditolak: Nilai tidak sesuai dengan SINTA website"
     "Silakan periksa dan ajukan ulang"
  
  3. Toast: "Pengajuan ditolak"
```

### Phase 3: Dosen Sees Result (Updated UI)

**On Dashboard:**
```
SINTA Score Overall: 764 ✓ VERIFIED
├─ Verified on: 15/03/2026 14:35
├─ Verified by: Admin LPPM
└─ [Ajukan Nilai Baru] button
```

**On Profile:**
```
SINTA & Citation Scores
├─ SINTA V3 Overall: 764 [APPROVED badge in green]
├─ Scopus H-Index: 0
├─ GS H-Index: 7
└─ Last Updated: 15/03/2026 14:35 by Admin LPPM
```

---

## Technical Architecture

### New Database Table

```
sinta_score_submissions
├─ id (BIGINT PRIMARY KEY)
├─ identity_id (INT FK → identities)
├─ user_id (UUID FK → users)
│
├─ sinta_score_v3_overall (FLOAT)
├─ sinta_score_v3_3yr (FLOAT)
├─ scopus_h_index (INT)
├─ gs_h_index (INT)
├─ wos_h_index (INT)
│
├─ status (ENUM: pending, approved, rejected)
├─ verified_by (UUID FK → users, nullable)
├─ verified_at (TIMESTAMP, nullable)
├─ verification_notes (TEXT)
│
├─ submission_notes (TEXT)
├─ rejected_reason (TEXT)
│
├─ created_at (TIMESTAMP)
└─ updated_at (TIMESTAMP)
```

### New Components

**1. Model: SintaScoreSubmission.php**
```
Relations:
├─ identity() - BelongsTo
├─ submitter() - BelongsTo User
└─ verifier() - BelongsTo User (verified_by)

Methods:
├─ scopedPending() - Filter status = 'pending'
├─ scopedApproved() - Filter status = 'approved'
└─ scopedRejected() - Filter status = 'rejected'
```

**2. Component: AdminLppm/VerifySintaScores.php**
```
Properties:
├─ editing (for storing modal state)

Methods:
├─ mount() - Check admin lppm role
├─ pendingSubmissions() - Computed property
├─ approveSintaScore($id)
├─ rejectSintaScore($id, $reason)

Events:
├─ dispatch('toast-success', 'Skor SINTA diterima')
└─ dispatch('toast-error', 'Pengajuan ditolak')
```

**3. Update: Livewire/Settings/ProfileForm.php**
```
New Properties:
├─ sinta_score_v3_overall (float)
├─ sinta_score_v3_3yr (float)

New Methods:
└─ submitSintaScores() - Validate and create submission

New Validation:
├─ sinta_score_v3_overall: numeric, min:0
└─ sinta_score_v3_3yr: numeric, min:0
```

### Routes

```php
// Admin LPPM only
Route::get('sinta-verifications', VerifySintaScores::class)
    ->middleware(['permission:verify_sinta_scores'])
    ->name('sinta-verifications');
```

### Permissions

```
New: verify_sinta_scores (admin lppm, superadmin)
```

---

## Comparison Table

| Feature | Current | After Update |
|---------|---------|---------------|
| Dosen inputs H-Index | ✅ | ✅ |
| Dosen inputs SINTA V3 Overall | ❌ | ✅ |
| Admin imports SINTA | ✅ | ✅ |
| Verification workflow | ❌ | ✅ |
| Audit trail | ❌ | ✅ |
| Rejection with reason | ❌ | ✅ |
| Pending status visible | ❌ | ✅ |
| Dosen notified of changes | ❌ | ✅ |

---

## Implementation Checklist

### Backend
- [ ] Create migration: `create_sinta_score_submissions_table`
- [ ] Create model: `SintaScoreSubmission`
- [ ] Create notifications: `SintaScoreApproved`, `SintaScoreRejected`
- [ ] Create component: `AdminLppm/VerifySintaScores`
- [ ] Update component: `Settings/ProfileForm`
- [ ] Add routes
- [ ] Add permission

### Frontend
- [ ] Create view: `admin-lppm/verify-sinta-scores.blade.php`
- [ ] Update view: `settings/profile-form.blade.php`
- [ ] Add SINTA score section with form fields
- [ ] Add "Ajukan untuk Verifikasi" button
- [ ] Style approval/rejection badges

### Testing
- [ ] Unit tests for VerifySintaScores component
- [ ] Unit tests for submitSintaScores method
- [ ] Integration tests for workflow
- [ ] UI tests for verification dashboard

### Documentation
- [ ] Update user manual for dosen
- [ ] Create admin guide for verification
- [ ] Update API documentation

---

## Timeline Estimate

| Phase | Task | Hours | Status |
|-------|------|-------|--------|
| 1 | Database & Model | 1 | Ready |
| 2 | Backend Components | 2 | Ready |
| 3 | Frontend Views | 1.5 | Ready |
| 4 | Routes & Permissions | 0.5 | Ready |
| 5 | Notifications | 1 | Ready |
| 6 | Testing | 1.5 | Ready |
| 7 | Documentation | 1 | Ready |
| **TOTAL** | | **8.5h** | **Ready** |

---

## Risk Assessment

### Low Risk ✅
- New table (no modification of existing tables)
- New component (no changes to existing components except ProfileForm)
- Non-breaking changes

### Medium Risk ⚠️
- ProfileForm complexity increases slightly
- Need to maintain backward compatibility with existing submissions

### Mitigation
- Comprehensive testing
- Gradual rollout (feature flag optional)
- Backup verification page for emergency use

---

## Success Criteria

After implementation:
- [ ] Dosen can submit SINTA scores
- [ ] Admin LPPM can see pending submissions
- [ ] Admin LPPM can approve/reject
- [ ] Notifications sent correctly
- [ ] Audit trail shows all actions
- [ ] Dashboard shows verified scores only
- [ ] All tests passing

---

## Final Recommendation

**Status:** ✅ **READY TO IMPLEMENT**

**Recommendation:** Proceed with full verification workflow

**Rationale:**
1. ✅ Solves your problem: Dosen can submit, admin can verify
2. ✅ Maintains data quality: No direct editing
3. ✅ Compliance: Audit trail for all changes
4. ✅ User-friendly: Clear status feedback
5. ✅ Scalable: Easy to extend for other scores

**Next Step:** Confirm implementation and start with Phase 1

---

**Documentation Complete:** ✅ Detailed Guide + Quick Reference + Current State Analysis

**Files Created:**
- `docs/SINTA-SCORE-VERIFICATION-WORKFLOW.md` (Detailed implementation guide)
- `docs/SINTA-SCORE-QUICK-REFERENCE.md` (Quick reference with diagrams)
- `docs/SINTA-SCORE-CURRENT-CAPABILITIES.md` (This file)
