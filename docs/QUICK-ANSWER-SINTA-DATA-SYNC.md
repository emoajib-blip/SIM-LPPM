# Quick Answer: SINTA Data Sync Status

## ❓ Pertanyaan Anda

> "Apa data menu profil dosen sudah menyesuaikan dengan SINTA export?"

## ✅ Jawaban Singkat

**SEBAGIAN SAJA** - Hanya 3 dari 6 kategori metrics yang tersedia di form profil dosen:

### ✅ Yang SUDAH Ada di Form Profil Dosen

```
1. IDENTIFIER IDs:
   ✅ SINTA ID           → Dapat diinput dosen
   ✅ Scopus ID          → Dapat diinput dosen
   ✅ Google Scholar ID  → Dapat diinput dosen
   ✅ WoS ID             → Dapat diinput dosen

2. H-INDEX METRICS (HANYA INI SAJA):
   ✅ Scopus H-Index     → Dapat diinput dosen
   ✅ Google Scholar H-Index → Dapat diinput dosen
   ✅ Web of Science H-Index  → Dapat diinput dosen

3. IDENTITY INFO:
   ✅ NIDN, Nama, Program Studi → Dapat diupdate dosen
   ✅ Address, Birthdate, Title → Dapat diupdate dosen
```

### ❌ Yang TIDAK Ada di Form Profil Dosen

```
1. SINTA SCORES (CRITICAL GAP):
   ❌ SINTA V2 Overall        → NOT di form (read-only)
   ❌ SINTA V2 3Yr            → NOT di form (read-only)
   ❌ SINTA V3 Overall (1726) → NOT di form (read-only) ⭐
   ❌ SINTA V3 3Yr            → NOT di form (read-only)

2. AFFILIATION SCORES:
   ❌ Affiliation Score V3 Overall → NOT di form (read-only)
   ❌ Affiliation Score V3 3Yr     → NOT di form (read-only)

3. DOCUMENT & CITATION COUNTS:
   ❌ Scopus: Documents, Citations, G-Index, i10-Index
   ❌ Google Scholar: Documents, Citations, G-Index, i10-Index
   ❌ Web of Science: Documents, Citations, G-Index, i10-Index
   ❌ Garuda: All metrics

4. IDENTITY DATA YANG ADA DI SINTA TAPI TIDAK DI FORM:
   ❌ Functional Position (Profesor, Doktor, Lektor, dll)
   ❌ Last Education Level (S2, S3)
```

---

## 📊 Komparasi Cepat

| Kategori | SINTA Export | Database | Form Profil | Dosen Editable |
|----------|--------------|----------|-------------|-----------------|
| IDs (SINTA, Scopus, GS, WoS) | ✅ Ada | ✅ Ada | ✅ Visible | ✅ Ya |
| **H-Index (Scopus, GS, WoS)** | ✅ Ada | ✅ Ada | ✅ Visible | ✅ **Ya** ✅ |
| **SINTA Scores** | ✅ Ada | ✅ Ada | ❌ **Tidak** | ❌ **Tidak** |
| Affiliation Scores | ✅ Ada | ✅ Ada | ❌ Tidak | ❌ Tidak |
| Document/Citation Counts | ✅ Ada | ✅ Ada | ❌ Tidak | ❌ Tidak |
| Functional Position | ✅ Ada | ✅ Ada | ❌ Tidak | ❌ Tidak |
| Education Level | ✅ Ada | ✅ Ada | ❌ Tidak | ❌ Tidak |

---

## 🔴 CRITICAL GAPS

### Gap #1: SINTA Scores NOT Editable (CRITICAL)
```
Problem:
  - Nilai SINTA Score V3 Overall (1726) adalah READ-ONLY
  - Dosen TIDAK bisa submit manual SINTA score
  - Dosen TIDAK bisa correct wrong value
  - Admin hanya bisa bulk import dari Excel (no verification)

Solution:
  - Add SINTA score fields ke form profil dosen
  - Implement submission + verification workflow
  - Create approval system untuk admin LPPM
  (See: SINTA-SCORE-VERIFICATION-WORKFLOW.md)
```

### Gap #2: Other Metrics Not Editable (MEDIUM)
```
Problem:
  - Document counts, Citation counts, G-Index, i10-Index TIDAK di form
  - Functional position TIDAK di form
  - Education level TIDAK di form

Impact:
  - Incomplete profile management
  - Data only from import, no manual correction

Solution:
  - Decide which fields are critical
  - Add to form if important
```

### Gap #3: No Verification Workflow (CRITICAL)
```
Problem:
  - Admin import SINTA langsung ke DB (no approval step)
  - Tidak ada submission tracking
  - Tidak ada audit trail
  - Tidak ada rejection mechanism

Current Flow:
  SINTA Export File → Upload → Process → Direct Update ❌

Needed Flow:
  Dosen Submit → Admin Review → Approve/Reject → Update ✅
```

