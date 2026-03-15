# Research Schemes - SINTA Integration Summary

**URL:** `/settings/master-data?group=academic-content&tab=research-schemes`  
**Date:** 16 Maret 2026  
**Status:** 🟡 **PARTIALLY SYNCED**

---

## ✅ Quick Answer

**Apa sudah sinkron dengan ini?**

### YES, Partially Synced - Basic Integration Exists

```
✅ WHAT'S WORKING:
   • Min SINTA Score requirement → Checked in validation ✓
   • Min Scopus H-Index requirement → Checked in validation ✓
   • Allowed functional positions → Enforced on submission ✓
   • Data comes from Identity table → Connected ✓

⚠️  WHAT'S INCOMPLETE:
   • Only H-Index used (not other Scopus metrics)
   • Manual configuration (not auto from dosen data)
   • No pre-submission eligibility feedback
   • No admin dashboard showing eligible dosen
   • No real-time eligibility updates

❌ WHAT'S MISSING:
   • Affiliation score eligibility (available in export, not used)
   • Education level eligibility (available in export, not used)
   • Other Scopus metrics (documents, citations, g-index, i10-index)
   • Dynamic eligibility checking
   • Eligibility change notifications
```

---

## 🔄 How It Works Now

### Data Flow

```
┌──────────────────────────────────────┐
│ 1. ADMIN SETUP                       │
│ /settings/master-data?tab=research.. │
├──────────────────────────────────────┤
│                                      │
│ ResearchSchemeManager form:          │
│                                      │
│ Name: Unggulan Nasional              │
│ Min SINTA Score: [500]     ← input   │
│ Min Scopus Score: [10]     ← input   │
│ Allowed Positions: ☑ Lektor ← check │
│                   ☑ Guru Besar       │
│                                      │
│ Saved to: research_schemes table     │
│  - name: "Unggulan Nasional"         │
│  - eligibility_rules: {              │
│      "min_sinta_score": 500,         │
│      "min_scopus_score": 10,         │
│      "allowed_functional_...": [...]│
│    }                                 │
└──────────────────────────────────────┘
         ↓
┌──────────────────────────────────────┐
│ 2. DOSEN SUBMITS PROPOSAL            │
│ /research/create                     │
├──────────────────────────────────────┤
│                                      │
│ Dosen chooses:                       │
│  - Scheme: "Unggulan Nasional"       │
│  - Team members, outputs, etc        │
│  - Clicks SUBMIT                     │
│                                      │
│ System validates:                    │
│  ✓ Check identity.sinta_score_v3... │
│    >= eligibility_rules.min_sinta... │
│  ✓ Check identity.scopus_h_index    │
│    >= eligibility_rules.min_scopus...│
│  ✓ Check identity.functional_pos    │
│    in eligibility_rules.allowed_pos.│
└──────────────────────────────────────┘
         ↓
┌──────────────────────────────────────┐
│ 3. VALIDATION RESULT                 │
├──────────────────────────────────────┤
│                                      │
│ All pass: ✅ Proposal accepted       │
│                                      │
│ Any fail: ❌ Error message           │
│  "Your SINTA score (450) is below    │
│   minimum required (500)"            │
│                                      │
│ Problem: User discovers this AFTER   │
│ filling out entire form!             │
└──────────────────────────────────────┘
```

---

## 📊 Integration Coverage

```
╔════════════════════════════════════════════════════════╗
║         SINTA DATA INTEGRATION COVERAGE               ║
╠════════════════════════════════════════════════════════╣
║                                                        ║
║ SINTA Data Available:        39 fields                 ║
║ Used in ResearchScheme:       3 fields        = 8%    ║
║                                                        ║
║ In Form Selectable:                                    ║
║  ✅ Min SINTA Score                                   ║
║  ✅ Min Scopus Score                                  ║
║  ✅ Allowed Functional Positions                      ║
║  ❌ Min Affiliation Score                             ║
║  ❌ Education Level Requirement                       ║
║  ❌ Document/Citation Counts                          ║
║  ❌ Other Scopus metrics (g-index, i10)              ║
║                                                        ║
║ In Validation Logic:                                   ║
║  ✅ SINTA Score Checking          (against identity) ║
║  ✅ Scopus H-Index Checking       (against identity) ║
║  ✅ Position Checking              (against identity) ║
║  ❌ Pre-submission feedback        (shows error only) ║
║  ❌ Eligibility dashboard          (for admin)        ║
║  ❌ Eligibility notifications      (no alerts)        ║
║                                                        ║
║ User Experience:                                       ║
║  ❌ Pre-submit eligibility check   (missing)          ║
║  ❌ Available schemes list         (for dosen)        ║
║  ❌ Eligibility explanation        (basic only)       ║
║  ❌ Improvement suggestions        (missing)          ║
║                                                        ║
╚════════════════════════════════════════════════════════╝

Overall Integration: 🟡 ~40-50% (Basic, Missing Advanced Features)
```

---

## 🎯 What Works & What Doesn't

### ✅ What's Working

```
1. SINTA Score as Min Requirement
   • Admin sets minimum SINTA score per scheme
   • System checks actual dosen score from Identity table
   • Validation prevents ineligible dosen from submitting
   • Error message shown (after submission attempt)

2. Scopus H-Index as Min Requirement
   • Admin sets minimum Scopus H-Index
   • System checks scopus_h_index from Identity table
   • Validation works correctly
   
3. Functional Position Control
   • Admin selects allowed positions from hardcoded list
   • System checks dosen's position in Identity table
   • Only allowed positions can submit
   
4. Data Source Connected
   • ResearchScheme validation ← Identity table
   • Real data, not defaults or assumptions
   • Updates automatically if dosen profile updated
```

