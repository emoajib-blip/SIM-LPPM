# SINTA Score Update Verification - Executive Summary

**Date:** 15 Maret 2026  
**Status:** ✅ Analysis Complete & Ready to Implement  

---

## Your Question

> "Dosen masih bisa input manual SINTA Score Overall 764. Apakah memungkinkan update ini diajukan dosen kemudian di verifikasi oleh admin lppm?"
>
> "Can dosen input SINTA Score 764 manually and have admin LPPM verify it?"

## Answer: ✅ **YES - FULLY POSSIBLE**

---

## Current Situation (Today)

### What Works Now ✅
- Dosen can edit: H-Index values (Scopus, Google Scholar, WoS)
- Dosen can edit: Researcher IDs (SINTA, Scopus, Scholar IDs)
- Admin LPPM can bulk upload SINTA scores from Excel
- ⚠️ **Problem:** No verification step - data goes live immediately

### What's Missing ❌
- Dosen cannot input SINTA Score V3 Overall (764) manually
- No "pending verification" state
- No audit trail
- No way for admin to reject with reason

---

## Proposed Solution (After Update)

### Step 1: Dosen Submits (5 min setup time)
```
Go to: /settings → Profile → SINTA & Citation Scores
   ↓
Input values:
  • SINTA V3 Overall: 764
  • SINTA V3 3-Year: (optional)
  • Scopus H-Index: 0
  • GS H-Index: 7
   ↓
Click: "Ajukan untuk Verifikasi"
   ↓
Status: PENDING (orange badge)
Toast: "Skor diajukan untuk verifikasi"
```

### Step 2: Admin LPPM Verifies (2 min per submission)
```
Go to: /admin-lppm/sinta-verifications
   ↓
See dashboard:
  "Menunggu Verifikasi: 5"
   ↓
Review table of pending submissions
   ↓
For each, choose:
  
  A) SETUJUI (Approve)
     ├─ Verify against SINTA website
     ├─ Click "Setujui"
     ├─ System updates live score
     └─ Send notification to dosen
  
  B) TOLAK (Reject)
     ├─ Enter reason: "Tidak sesuai SINTA website"
     ├─ Click "Tolak"
     ├─ Send feedback to dosen
     └─ Dosen can resubmit
```

### Step 3: Dosen Sees Result (Automatic)
```
Dashboard:
  SINTA Score V3 Overall: 764 ✓ VERIFIED
  Verified on: 15/03/2026 by Admin LPPM
   ↓
Can submit new values anytime
```

---

## Data Flow

```
┌─────────────────────────────────────────────────────────────────┐
│                         COMPLETE WORKFLOW                        │
└─────────────────────────────────────────────────────────────────┘

SUBMISSION PHASE (Dosen)
  └─→ Submits to: sinta_score_submissions table (PENDING)

VERIFICATION PHASE (Admin LPPM)
  ├─→ APPROVE: Copies to identity table (live)
  └─→ REJECT: Sends feedback + keeps in PENDING

RESULT PHASE (Dosen + Dashboard)
  └─→ Shows VERIFIED badge + timestamp

AUDIT TRAIL (Always)
  └─→ Who, What, When, Why recorded
```

---

## What Gets Created

### New Components (3 new files)
1. **Database Table:** `sinta_score_submissions` (tracks all submissions)
2. **Model:** `SintaScoreSubmission.php` (data model)
3. **Component:** `VerifySintaScores.php` (verification dashboard)

### Modified Components (2 updates)
1. **ProfileForm:** Add SINTA score input fields
2. **Profile View:** Add SINTA score submission section

### New UI Pages (1 new page)
1. **Admin Dashboard:** `/admin-lppm/sinta-verifications`

### New Notifications (2 templates)
1. **Approval Email:** "Skor Anda disetujui"
2. **Rejection Email:** "Pengajuan ditolak + reason"

---

## Benefits

### For Dosen 👨‍🎓
- ✅ Can update scores anytime without IT help
- ✅ Transparent process (see submission status)
- ✅ Feedback if rejected (know what to fix)
- ✅ Notified when approved

### For Admin LPPM 👨‍💼
- ✅ Central dashboard for all submissions
- ✅ Quality control (verify before publishing)
- ✅ Audit trail (who approved what, when)
- ✅ Batch review possible

### For Institution 🏢
- ✅ Verified, accurate SINTA data
- ✅ Compliance & audit trail
- ✅ Reduced manual work
- ✅ Professional workflow

---

## Implementation Effort

| Phase | Work | Time | Effort |
|-------|------|------|--------|
| Planning | Done | 0m | ✅ |
| Database | Create table | 15m | Easy |
| Backend | Models & logic | 90m | Medium |
| Frontend | Views & UI | 90m | Medium |
| Testing | Automated + manual | 60m | Medium |
| Deployment | Rollout | 15m | Easy |
| **TOTAL** | | **4.5h** | **Medium** |

---

## Implementation Path

```
DAY 1:
├─ 09:00 Create database migration
├─ 10:00 Create model & relationships
├─ 11:00 Create VerifySintaScores component
└─ 13:00 Update ProfileForm

DAY 2:
├─ 09:00 Create views (dashboard + profile section)
├─ 10:30 Add routes & permissions
├─ 11:00 Create notifications
├─ 13:00 Testing & bug fixes
└─ 15:00 Deployment

DAY 3:
└─ 09:00 Monitor & support
```

