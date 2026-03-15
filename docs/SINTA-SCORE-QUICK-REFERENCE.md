# SINTA Score Verification - Quick Reference

**Status:** Analysis Complete | Implementation Ready

---

## Current vs Proposed

### CURRENT STATE
```
Dosen Profile:
├─ ✅ Can edit: sinta_id, scopus_id, google_scholar_id
├─ ✅ Can edit: gs_h_index, scopus_h_index, wos_h_index
├─ ❌ Cannot edit: sinta_score_v3_overall (764)
└─ ❌ No verification workflow

Admin LPPM:
├─ ✅ Can upload SINTA Excel file
├─ Updates directly to database
└─ ❌ No verification step
```

### PROPOSED STATE
```
Dosen Profile:
├─ ✅ Can submit: sinta_score_v3_overall, sinta_score_v3_3yr
├─ ✅ Can submit: scopus_h_index, gs_h_index, wos_h_index
├─ Creates entry in sinta_score_submissions table
└─ Status: PENDING

Admin LPPM Dashboard:
├─ ✅ See "Pending Submissions" count
├─ Review dosen's submitted values
├─ Verify against SINTA website
├─ Action: APPROVE → Updates identity table
├─ Action: REJECT → Send feedback to dosen
└─ Complete audit trail
```

---

## Workflow Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                        DOSEN WORKFLOW                        │
└─────────────────────────────────────────────────────────────┘

/settings/profile
    │
    ├─ Edit Profile Info (existing)
    │
    ├─ NEW: Edit SINTA & Citation Scores
    │   ├─ SINTA V3 Overall: [_______]  (764)
    │   ├─ Scopus H-Index:   [_______]  (0)
    │   └─ GS H-Index:       [_______]  (7)
    │
    ├─ Click "Ajukan untuk Verifikasi"
    │   ↓
    │   INSERT into sinta_score_submissions (
    │       user_id, identity_id, 
    │       sinta_score_v3_overall=764,
    │       scopus_h_index=0,
    │       gs_h_index=7,
    │       status='PENDING'
    │   )
    │
    └─ Toast: "Skor diajukan untuk verifikasi"


┌─────────────────────────────────────────────────────────────┐
│                   ADMIN LPPM WORKFLOW                        │
└─────────────────────────────────────────────────────────────┘

/admin-lppm/sinta-verifications
    │
    ├─ See: "Menunggu Verifikasi: 3"
    │
    ├─ Table of pending submissions:
    │   ├─ Row 1: John Doe | 764 | 0 | 7 | 15/03/2026
    │   ├─ Row 2: Jane Smith | 523 | 5 | 12 | 15/03/2026
    │   └─ Row 3: Bob Johnson | 301 | - | 8 | 15/03/2026
    │
    ├─ Click "Setujui" for John
    │   ↓
    │   1. UPDATE identities
    │      SET sinta_score_v3_overall=764
    │
    │   2. UPDATE sinta_score_submissions
    │      SET status='APPROVED'
    │      SET verified_by=admin_id
    │      SET verified_at=now()
    │
    │   3. NOTIFY dosen
    │      "Skor Anda telah diverifikasi dan diperbarui"
    │
    └─ Toast: "Skor SINTA diterima"


┌─────────────────────────────────────────────────────────────┐
│                    DOSEN SEES RESULT                         │
└─────────────────────────────────────────────────────────────┘

Dashboard:
    ├─ SINTA Score Overall: 764 ✓ Verified
    ├─ Verified on: 15/03/2026 by Admin LPPM
    └─ "Ajukan Nilai Baru" button (to submit again)

Profile:
    ├─ Submission Status: APPROVED (green badge)
    └─ Can submit new values anytime
```

---

## Data Model

### New Table: `sinta_score_submissions`

```
┌──────────────────────────────────────────────┐
│        sinta_score_submissions               │
├──────────────────────────────────────────────┤
│ id                    │ BIGINT PRIMARY KEY   │
│ identity_id           │ INT FK               │
│ user_id               │ VARCHAR(36) FK       │
│                       │                      │
│ sinta_score_v3_overall│ FLOAT                │
│ sinta_score_v3_3yr    │ FLOAT                │
│ scopus_h_index        │ INT                  │
│ gs_h_index            │ INT                  │
│ wos_h_index           │ INT                  │
│                       │                      │
│ status                │ ENUM (pending,       │
│                       │ approved, rejected)  │
│ verified_by           │ VARCHAR(36) FK NULL  │
│ verification_notes    │ TEXT                 │
│ verified_at           │ TIMESTAMP NULL       │
│                       │                      │
│ submission_notes      │ TEXT                 │
│ rejected_reason       │ TEXT                 │
│                       │                      │
│ created_at            │ TIMESTAMP            │
│ updated_at            │ TIMESTAMP            │
└──────────────────────────────────────────────┘
```

---

## Component Files Needed

### New Components
1. **`app/Livewire/AdminLppm/VerifySintaScores.php`**
   - Display pending submissions
   - Approve/reject logic
   - ~100 lines

2. **`app/Models/SintaScoreSubmission.php`**
   - Model for submission table
   - Relations to Identity & User
   - ~50 lines

### Modified Components
1. **`app/Livewire/Settings/ProfileForm.php`**
   - Add SINTA score fields
   - Add validation
   - Add submitSintaScores() method
   - ~30 new lines

### Views (New)
1. **`resources/views/livewire/admin-lppm/verify-sinta-scores.blade.php`**
   - Verification dashboard
   - Submission table
   - Action buttons
   - ~80 lines

### Views (Modified)
1. **`resources/views/livewire/settings/profile-form.blade.php`**
   - New card for SINTA scores
   - Form fields
   - Submit button
   - ~40 new lines

---

## Permissions

### New Permission Needed
```
✅ verify_sinta_scores (admin lppm only)
```

### Existing Permissions Used
```
✅ module_profile_settings (dosen)
✅ admin_lppm (admin lppm)
```

---

## Migration Path

### Step 1: Create Database
```bash
php artisan make:migration create_sinta_score_submissions_table
php artisan migrate
```

### Step 2: Create Model
```bash
php artisan make:model SintaScoreSubmission
```

### Step 3: Add Component
```bash
php artisan make:livewire AdminLppm/VerifySintaScores
```

### Step 4: Update ProfileForm
- Add fields to component
- Add validation
- Add submitSintaScores() method

### Step 5: Create Views
- Create verification dashboard view
- Update profile form view

### Step 6: Add Routes
```php
Route::get('sinta-verifications', VerifySintaScores::class)
    ->middleware('role:admin lppm')
    ->name('sinta-verifications');
