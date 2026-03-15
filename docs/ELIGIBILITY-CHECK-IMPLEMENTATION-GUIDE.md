╔═══════════════════════════════════════════════════════════════════════════╗
║                                                                           ║
║              ELIGIBILITY CHECK IMPLEMENTATION GUIDE                       ║
║                  Pre-Submission & Admin Dashboard                         ║
║                                                                           ║
║                     16 Maret 2026 | Effort: ~4 hours                      ║
║                                                                           ║
╚═══════════════════════════════════════════════════════════════════════════╝


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
📋 IMPLEMENTATION SUMMARY
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

✅ COMPLETED COMPONENTS:
1. EligibilityService (app/Services/EligibilityService.php)
   └─ Service layer for eligibility checking logic
   └─ 10+ public methods for checking eligibility
   └─ Supports 7 different requirement types

2. SchemeEligibilityChecker (app/Livewire/Components/SchemeEligibilityChecker.php)
   └─ Pre-submission eligibility check component
   └─ Livewire v4 component for dosen interface
   └─ Real-time eligibility validation

3. EligibilityDashboard (app/Livewire/Admin/EligibilityDashboard.php)
   └─ Admin dashboard for eligibility overview
   └─ Statistics and breakdown by scheme
   └─ Detailed dosen list with reasons

4. Blade Templates:
   └─ resources/views/livewire/components/scheme-eligibility-checker.blade.php
   └─ resources/views/livewire/admin/eligibility-dashboard.blade.php

5. Tests:
   └─ tests/Feature/Services/EligibilityServiceTest.php
   └─ 15+ test cases covering all scenarios


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🔧 INTEGRATION STEPS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

## STEP 1: Add Pre-Submission Check to Research Proposal Form
Location: app/Livewire/Research/Proposal/Create.php (or abstract parent)

Add to mount() method:

    ```php
    public function mount(?string $proposalId = null, ?\App\Models\Proposal $proposal = null): void
    {
        // ... existing code ...

        // NEW: Show eligibility check modal on new proposals
        if (!$proposalToLoad) {
            $this->dispatch('show-eligibility-check');
        }
    }
    ```

Add to render():

    ```php
    public function render()
    {
        return view('livewire.research.proposal.create', [
            'eligibleSchemes' => app(EligibilityService::class)
                ->getEligibleResearchSchemes(Auth::user()->identity),
        ]);
    }
    ```


## STEP 2: Add Component to Proposal Create View
Location: resources/views/livewire/research/proposal/create.blade.php

Add near top of form (after page header):

    ```blade
    @if ($this->currentStep === 1)
        <livewire:components.scheme-eligibility-checker 
            schemeType="research" 
            wire:key="eligibility-checker-{{ rand() }}"
        />
    @endif
    ```


## STEP 3: Register Admin Route for Dashboard
Location: routes/web.php

Add route (inside admin middleware group):

    ```php
    Route::middleware(['role:admin lppm'])->group(function () {
        // ... existing routes ...

        Route::get('/admin/eligibility-dashboard', \App\Livewire\Admin\EligibilityDashboard::class)
            ->name('admin.eligibility.dashboard');
    });
    ```


## STEP 4: Add Admin Navigation Link
Location: resources/views/layouts/navigation.blade.php or admin sidebar

Add menu item:

    ```blade
    @role('admin lppm')
        <a href="{{ route('admin.eligibility.dashboard') }}" 
           class="nav-link {{ request()->routeIs('admin.eligibility.*') ? 'active' : '' }}">
            <x-lucide-bar-chart-3 class="w-4 h-4" />
            <span>Eligibility Dashboard</span>
        </a>
    @endrole
    ```


## STEP 5: Add Event Listener in Proposal Create Component
Location: app/Livewire/Research/Proposal/Create.php

Add Livewire event handler:

    ```php
    #[On('scheme-selected')]
    public function onSchemeSelected(string $schemeId, string $schemeType): void
    {
        if ($schemeType === 'research') {
            $this->form->research_scheme_id = $schemeId;
            // Trigger scheme-specific setup (already done in updatedFormResearchSchemeId)
            $this->updatedFormResearchSchemeId();
        }
    }
    ```


