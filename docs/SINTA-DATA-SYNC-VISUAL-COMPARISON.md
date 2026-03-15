# SINTA Data Sync - Visual Comparison

## 📊 Current Data Flow Architecture

```
┌─────────────────────────────────────────────────────────────────────────┐
│                        SINTA EXPORT FILE                                │
│            (48 dosen, 39 fields)                                        │
│         ┌─ SINTA Scores (V2, V3)                                        │
│         ├─ Affiliation Scores                                           │
│         ├─ Scopus metrics (docs, citations, h-index, g-index, i10)     │
│         ├─ GS metrics (docs, citations, h-index, g-index, i10)         │
│         ├─ WoS metrics (docs, citations, h-index, g-index, i10)        │
│         ├─ Garuda metrics (docs, citations)                            │
│         ├─ Identity (NIDN, Nama, Prodi, Jabatan, Pendidikan)           │
│         └─ IDs (SINTA ID, Scopus ID, GS ID, WoS ID)                    │
└──────────────────────────┬──────────────────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                    ADMIN UPLOAD / IMPORT                                │
│           /admin-lppm/sync-sinta (SyncSinta component)                  │
│                   ⚠️ NO VERIFICATION STEP                               │
└──────────────────────────┬──────────────────────────────────────────────┘
                           │
                           ▼
┌─────────────────────────────────────────────────────────────────────────┐
│                   DATABASE STORAGE                                       │
│              (Identity model with 39 fields)                            │
│   ✅ EVERYTHING is stored:                                             │
│      - sinta_score_v2_overall, v2_3yr                                  │
│      - sinta_score_v3_overall, v3_3yr   ← (1726 value here)            │
│      - affil_score_v3_overall, v3_3yr                                  │
│      - scopus_h_index, scopus_g_index, scopus_i10_index               │
│      - gs_h_index, gs_g_index, gs_i10_index                           │
│      - wos_h_index, wos_g_index, wos_i10_index                        │
│      - All document/citation counts                                     │
│      - functional_position, last_education                             │
│      - All IDs and identity data                                       │
└──────────────────────────┬──────────────────────────────────────────────┘
                           │
        ┌──────────────────┴──────────────────┐
        │                                     │
        ▼                                     ▼
┌───────────────────────────┐      ┌──────────────────────────┐
│   ADMIN DASHBOARDS        │      │  DOSEN PROFILE FORM      │
│  (View/Display Only)      │      │  (Input/Edit)            │
│                           │      │                          │
│ ✅ Can see:             │      │ ✅ Can edit:            │
│  - SINTA scores         │      │  - IDs (SINTA, Scopus)   │
│  - All metrics          │      │  - H-Index (3 platforms) │
│  - Citation counts      │      │  - Personal info         │
│  - Document counts      │      │                          │
│                           │      │ ❌ Cannot edit:         │
│                           │      │  - SINTA scores         │
│                           │      │  - Document counts      │
│                           │      │  - Citation counts      │
│                           │      │  - Functional position  │
│                           │      │  - Education level      │
└───────────────────────────┘      └──────────────────────────┘
```

---

## 🔄 Data Field Mapping: SINTA Export → Database → Form

### Legend
```
✅ = Field tersedia dan editable oleh dosen
🔒 = Field tersedia tapi read-only (dari import)
❌ = Field tidak tersedia sama sekali
```

### Complete Mapping Table