### ⚠️ What's Partial

```
1. Functional Position Data
   ⚠️ Hardcoded list: ['Lektor', 'Guru Besar', etc]
   ✓ Data in Identity table from SINTA
   ❌ Not auto-generated from actual dosen data
   ⚠️ Admin must manually select from predefined list
   
   Impact: If new position type added, admin must manually
           update all research schemes

2. Scopus Integration
   ✓ H-Index checking works
   ❌ Other metrics not supported
   ❌ Can't set min document count
   ❌ Can't set min citation count
   ❌ Can't use g-index or i10-index
   
   Impact: Limited to H-Index only, missing other metrics
```

### ❌ What's Missing

```
1. Real-Time Eligibility Feedback
   ❌ Dosen doesn't see eligibility BEFORE submitting
   ❌ Error only shown AFTER form submission
   ❌ Must restart entire form if ineligible
   
2. Admin Eligibility Dashboard
   ❌ No view showing: "How many dosen are eligible?"
   ❌ No breakdown by eligibility criteria
   ❌ No matrix: dosen × schemes
   
3. Pre-Submission Eligibility Check
   ❌ Dosen can select ineligible scheme
   ❌ Only validated at final submission
   ❌ No "Choose from eligible schemes" guidance
   
4. Affiliation Score Integration
   ✓ Available in SINTA export
   ✓ Stored in Identity table
   ❌ Not in ResearchScheme form
   ❌ Not used in validation
   
5. Education Level Integration
   ✓ Available in SINTA export
   ✓ Stored in Identity table
   ❌ Not in ResearchScheme form
   ❌ Not used in validation
   
6. Advanced Scopus Metrics
   ✓ Available in SINTA export (doc, citation, g-idx, i10-idx)
   ✓ Stored in Identity table
   ❌ Not in ResearchScheme form
   ❌ Not used in validation
   
7. Change Notifications
   ❌ If dosen becomes ineligible → No notification
   ❌ If dosen becomes eligible → No notification
   ❌ No audit trail of eligibility changes
```

---

## 📋 Code Structure

### ResearchSchemeManager Component

**Location:** `app/Livewire/Settings/Tabs/ResearchSchemeManager.php`

**SINTA-Related Fields:**
```php
public ?float $min_sinta_score = null;          // ✅ Used
public ?float $min_scopus_score = null;         // ✅ Used
public array $allowed_functional_positions = [];  // ✅ Used

// NOT USED (Available but no form field):
public ?float $affil_score = null;              // ❌ Not in form
public ?int $education_level = null;            // ❌ Not in form
```

**Eligibility Rules Structure:**
```php
'eligibility_rules' => [
    'allowed_functional_positions' => ['Lektor', 'Guru Besar'],
    'min_sinta_score' => 500,
    'min_scopus_score' => 10,
    'min_students_involved' => 2,
    'max_proposals_as_head' => 3,
    'require_cross_prodi' => true,
    'pending_report_block_role' => 'dekan',
]
```

---

## 💡 Key Insights

### Data Sync Status

```
From earlier SINTA analysis:
  • Database has: 39 SINTA fields (100%)
  • Dosen form shows: 12 fields (31%)
  • Dosen can edit: 10 fields (26%)

Research Schemes usage:
  • Uses: 3 fields (SINTA score, Scopus H-index, Position)
  • Percentage of SINTA data: ~8%
  • Percentage of available fields: ~25%

Conclusion:
  Research Schemes IS using SINTA data, but only using:
  • 1 SINTA metric (V3 Overall score)
  • 1 Scopus metric (H-Index only)
  • 1 Identity field (functional_position)
  
  Leaving unused: 36+ fields in SINTA export
```

### Integration Maturity

```
Current State:        🟡 BASIC (40-50%)
  ✅ Core validation works
  ✅ Data source connected
  ✅ Requirements enforced
  ❌ Missing UX features
  ❌ Missing admin tools
  ❌ Limited criteria

Should Be:            🟢 COMPLETE (90%+)
  ✅ Pre-submission eligibility check
  ✅ Admin eligibility dashboard
  ✅ Real-time feedback
  ✅ Multiple criteria options
  ✅ Change notifications
  ✅ Audit trail
  ✅ Affiliation & education levels
```

---

## 🎯 Recommendations

### Quick Wins (1-2 hours)
```
1. Add education level eligibility option
2. Add more Scopus metrics (documents, citations)
3. Improve error messages to show actual scores
```

### Important (3-4 hours)
```
1. Add pre-submission eligibility check
2. Show list of eligible schemes to dosen
3. Add admin eligibility dashboard
```

### Nice to Have (4-5 hours)
```
1. Add affiliation score eligibility
2. Add eligibility change notifications
3. Create eligibility audit trail
```

---

## 📌 Conclusion

### Q: Is Research Schemes synced with SINTA export?

### A: YES - Partially Synced (Basic Integration)

```
✅ Using:
   • Min SINTA Score
   • Min Scopus H-Index
   • Functional Position

⚠️  Could Use:
   • Affiliation Scores
   • Education Level
   • Other Scopus Metrics

❌ Missing:
   • Real-time eligibility feedback
   • Admin eligibility dashboard
   • Pre-submission validation
   • Change notifications
```

**Maturity: 40-50% (Basic but missing UX/Admin features)**

---

**For detailed analysis:** See RESEARCH-SCHEMES-SINTA-SYNC-ANALYSIS.md

**Component Location:** app/Livewire/Settings/Tabs/ResearchSchemeManager.php

**URL:** http://127.0.0.1:8000/settings/master-data?group=academic-content&tab=research-schemes