---

## 🟢 WHAT'S WORKING

✅ **Database Structure**
- All 39 SINTA fields dapat disimpan di database
- Identity model fully prepared
- Fields: sinta_score_v2_overall, sinta_score_v3_overall, etc semua ada

✅ **Admin Import**
- Admin LPPM bisa import SINTA data via Excel
- Route: /admin-lppm/sync-sinta
- Data masuk ke database

✅ **H-Index Management**
- Dosen bisa input/edit H-Index (Scopus, GS, WoS)
- Form sudah siap, validation sudah ada

✅ **Display**
- Data akademis bisa dilihat di dashboard
- Di research submission details
- Di reports

---

## 📋 Data Sample dari SINTA Export

**File:** export_author_Institut_Teknologi_Dan_Sains_Nahdlatul_Ulama_Pekalongan.xlsx

```
Total Dosen: 48

Sample Data:
┌─ ARIA MULYAPRADANA
│  ├─ NIDN: 0612118401
│  ├─ SINTA ID: 6093973
│  ├─ SINTA V3 Overall: 1726 ← (Highest score)
│  ├─ SINTA V3 3Yr: 581.75
│  ├─ Scopus H-Index: 0
│  ├─ GS H-Index: 18
│  └─ WoS H-Index: 0
│
└─ TURKHAMUN ADI KURNIAWAN
   ├─ NIDN: 0312078003
   ├─ SINTA ID: 6113582
   ├─ SINTA V3 Overall: 287.25
   ├─ SINTA V3 3Yr: 99.25
   ├─ Scopus H-Index: 1
   ├─ GS H-Index: 5
   └─ WoS H-Index: 0

Distribution:
  - 46 dari 48 dosen punya SINTA score
  - 40 dari 48 dosen punya Scopus H-Index = 0
  - Semua 48 dosen punya Google Scholar data
```

---

## 🚀 Rekomendasi Implementasi

### Option 1: QUICK FIX (2 hours) ✅ Recommended for Short-term
```
Add H-Index fields untuk Garuda:
  - garuda_h_index (if exists in SINTA)
  
Add identity fields untuk completeness:
  - functional_position
  - last_education

Effort: 2 hours
Impact: Small but improves profile completeness
```

### Option 2: PROPER FIX (4.5 hours) ✅ Recommended for Long-term
```
1. Add SINTA score fields ke form
2. Implement submission + verification workflow
3. Create admin verification dashboard
4. Add audit trail & notifications
5. Complete tests

Effort: 4.5 hours
Impact: Full data sync + verification capability
(Details in: SINTA-SCORE-VERIFICATION-WORKFLOW.md)
```

### Option 3: HYBRID (3 hours) ✅ Recommended if time-constrained
```
Phase 1 (Option 1): Quick fix for visible fields (2h)
Phase 2 (Later): Full verification workflow (2.5h)

Allows:
  - Dosen can update more complete profile info
  - SINTA scores still import-only (for now)
  - Prepare database for future verification system
```

---

## ✅ Checklist: What Needs To Be Done

### Current State Assessment
- [x] Database fully prepared (all 39 fields storable)
- [x] Admin import working (via SyncSinta component)
- [x] H-Index input working (scopus, gs, wos h-index)
- [x] Basic identity fields working

### Gaps Identified
- [x] SINTA Scores NOT in form
- [x] Document/Citation counts NOT in form
- [x] Functional position NOT in form
- [x] Education level NOT in form
- [x] No verification workflow

### To Implement (Choose based on priority)
- [ ] **Priority 1:** Add functional_position & last_education to form (2h)
- [ ] **Priority 2:** Add SINTA score fields to form (1.5h)
- [ ] **Priority 3:** Implement verification workflow (3h)
- [ ] **Priority 4:** Add document/citation count fields (2h) - Optional

---

## 📁 Full Analysis Document

For detailed analysis with code examples, database schema, and implementation guide:

👉 **See: `/docs/SINTA-DATA-SYNC-ANALYSIS.md`** (10 sections, comprehensive)

---

## 🎯 Bottom Line

**Current Status:** 🟡 **Partially Synced**
- ✅ H-Index fields sudah bisa input dosen
- ❌ SINTA Scores masih read-only
- ❌ No verification workflow

**Recommendation:** Implement Option 2 (Full Fix) untuk complete data management capability.

**Timeline:** Next sprint (4.5 hours dev work)

**Priority:** HIGH (Academic data integrity is critical)

---

**Last Updated:** 15 Maret 2026  
**Analysis Status:** ✅ COMPLETE  
**Ready for:** Implementation decision