```
┌─────────────────────────────────────┬──────────┬──────────┬──────────┐
│ FIELD                               │ SINTA    │ Database │ Form     │
│                                     │ Export   │          │ Profile  │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ IDENTITAS                           │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ NO (urut)                           │ ✅       │ (N/A)    │ (N/A)    │
│ NIDN / Identity ID                  │ ✅       │ ✅       │ ✅ Edit  │
│ Nama Dosen                          │ ✅       │ ✅       │ ✅ Edit  │
│ Program Studi (PRODI)               │ ✅       │ ✅       │ ✅ Edit  │
│ Institusi                           │ ✅       │ ✅       │ ✅ Edit  │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ JABATAN & PENDIDIKAN                │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ Jabatan Fungsional                  │ ✅       │ ✅       │ 🔒 View  │
│ Pendidikan Terakhir                 │ ✅       │ ✅       │ 🔒 View  │
│ Gelar Depan                         │ ✅       │ ✅       │ ✅ Edit  │
│ Gelar Belakang                      │ ✅       │ ✅       │ ✅ Edit  │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ IDENTIFIERS                         │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ SINTA ID                            │ ✅       │ ✅       │ ✅ Edit  │
│ Scopus ID                           │ ✅       │ ✅       │ ✅ Edit  │
│ Google Scholar ID                   │ ✅       │ ✅       │ ✅ Edit  │
│ Web of Science ID                   │ ✅       │ ✅       │ ✅ Edit  │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ 🔴 SINTA SCORES (CRITICAL)          │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ SINTA Score V2 Overall              │ ✅       │ ✅       │ ❌ 🔒   │
│ SINTA Score V2 3Yr                  │ ✅       │ ✅       │ ❌ 🔒   │
│ SINTA Score V3 Overall  ⭐ (1726)   │ ✅       │ ✅       │ ❌ 🔒   │
│ SINTA Score V3 3Yr                  │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ AFFILIATION SCORES                  │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ Affiliation Score V3 Overall        │ ✅       │ ✅       │ ❌ 🔒   │
│ Affiliation Score V3 3Yr            │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ SCOPUS METRICS                      │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ Scopus: Documents                   │ ✅       │ ✅       │ ❌ 🔒   │
│ Scopus: Citations                   │ ✅       │ ✅       │ ❌ 🔒   │
│ Scopus: Cited Documents             │ ✅       │ ✅       │ ❌ 🔒   │
│ Scopus: H-Index                     │ ✅       │ ✅       │ ✅ Edit  │
│ Scopus: G-Index                     │ ✅       │ ✅       │ ❌ 🔒   │
│ Scopus: i10-Index                   │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ GOOGLE SCHOLAR METRICS              │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ GS: Documents                       │ ✅       │ ✅       │ ❌ 🔒   │
│ GS: Citations                       │ ✅       │ ✅       │ ❌ 🔒   │
│ GS: Cited Documents                 │ ✅       │ ✅       │ ❌ 🔒   │
│ GS: H-Index                         │ ✅       │ ✅       │ ✅ Edit  │
│ GS: G-Index                         │ ✅       │ ✅       │ ❌ 🔒   │
│ GS: i10-Index                       │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ WEB OF SCIENCE METRICS              │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ WoS: Documents                      │ ✅       │ ✅       │ ❌ 🔒   │
│ WoS: Citations                      │ ✅       │ ✅       │ ❌ 🔒   │
│ WoS: Cited Documents                │ ✅       │ ✅       │ ❌ 🔒   │
│ WoS: H-Index                        │ ✅       │ ✅       │ ✅ Edit  │
│ WoS: G-Index                        │ ✅       │ ✅       │ ❌ 🔒   │
│ WoS: i10-Index                      │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ GARUDA METRICS                      │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ Garuda: Documents                   │ ✅       │ ✅       │ ❌ 🔒   │
│ Garuda: Citations                   │ ✅       │ ✅       │ ❌ 🔒   │
│ Garuda: Cited Documents             │ ✅       │ ✅       │ ❌ 🔒   │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ STATUS                              │          │          │          │
├─────────────────────────────────────┼──────────┼──────────┼──────────┤
│ Status Aktif                        │ ✅       │ ✅       │ 🔒 View  │
│ Status Verifikasi                   │ ✅       │ (N/A)    │ (N/A)    │
└─────────────────────────────────────┴──────────┴──────────┴──────────┘

Key:
  ✅ Edit  = Dosen bisa edit langsung di form
  🔒 View  = Ada di database, bisa dilihat tapi tidak bisa diedit
  ❌ 🔒   = Ada di database tetapi TIDAK ada di form (total missing)
  (N/A)    = Tidak relevan untuk form
```

---

## 📈 Data Summary Statistics

### By Category

```
TOTAL FIELDS IN SINTA EXPORT: 39 fields

Breakdown:
  Identity & Status Info:      10 fields  (25%)
  Identifiers (IDs):            4 fields  (10%)
  SINTA Scores:                 4 fields  (10%) ← 🔴 CRITICAL
  Affiliation Scores:           2 fields  ( 5%)
  Scopus Metrics:               6 fields  (15%)
  GS Metrics:                   6 fields  (15%)
  WoS Metrics:                  6 fields  (15%)
  Garuda Metrics:               3 fields  ( 8%)
  ────────────────────────────────────────────
  TOTAL:                       39 fields (100%)

In ProfileForm:
  ✅ Fully Editable:      10 fields (26%) - IDs + H-Index + Basic Info
  🔒 View Only:            2 fields ( 5%) - Status, Functional Role
  ❌ Missing:             27 fields (69%) - CRITICAL GAP!
```

### Data Sync Percentage