## STEP 6: Run Tests
In terminal:

    ```bash
    php artisan test tests/Feature/Services/EligibilityServiceTest.php
    ```

Expected: 15+ tests passing


## STEP 7: Format & Lint
In terminal:

    ```bash
    vendor/bin/pint --dirty
    ```


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🎯 FEATURE BREAKDOWN
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

### FEATURE 1: PRE-SUBMISSION ELIGIBILITY CHECK
Where: /research/create (Step 1, before dosen fills form)
Who: Dosen/Lecturer
When: Before selecting research scheme

Flow:
  1. Dosen navigates to /research/create
  2. System displays SchemeEligibilityChecker component
  3. Component loads eligible schemes for dosen
  4. Shows 3 sections:
     - ✅ Eligible schemes (can select)
     - ❌ Ineligible schemes (with reasons)
     - 📋 Eligibility summary card
  5. Dosen clicks scheme → modal shows detailed requirements
  6. If eligible → can proceed to form
  7. If ineligible → shows improvement suggestions

Components Used:
  - SchemeEligibilityChecker (Livewire)
  - scheme-eligibility-checker.blade.php

Requirements Checked:
  ✅ Min SINTA Score
  ✅ Min Scopus H-Index
  ✅ Functional Position
  ✅ Scopus Documents
  ✅ Scopus Citations
  ✅ Education Level
  ✅ Affiliation Score


### FEATURE 2: ADMIN ELIGIBILITY DASHBOARD
Where: /admin/eligibility-dashboard
Who: Admin LPPM
When: Strategic planning / monitoring

Stats Displayed:
  📊 Total Dosen
  📊 Active Schemes
  📊 Average Eligibility %
  📊 Per-scheme breakdown:
     - Eligible count
     - Ineligible count
     - Eligibility percentage
     - Progress bar

Detailed View:
  - Click scheme → see eligible/ineligible dosen list
  - Expandable rows showing specific reasons
  - Export CSV button for reporting
  - Real-time calculations

Components Used:
  - EligibilityDashboard (Livewire)
  - eligibility-dashboard.blade.php

Data Shown:
  - Total dosen per scheme
  - Breakdown by failure reason
  - Individual dosen eligibility status
  - Failed checks with current vs required values


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚙️  SERVICE LAYER: EligibilityService
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Location: app/Services/EligibilityService.php

Public Methods:

1. canSubmitResearchProposal(Identity, ResearchScheme): bool
   └─ Quick check if dosen eligible
   └─ Returns true/false only

2. getEligibilityStatus(Identity, array $rules): array
   └─ Detailed eligibility check
   └─ Returns: ['eligible' => bool, 'passed_checks' => [], 'failed_checks' => []]

3. getEligibleResearchSchemes(Identity): Collection
   └─ All eligible schemes for dosen
   └─ Filters active schemes

4. getIneligibleResearchSchemes(Identity): Collection
   └─ All ineligible schemes with reasons
   └─ Shows why dosen not eligible

5. countEligibleForResearchScheme(ResearchScheme): int
   └─ How many dosen eligible for scheme
   └─ Admin dashboard stat

6. getResearchSchemeEligibilityBreakdown(ResearchScheme): array
   └─ Breakdown by failure reason
   └─ Returns: ['total_dosen', 'eligible', 'ineligible', 'ineligible_by_reason' => []]

7. getDetailedResearchSchemeEligibility(ResearchScheme): Collection
   └─ Full detail for each dosen
   └─ Returns collection with eligibility + reasons for each


Requirements Supported:
  ✅ min_sinta_score
  ✅ min_scopus_score
  ✅ allowed_functional_positions
  ✅ min_scopus_documents
  ✅ min_scopus_citations
  ✅ min_education_level
  ✅ min_affiliation_score

Easy to extend with more requirements!


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🧪 TEST COVERAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Location: tests/Feature/Services/EligibilityServiceTest.php

Test Groups:

