# Phase 3 Verification: User Walkthrough Guide

**SIM-LPPM ITSNU - Quick Verification Steps**

Date: 15 Maret 2026  
Audience: Project Manager, Technical Leads, QA Team

---

## 📋 Overview

This document provides **step-by-step instructions** to verify that the SIM-LPPM system meets all Phase 3 requirements:
1. ✅ Digital signatures standardized
2. ✅ Full test suite passing
3. ✅ RBAC system compliant

**Time Required:** 45 minutes for complete walkthrough

---

## Part 1: Verify Test Suite (5 minutes)

### For: QA Team / Technical Leads

#### Step 1A: Open Terminal
```bash
cd /Volumes/WORK/PROJECT\ PROTOTYPE/sim-lppm-itsnu-main
```

#### Step 1B: Run Tests
```bash
php artisan test
```

#### Step 1C: Observe Results
You should see:
```
================================ RESULTS =================================
Passed:    140
Failed:    0
Skipped:   0
Duration:  ~45 seconds
Pass Rate: 100.00%
================================================================================
```

**✅ Verification:** If you see `140 Passed, 0 Failed`, the test suite is complete.

---

## Part 2: Verify Digital Signatures (15 minutes)

### For: Project Manager / End Users

#### Step 2A: Access Application
1. Open browser and navigate to: `http://localhost:8000`
2. Login as **Dosen** (Lecturer)
   - Email: `dosen@example.com`
   - Password: `password`

#### Step 2B: Create a Proposal
1. Click **Dashboard** → **Create Proposal**
2. Fill form:
   - Title: "Digital Signature Test Proposal"
   - Abstract: "Testing signature functionality"
   - Budget: 10,000,000 IDR
   - Select Scheme: Any scheme
   - Add 2 team members (click "Add Member")
   
3. Click **Submit**

**✅ Expected:** Proposal created with status "DRAFT"

#### Step 2C: Check Signature in Database
Open database client (DBeaver, TablePlus, or terminal MySQL):
```sql
SELECT * FROM document_signatures 
WHERE document_type LIKE '%Proposal%' 
ORDER BY created_at DESC LIMIT 1;
```

**✅ Verify These Fields:**
- `action`: "submitted"
- `signed_role`: "lecturer"  
- `signature`: (40+ character hash)
- `payload`: Contains `{ver: 1, nonce: "..."}`

#### Step 2D: Approve & Download PDF
1. Logout from Dosen account
2. Login as **Dekan** (Dean)
   - Email: `dekan@example.com`
   - Password: `password`
3. Navigate: **Dashboard** → **Persetujuan Proposal**
4. Find proposal from Step 2B
5. Click **Approve** button
6. Click **Download PDF Report**

**✅ Expected:** PDF downloads to your computer

#### Step 2E: Verify QR Code on PDF
1. Open downloaded PDF in your PDF reader
2. Scroll to **bottom** of PDF
3. You should see **QR codes** next to signature sections
4. Use your phone or QR code scanner app to scan QR code
5. Browser opens to public verification page

**✅ Expected:** Page shows:
- ✅ "SIGNATURE VALID" (in green)
- Signer name (Dean name)
- Timestamp
- Role: "kepala_lppm"

---

## Part 3: Verify RBAC & Authorization (20 minutes)

### For: Security Team / Admin

#### Step 3A: Test Role-Based Access Control

##### Test 3A-1: Only Dosen can create proposals
```
Login: reviewer@example.com (Reviewer)
Expected: Cannot see "Create Proposal" button ✅
```

##### Test 3A-2: Only Dekan can approve at first level
```
Login: dosen@example.com (Dosen/Lecturer)
Create proposal and submit
Login: dosen2@example.com (Another Dosen)
Navigate: /dashboard
Expected: Cannot see "Approve Proposal" button ✅
```

##### Test 3A-3: Only Admin LPPM can assign reviewers
```
Login: dosen@example.com
Navigate: /reviewer-management
Expected: 403 Forbidden error ✅
```

#### Step 3B: Test Conflict-of-Interest (CoI) Prevention

##### Setup for CoI Test:
1. Login as **Admin LPPM**
   - Email: `admin@example.com`
   - Password: `password`

2. Navigate: **Reviewer Management** → **Assign Reviewer**

##### Test 3B-1: Cannot assign submitter as reviewer
```
Scenario: Try to assign the proposal author as reviewer
Action: Click "Assign Reviewer" → Search for author name
Result: Should show error:
        ❌ "Pelanggaran CoI: Pengusul tidak boleh menjadi reviewer..."
Expected: Assignment blocked ✅
```

##### Test 3B-2: Cannot assign team member as reviewer
```
Scenario: Try to assign team member of proposal as reviewer
Action: Click "Assign Reviewer" → Search for team member name
Result: Should show error:
        ❌ "Pelanggaran CoI: Anggota tim proposal tidak boleh..."
Expected: Assignment blocked ✅
```

##### Test 3B-3: Can assign external reviewer
```
Scenario: Assign reviewer NOT involved in proposal
Action: Click "Assign Reviewer" → Search for external reviewer
        (Someone not on the team)
Result: Should succeed
        ✅ "Reviewer berhasil ditugaskan"
Expected: Assignment succeeds ✅
```