```
┌──────────────────────────────────────────┐
│         DATA SYNC COVERAGE               │
├──────────────────────────────────────────┤
│                                          │
│ Database Storage:   39/39 fields = 100% │ ✅ EXCELLENT
│                     ██████████████████  │
│                                          │
│ Form Visibility:    12/39 fields =  31% │ 🟡 POOR
│                     ██░░░░░░░░░░░░░░░░  │
│                                          │
│ Dosen Editable:     10/39 fields =  26% │ 🔴 CRITICAL
│                     ██░░░░░░░░░░░░░░░░  │
│                                          │
└──────────────────────────────────────────┘

Analysis:
  Database:  Fully prepared ✅
  Form:      Severely incomplete ❌
  Gap:       13 fields should be in form but aren't
```

---

## 🔄 Current vs Ideal Flow

### CURRENT FLOW (What Happens Now)

```
SCENARIO 1: Admin wants to update SINTA data
─────────────────────────────────────────────

Step 1: Admin gets new SINTA export file from SINTA website
        ✅ File has 48 dosen with latest scores

Step 2: Admin uploads file to /admin-lppm/sync-sinta
        ✅ File processed by SintaAuthorImport

Step 3: Data goes DIRECTLY to database
        ⚠️ NO VERIFICATION STEP
        ⚠️ NO APPROVAL
        ⚠️ NO AUDIT TRAIL
        ⚠️ NO DOSEN CONFIRMATION

Step 4: Data now LIVE in system
        ✅ Visible in dashboards
        ✅ Visible in research forms
        ❌ But dosen didn't verify their own data!

Problem: If data is wrong, how dosen correct it?
Answer:  They can't! It's read-only.


SCENARIO 2: Dosen wants to update own academic metrics
──────────────────────────────────────────────────────

Step 1: Dosen login and go to /settings/profile
        ✅ Can see form

Step 2: Check what can be edited:
        ✅ Can edit: SINTA ID, Scopus ID, GS ID, WoS ID
        ✅ Can edit: H-Index values (Scopus, GS, WoS)
        ❌ Cannot edit: SINTA Score values
        ❌ Cannot edit: Document/Citation counts
        ❌ Cannot edit: Functional position
        ❌ Cannot edit: Education level

Step 3: After editing H-Index:
        ✅ Changes saved

Step 4: Try to edit SINTA Score (1726)?
        ❌ Field not in form - STUCK!
        ❌ Has to ask admin for manual update

Problem: Academic data locked from dosen input (except H-Index)
```

### IDEAL FLOW (After Implementation)

```
SCENARIO: Complete verification workflow
──────────────────────────────────────────

Option A: Via Dosen Submission
─────────────────────────────

Step 1: Dosen login → /settings/profile
        ✅ Can see ALL academic fields
        ✅ Can edit SINTA scores (with warning)
        ✅ Can edit document/citation counts
        ✅ Can edit functional position
        ✅ Can edit education level

Step 2: Dosen submits changes
        ✅ Data saved to sinta_score_submissions table
        ✅ Status = PENDING
        ✅ Dosen gets notification: "Awaiting verification"

Step 3: Admin LPPM reviews at /admin-lppm/sinta-verifications
        ✅ See all pending submissions
        ✅ Compare with SINTA website official data
        ✅ Can APPROVE: Data moves to identity table
        ✅ Can REJECT: With feedback reason
        ✅ Audit trail recorded

Step 4: Dosen notified of result
        ✅ If approved: "Your academic data updated"
        ✅ If rejected: "Please review feedback and resubmit"

Step 5: Complete audit trail maintained
        ✅ Who submitted: Dosen X
        ✅ When submitted: 2026-03-15 14:30
        ✅ Who verified: Admin Y
        ✅ When verified: 2026-03-15 15:00
        ✅ Approved/Rejected: Approved
        ✅ Reason: (if rejected)


Option B: Via Admin Verification + Dosen Confirmation
─────────────────────────────────────────────────────

Step 1: Admin imports SINTA export (same as now)
        ✅ File uploaded

Step 2: Data goes to sinta_score_submissions table
        ⚠️ Status = PENDING (not directly to identity)

Step 3: Dosen receives notification
        "Your academic data updated from SINTA. Please verify."
        ✅ Can review

Step 4: Dosen either:
        ✅ CONFIRMS: "Data is correct"
        ✅ DISPUTES: "Data is wrong, here's correction"

Step 5: Admin reviews disputed items only
        ✅ Approve: Use dosen's value
        ✅ Reject: Keep SINTA value

Step 6: Data finalized
        ✅ Move to identity table
        ✅ Both versions in audit trail
```

---

## 📋 Implementation Options Comparison