1. checkEligibility (9 tests)
   - All requirements met
   - SINTA score below minimum
   - Scopus H-Index below minimum
   - Functional position not allowed
   - Multiple requirements fail
   - Scopus documents below minimum
   - Scopus citations below minimum
   - Education level below minimum
   - Affiliation score below minimum

2. canSubmitResearchProposal (2 tests)
   - Returns true when eligible
   - Returns false when ineligible

3. getEligibleResearchSchemes (1 test)
   - Filters schemes correctly

4. countEligibleForResearchScheme (1 test)
   - Counts correctly

5. getResearchSchemeEligibilityBreakdown (1 test)
   - Breakdown accurate

6. getDetailedResearchSchemeEligibility (1 test)
   - Returns required fields

Total: 15 tests covering all scenarios


Run Tests:
    php artisan test tests/Feature/Services/EligibilityServiceTest.php

Run Specific Test:
    php artisan test tests/Feature/Services/EligibilityServiceTest.php --filter="returns_eligible_when"


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
📊 DATA FLOW DIAGRAM
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

PRE-SUBMISSION ELIGIBILITY CHECK:

    Dosen
      ↓ (opens /research/create)
    SchemeEligibilityChecker Component
      ├─ mount()
      └─ loadEligibilityData()
        ├─ Auth::user()->identity
        └─ EligibilityService::getEligibleResearchSchemes(identity)
            ├─ ResearchScheme::where('is_active', true)->get()
            └─ foreach scheme: checkEligibility(identity, scheme.rules)
                └─ return eligible/ineligible schemes
      ↓
    Display Scheme List
      ├─ ✅ Eligible schemes (green)
      └─ ❌ Ineligible schemes (red, expandable)
      ↓
    Dosen clicks scheme
      ↓
    checkEligibility() modal
      ├─ Show requirements passed
      └─ Show requirements failed
      ↓
    If eligible: Select Scheme → form continues
    If ineligible: Cannot select → must improve profile


ADMIN ELIGIBILITY DASHBOARD:

    Admin
      ↓ (opens /admin/eligibility-dashboard)
    EligibilityDashboard Component
      ├─ loadDashboardData()
      └─ ResearchScheme::where('is_active', true)->get()
        ├─ foreach scheme:
        │  └─ EligibilityService::getResearchSchemeEligibilityBreakdown(scheme)
        │     └─ Identity::get() → checkEligibility(each identity, scheme.rules)
        └─ Build stats array
      ↓
    Display Summary Stats
      ├─ Total Dosen
      ├─ Active Schemes
      └─ Average Eligibility %
      ↓
    Display Schemes Grid
      ├─ Each scheme shows:
      │  ├─ Total dosen
      │  ├─ Eligible count
      │  ├─ Ineligible count
      │  ├─ Eligibility %
      │  └─ Progress bar
      └─ Click for detail
      ↓
    Detail Panel
      ├─ Breakdown by reason (SINTA, Scopus, etc)
      ├─ Tab: Eligible dosen list
      ├─ Tab: Ineligible dosen with reasons
      └─ Export CSV button


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⚡ QUICK REFERENCE: Adding New Requirements
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

To add a new requirement type (e.g., min_wos_h_index):

1. Edit EligibilityService.php → checkEligibility() method
   Add section after other checks:

    ```php
    // Check Minimum WoS H-Index
    if (isset($rules['min_wos_h_index'])) {
        $minScore = (float) $rules['min_wos_h_index'];
        $currentScore = (float) ($identity->wos_h_index ?? 0);

        if ($currentScore >= $minScore) {
            $passedChecks[] = [
                'name' => 'WoS H-Index',
                'required' => $minScore,
                'current' => $currentScore,
                'type' => 'numeric',
            ];
        } else {
            $failedChecks[] = [
                'name' => 'WoS H-Index',
                'required' => $minScore,
                'current' => $currentScore,
                'type' => 'numeric',
                'message' => "WoS H-Index Anda ({$currentScore}) di bawah minimum ({$minScore})",
            ];
        }
    }
    ```

2. Add field to ResearchScheme eligibility_rules in admin panel
   └─ Schema already supports JSON any keys