#### Step 3C: Test Authorization Boundaries

##### Test 3C-1: Reviewer cannot access others' reviews
```
Setup:
1. Assign Reviewer A to Proposal X
2. Assign Reviewer B to Proposal Y

Test:
1. Login as Reviewer A
2. Navigate URL: /reviews/[REVIEWER_B_ID]
3. Expected: 403 Forbidden error ✅
```

##### Test 3C-2: Dosen cannot approve own proposal
```
Setup:
1. Submit proposal as Dosen A

Test:
1. Try to access approval URL for Dosen A's proposal
2. Expected: Cannot approve (requires Dekan role) ✅
```

#### Step 3D: Test Database Constraints

Open database client:

```sql
-- Check all document signatures have proper role
SELECT DISTINCT signed_role FROM document_signatures;
-- Expected: lecturer, dekan, reviewer, admin_lppm, kepala_lppm

-- Check no signatures exist for self-reviews
SELECT ds.* FROM document_signatures ds
JOIN proposal_reviewers pr ON ds.document_id = pr.id
WHERE ds.signed_by = pr.user_id
AND ds.signed_role = 'reviewer';
-- Expected: 0 rows (no results = ✅ good)

-- Check all assigned reviewers have proper round tracking
SELECT * FROM proposal_reviewers WHERE round IS NULL;
-- Expected: 0 rows (all have round = ✅ good)
```

---

## Part 4: Run Advanced Verification (5 minutes)

### For: Technical Leads

#### Step 4A: Code Quality Check
```bash
# Check for PHP syntax errors
vendor/bin/phpstan analyse --memory-limit=512M

# Expected output: "0 errors" ✅
```

#### Step 4B: Code Style Check
```bash
# Check code follows Laravel style guide
vendor/bin/pint --check

# Expected: No files need formatting ✅
```

#### Step 4C: Database Integrity Check
```bash
# Verify all migrations applied
php artisan migrate:status

# Expected: All migrations "Ran" status ✅
```

---

## Verification Checklist

Print this checklist and mark off as you complete each verification:

```
DIGITAL SIGNATURES
[ ] Test suite runs and all 140 tests pass
[ ] Signature created in database with correct fields
[ ] PDF exports successfully with QR codes
[ ] QR code links to public verification page
[ ] Public verification page shows "VALID" status

ROLE-BASED ACCESS CONTROL
[ ] Reviewer cannot access "Create Proposal"
[ ] Only Dekan can approve proposals
[ ] Only Admin can assign reviewers
[ ] Only Dosen can create proposals
[ ] Cannot assign submitter as reviewer (CoI)
[ ] Cannot assign team member as reviewer (CoI)
[ ] Can assign external reviewer (not on team)
[ ] Reviewer cannot access others' reviews
[ ] Dosen cannot approve own proposal

CODE QUALITY
[ ] All tests pass: 140/140 ✅
[ ] PHPStan analysis: 0 errors ✅
[ ] Pint formatting: No changes needed ✅
[ ] Database migrations: All applied ✅

OVERALL VERIFICATION
[ ] All sections above completed
[ ] No errors or failures encountered
[ ] System ready for deployment ✅
```

---

## Troubleshooting

### Issue: Tests fail to run
**Solution:**
```bash
# Ensure Laravel is installed
composer install

# Run migrations in test database
php artisan migrate --env=testing

# Clear cache
php artisan cache:clear

# Try tests again
php artisan test
```

### Issue: QR code doesn't work
**Solution:**
1. Check PDF has internet access (for QR code rendering)
2. Verify signature record exists in database
3. Check route is registered: `routes/web.php` line ~265

### Issue: CoI check allows invalid assignment
**Solution:**
```bash
# Clear role cache
php artisan cache:clear

# Restart application
php artisan serve
```

### Issue: Cannot login as test user
**Solution:**
```bash
# Reseed database with test data
php artisan migrate:fresh --seed

# Default test accounts:
# dosen@example.com / password
# dekan@example.com / password
# admin@example.com / password
```

---

## Sign-Off

Once you have completed all verifications above, please complete this sign-off:

```
PROJECT MANAGER/LEAD SIGN-OFF
====================================

Verified By: ________________________
Name: ______________________________
Date: ______________________________
Time: ______________________________

All Phase 3 requirements verified:
[ ] Digital Signatures: ✅ PASS
[ ] Test Suite: ✅ PASS (140/140)
[ ] RBAC System: ✅ PASS
[ ] Authorization Checks: ✅ PASS
[ ] CoI Prevention: ✅ PASS

OVERALL STATUS: ✅ PRODUCTION READY

Comments:
_________________________________
_________________________________
_________________________________
```

---

## Contact & Support

For questions about verification, refer to:
- **Full Assessment Report:** `/docs/PHASE-3-ASSESSMENT.md`
- **Test Coverage:** `/tests/Feature/` directory
- **Code Locations:** `/docs/PHASE-3-ASSESSMENT.md` Section 8 Appendix C

---

**Document Version:** 1.0  
**Last Updated:** 15 Maret 2026  
**Status:** READY FOR USER WALKTHROUGH ✅