```

### Step 7: Test
```bash
php artisan test
```

---

## Notifications

### For Dosen
When admin approves:
```
📧 Subject: SINTA Score Anda Telah Diverifikasi
Body: Score Anda telah diverifikasi dan diperbarui dalam sistem.
      SINTA Score V3 Overall: 764
      Scopus H-Index: 0
      Google Scholar H-Index: 7
```

When admin rejects:
```
📧 Subject: Pengajuan SINTA Score Ditolak
Body: Pengajuan Anda ditolak karena alasan berikut:
      "Nilai tidak sesuai dengan website SINTA Kemenristekdikti"
      
      Silakan periksa kembali dan ajukan ulang.
```

---

## Implementation Effort

| Component | Lines | Time | Difficulty |
|-----------|-------|------|------------|
| Migration | 40 | 10m | Easy |
| Model | 50 | 15m | Easy |
| VerifySintaScores | 100 | 45m | Medium |
| ProfileForm Changes | 30 | 30m | Easy |
| Views | 120 | 45m | Medium |
| Routes & Permissions | 20 | 10m | Easy |
| Tests | 150 | 60m | Medium |
| **TOTAL** | **510** | **4.5h** | **Medium** |

---

## Questions & Answers

### Q: Can dosen edit SINTA scores now?
**A:** ✅ Partially - They can edit H-Index values but NOT SINTA scores directly.

### Q: Is there verification workflow now?
**A:** ❌ No - Admin uploads, data goes live immediately.

### Q: How does the proposed system work?
**A:** 
1. Dosen submits SINTA scores → saved to submissions table (PENDING)
2. Admin reviews in dashboard → approves/rejects
3. If approved → scores move to identity table (live)
4. If rejected → feedback sent to dosen

### Q: Is audit trail maintained?
**A:** ✅ Yes - Who verified, when, and what reason if rejected.

### Q: Can dosen see approval status?
**A:** ✅ Yes - Profile shows "Verified on 15/03/2026 by Admin LPPM"

### Q: How long to implement?
**A:** 4-5 hours for full feature.

---

## Files to Create/Modify

### CREATE (New Files)
```
✓ database/migrations/YYYY_MM_DD_create_sinta_score_submissions_table.php
✓ app/Models/SintaScoreSubmission.php
✓ app/Livewire/AdminLppm/VerifySintaScores.php
✓ app/Notifications/SintaScoreApproved.php
✓ app/Notifications/SintaScoreRejected.php
✓ resources/views/livewire/admin-lppm/verify-sinta-scores.blade.php
```

### MODIFY (Existing Files)
```
✓ app/Livewire/Settings/ProfileForm.php (+30 lines)
✓ resources/views/livewire/settings/profile-form.blade.php (+40 lines)
✓ routes/web.php (+5 lines)
✓ database/seeders/PermissionSeeder.php (+1 permission)
```

---

## Quick Decision Matrix

| Requirement | Current | After Update |
|-------------|---------|---------------|
| Dosen can input SINTA scores | ❌ | ✅ |
| Admin can verify | ❌ | ✅ |
| Audit trail maintained | ❌ | ✅ |
| Dashboard shows verified scores only | ✅ | ✅ |
| Batch import still works | ✅ | ✅ |
| Data quality control | ❌ | ✅ |

---

## Ready to Proceed?

**Full documentation:** `docs/SINTA-SCORE-VERIFICATION-WORKFLOW.md`

**Choose one:**
- [ ] Implement full verification workflow (4.5h)
- [ ] Simple direct editing (30m, less secure)
- [ ] Hybrid with admin approval only (2.5h)

---

**Last Updated:** 15 Maret 2026  
**Analysis Status:** ✅ Complete & Ready to Implement