---

## Risk Level: 🟢 **LOW**

### Why Low Risk?
1. ✅ New table (no data loss)
2. ✅ Optional feature (dosen can choose to submit)
3. ✅ Backward compatible (old scores still work)
4. ✅ Non-breaking (no existing tables modified)
5. ✅ Rollback easy (just delete submissions table)

### Safeguards
- ✅ Admin approval required before scores go live
- ✅ Original scores in identity table unchanged until approved
- ✅ Audit trail for all actions
- ✅ Comprehensive test coverage

---

## Success Metrics

**After implementation, you'll have:**

| Metric | Before | After |
|--------|--------|-------|
| Can dosen input SINTA scores? | ❌ No | ✅ Yes |
| Verification required? | ❌ No | ✅ Yes |
| Audit trail? | ❌ No | ✅ Yes |
| Rejection feedback? | ❌ No | ✅ Yes |
| Admin dashboard? | ❌ No | ✅ Yes |
| Dosen notifications? | ❌ No | ✅ Yes |
| Time to update score | 15m (IT) | 5m (self-service) |

---

## Decision

### Option 1: Implement Full Verification ⭐ **RECOMMENDED**
- Dosen submits → Admin approves/rejects
- Full audit trail
- Professional workflow
- **Time: 4.5 hours**
- **Recommended: YES**

### Option 2: Simple Direct Editing
- Dosen can edit SINTA score directly
- No verification
- Faster implementation
- **Time: 30 minutes**
- **Recommended: NO** (less secure)

### Option 3: Admin Uploads Only (Current)
- Only admin LPPM uploads SINTA
- Dosen can't submit
- **Time: 0 (status quo)**
- **Recommended: NO** (doesn't solve problem)

---

## Documentation Provided

### 📄 Detailed Technical Guide
**File:** `docs/SINTA-SCORE-VERIFICATION-WORKFLOW.md` (653 lines)
- Complete implementation guide
- Code examples for each component
- Migration, model, and view code
- Step-by-step instructions

### 📋 Quick Reference
**File:** `docs/SINTA-SCORE-QUICK-REFERENCE.md` (353 lines)
- Visual workflow diagrams
- Data model overview
- Component checklist
- Timeline & effort

### 📊 Current State Analysis
**File:** `docs/SINTA-SCORE-CURRENT-CAPABILITIES.md` (425 lines)
- What works now
- What's missing
- Proposed changes
- Comparison table

---

## Next Steps

1. ✅ **Review** the documentation
2. ✅ **Decide** on Option 1 (Full Verification - Recommended)
3. ✅ **Schedule** 4.5 hours development time
4. ✅ **Assign** developer to implementation
5. ✅ **Test** in staging environment
6. ✅ **Deploy** to production
7. ✅ **Train** admin LPPM users

---

## Key Files Reference

### Implementation Guide
- **Main:** `docs/SINTA-SCORE-VERIFICATION-WORKFLOW.md`
- **Quick Ref:** `docs/SINTA-SCORE-QUICK-REFERENCE.md`
- **Current State:** `docs/SINTA-SCORE-CURRENT-CAPABILITIES.md`

### Code to Examine
- **Current:** `app/Livewire/Settings/ProfileForm.php` (shows what exists)
- **Current:** `app/Models/Identity.php` (SINTA fields)
- **Current:** `app/Livewire/AdminLppm/SyncSinta.php` (current import)

---

## Questions Answered

### Q1: Can dosen input 764?
**Now:** ❌ No  
**After:** ✅ Yes

### Q2: Does admin verify?
**Now:** ❌ No (direct update)  
**After:** ✅ Yes (approve/reject)

### Q3: Is there audit trail?
**Now:** ❌ No  
**After:** ✅ Yes (who, what, when, why)

### Q4: How long to build?
**Estimate:** 4.5 hours  
**Complexity:** Medium

### Q5: What if dosen enters wrong value?
**Now:** Admin must update database  
**After:** Admin rejects with reason, dosen resubmits

### Q6: Can dosen resubmit if rejected?
**After:** ✅ Yes (unlimited resubmissions)

### Q7: Is rollback possible?
**After:** ✅ Yes (just delete submissions table)

---

## Recommendation

### 🎯 **Proceed with Implementation**

**Rationale:**
1. ✅ Solves your problem completely
2. ✅ Low risk, high benefit
3. ✅ Improves data quality
4. ✅ Creates audit trail
5. ✅ Empowers dosen
6. ✅ Maintains admin control

**Timeline:** Next development sprint (4-5 hours)

**Owner:** Development team

**Stakeholders:** Admin LPPM, All Dosen

---

## Summary

**You asked:** Can dosen submit SINTA scores for admin verification?

**Answer:** ✅ **YES - Fully doable. Recommended. 4.5 hours. Low risk.**

**Status:** ✅ Ready to implement

**Decision:** Proceed with Option 1 (Full Verification Workflow)

---

**Last Updated:** 15 Maret 2026  
**Status:** ✅ Analysis Complete & Implementation Ready  
**Documentation:** 1,431 lines across 3 detailed guides

**Next Action:** Developer to review `docs/SINTA-SCORE-VERIFICATION-WORKFLOW.md` and begin implementation.