3. Add test case in EligibilityServiceTest.php
   └─ Test the new requirement validation

4. Done! Component automatically supports new requirement


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
✅ PRE-DEPLOYMENT CHECKLIST
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Code Review:
  ☐ EligibilityService.php (app/Services/)
  ☐ SchemeEligibilityChecker.php (app/Livewire/Components/)
  ☐ EligibilityDashboard.php (app/Livewire/Admin/)
  ☐ scheme-eligibility-checker.blade.php
  ☐ eligibility-dashboard.blade.php
  ☐ EligibilityServiceTest.php

Testing:
  ☐ Run all tests: php artisan test
  ☐ Run specific tests: php artisan test tests/Feature/Services/EligibilityServiceTest.php
  ☐ Test pre-submission check manually
  ☐ Test admin dashboard manually
  ☐ Test with multiple schemes and dosen

Deployment:
  ☐ Format code: vendor/bin/pint --dirty
  ☐ Check for errors: vendor/bin/phpstan
  ☐ Verify routes added to web.php
  ☐ Verify navigation link added
  ☐ Test in staging environment
  ☐ Merge to main branch
  ☐ Deploy to production

Documentation:
  ☐ Update team wiki/docs
  ☐ Add to changelog
  ☐ Create admin documentation
  ☐ Create user documentation for dosen


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🚀 GOING LIVE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

1. Test in Development:
   ```bash
   php artisan test tests/Feature/Services/EligibilityServiceTest.php --verbose
   ```

2. Format Code:
   ```bash
   vendor/bin/pint --dirty
   ```

3. Commit Changes:
   ```bash
   git add .
   git commit -m "feat: add pre-submission eligibility check and admin dashboard"
   ```

4. Push to Branch:
   ```bash
   git push origin feature/eligibility-check
   ```

5. Create Pull Request and Request Review

6. After Approval, Merge to Main:
   ```bash
   git checkout main
   git pull origin main
   git merge feature/eligibility-check
   git push origin main
   ```

7. Deploy to Production:
   ```bash
   # Follow your deployment process
   # Update research/create.blade.php
   # Add route to web.php
   # Add navigation link
   ```


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
📞 SUPPORT & MAINTENANCE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Troubleshooting:

Q: SchemeEligibilityChecker not showing schemes?
A: Check identity is loaded for user
   - Verify: Auth::user()->identity exists
   - Verify: ResearchScheme records exist and is_active = true

Q: Admin dashboard showing 0 eligible dosen?
A: Check identity records have required data
   - Verify: Identity table has sinta_score_v3_overall filled
   - Verify: ResearchScheme has eligibility_rules set

Q: Tests failing?
A: Check test setup
   - Verify: php artisan test works for other tests
   - Verify: Factory definitions correct
   - Verify: Database migrations up to date

Future Enhancements:

1. Email notifications when eligibility status changes
2. Pre-submission warnings for "about to be ineligible"
3. Suggestions for improvement (how to increase SINTA score)
4. Historical tracking of eligibility changes
5. Bulk eligibility report exports


━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Files Created/Modified:
  ✅ app/Services/EligibilityService.php (NEW, 342 lines)
  ✅ app/Livewire/Components/SchemeEligibilityChecker.php (NEW, 85 lines)
  ✅ app/Livewire/Admin/EligibilityDashboard.php (NEW, 116 lines)
  ✅ resources/views/livewire/components/scheme-eligibility-checker.blade.php (NEW, 160 lines)
  ✅ resources/views/livewire/admin/eligibility-dashboard.blade.php (NEW, 330 lines)
  ✅ tests/Feature/Services/EligibilityServiceTest.php (NEW, 330 lines)
  ⏳ routes/web.php (NEEDS: Add route for dashboard)
  ⏳ resources/views/livewire/research/proposal/create.blade.php (NEEDS: Include component)
  ⏳ app/Livewire/Research/Proposal/Create.php (NEEDS: Add event listener)

Total New Code: ~1,500+ lines
Complexity: Medium (service layer + UI components)
Estimated Deployment Time: 30-60 minutes


Status: ✅ READY FOR INTEGRATION