```
┌──────────────┬────────────┬────────────┬─────────────────────────┐
│ Option       │ Time Needed│ Complexity │ Data Control            │
├──────────────┼────────────┼────────────┼─────────────────────────┤
│ Status Quo   │ None       │ N/A        │ Admin-only, no dosen    │
│ (Current)    │ 0h         │            │ input/verification      │
├──────────────┼────────────┼────────────┼─────────────────────────┤
│ Option 1     │ 2 hours    │ Low        │ Add missing form fields, │
│ Quick Add    │            │            │ still no verification   │
│ (Add fields) │            │            │                         │
├──────────────┼────────────┼────────────┼─────────────────────────┤
│ Option 2     │ 4.5 hours  │ High       │ Full submission +        │
│ Full Fix     │            │            │ verification workflow    │
│ (Recommended)│            │            │ (BEST)                  │
├──────────────┼────────────┼────────────┼─────────────────────────┤
│ Option 3     │ 3 hours    │ Medium     │ Add fields now, add      │
│ Hybrid       │            │            │ verification later       │
│ (Phased)     │            │            │                         │
└──────────────┴────────────┴────────────┴─────────────────────────┘

Recommendation: Option 2 (Full Fix)
  Reason: Complete solution with proper verification
  Benefit: Data integrity + dosen control + audit trail
  Timeline: 4.5 hours (1-2 days dev work)
```

---

## 🎯 Priority Matrix

```
┌─────────────────────────────────────────┐
│           IMPLEMENTATION PRIORITY        │
├─────────────────────────────────────────┤
│                                         │
│ CRITICAL (MUST DO):                    │
│ ✅ Add SINTA score fields to form      │
│ ✅ Implement verification workflow     │
│ ✅ Create submission table              │
│ ✅ Add audit trail                      │
│                                         │
│ IMPORTANT (SHOULD DO):                 │
│ 🟡 Add functional_position field       │
│ 🟡 Add last_education field            │
│ 🟡 Add document/citation fields        │
│                                         │
│ NICE TO HAVE (COULD DO):               │
│ 🔵 Add G-Index fields (Scopus, GS, WoS)│
│ 🔵 Add i10-Index fields (Scopus, GS)   │
│ 🔵 Add Garuda metrics                  │
│                                         │
└─────────────────────────────────────────┘
```

---

## 💡 Key Insights

### Problem Summary
```
SINTA export file has:  39 comprehensive academic fields per dosen
Database can store:     39 fields (100% capacity)
Form shows to dosen:    12 fields (31% visibility)
Dosen can edit:         10 fields (26% control)

Critical Gap: SINTA Scores (the 1726 value) are in export and database
             but NOT in form and NOT editable by dosen
```

### Why This Matters
```
1. Data Integrity Risk
   - Dosen cannot verify their own scores
   - Errors go uncorrected
   - No dosen confirmation for data accuracy

2. Control & Transparency
   - All score changes initiated by admin only
   - Dosen has no input in own academic data
   - No verification mechanism

3. Compliance Risk
   - Academic data should be verifiable by source (dosen)
   - Current system: admin controls everything
   - Professional standards expect dosen confirmation
```

### Solution Benefits
```
If implemented (Option 2):

1. ✅ Data Integrity
   - Dosen verify their own scores
   - Errors caught and corrected
   - Complete audit trail

2. ✅ Transparency
   - Dosen see what's being recorded
   - Understand what admin sees
   - Know why changes made

3. ✅ Compliance
   - Professional standards met
   - Proper verification workflow
   - Accountability maintained

4. ✅ System Reliability
   - No invalid data slips through
   - History of all changes
   - Easy to track issues
```

---

## 📞 Summary for Decision Makers

```
QUESTION: Is dosen profile form synced with SINTA export?

ANSWER: PARTIAL - Only 26% is editable by dosen

FINDINGS:
  ✅ H-Index fields (3 platforms): Can edit
  ✅ ID fields (4 platforms): Can edit
  ✅ Basic identity (name, address): Can edit
  
  ❌ SINTA Scores (4 fields): CANNOT edit - READ ONLY
  ❌ Document/Citation counts (15 fields): CANNOT edit
  ❌ Functional position: CANNOT edit
  ❌ Education level: CANNOT edit
  
  ❌ NO verification workflow exists

IMPACT: Academic data locked from dosen input (except H-Index)

RECOMMENDATION: Implement full verification workflow (4.5 hours)

PRIORITY: HIGH - Data integrity critical for research management system
```

---

**Document Generated:** 15 Maret 2026  
**Analysis Status:** ✅ COMPLETE  
**Visual Aids:** ✅ INCLUDED  
**Ready for:** Decision & Implementation
