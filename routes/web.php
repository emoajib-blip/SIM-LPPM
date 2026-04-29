<?php

use App\Http\Controllers\RoleSwitcherController;
use App\Livewire\Dashboard;
use App\Livewire\Dekan\ProposalIndex as DekanProposalIndex;
use App\Livewire\Installer\InstallerWizard;
use App\Livewire\Notifications\NotificationCenter;
use App\Livewire\Review\CommunityService as ReviewCommunityService;
use App\Livewire\Review\Research as ReviewResearch;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\MasterData;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\SettingsIndex;
use App\Livewire\Settings\TwoFactor;
use App\Livewire\Users\Create as UsersCreate;
use App\Livewire\Users\Edit as UsersEdit;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Show as UsersShow;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// Installer Route - Available only when not installed
Route::get('install', InstallerWizard::class)
    ->name('install');

Route::get('/dev/migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);

        return 'Migrasi Berhasil: '.\Illuminate\Support\Facades\Artisan::output();
    } catch (\Exception $e) {
        return 'Error Migrasi: '.$e->getMessage();
    }
});

Route::get('/health-check', \App\Http\Controllers\HealthCheckController::class)->name('health.check');

Route::redirect('/', 'dashboard', 302);

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('laporan-penelitian', \App\Livewire\Reports\Research::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.research');

    Route::get('laporan-pkm', \App\Livewire\Reports\CommunityService::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.pkm');

    Route::get('laporan-luaran', \App\Livewire\Reports\OutputReports::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.outputs');

    Route::get('laporan-mitra', \App\Livewire\Reports\PartnerCollaboration::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.partners');

    Route::get('/reports/iku', \App\Livewire\Reports\IkuReport::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.iku');

    Route::get('/reports/monitoring', \App\Livewire\Reports\InstitutionalReportMonitoring::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.monitoring');

    Route::get('laporan-monev', \App\Livewire\Reports\MonevReport::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('reports.monev');

    // User Management Routes
    Route::middleware(['role:admin lppm|superadmin'])->prefix('users')->name('users.')->group(function () {
        Route::get('/', UsersIndex::class)->name('index');
        Route::get('import', \App\Livewire\Users\Import::class)->name('import');
        Route::get('import/template', function () {
            if (ob_get_level()) {
                ob_end_clean();
            }

            return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\UsersTemplateExport, 'template-import-users.xlsx');
        })->name('import-template');
        Route::get('sync-sinta', \App\Livewire\AdminLppm\SyncSinta::class)->name('sync-sinta');
        Route::get('create', UsersCreate::class)->name('create');
        Route::get('{user}', UsersShow::class)->name('show');
        Route::get('{user}/edit', UsersEdit::class)->name('edit');
    });

    // SINTA Export Page (Livewire)
    Route::get('export-sinta', \App\Livewire\AdminLppm\ExportSinta::class)
        ->middleware(['permission:module_export_sinta'])
        ->name('export-sinta');

    // SINTA Export Direct Downloads (HTTP Controller — proper file response)
    Route::middleware(['permission:module_export_sinta'])->prefix('export-sinta')->name('export-sinta.')->group(function () {
        Route::get('research', [\App\Http\Controllers\SintaExportController::class, 'downloadResearch'])
            ->name('research');
        Route::get('pkm', [\App\Http\Controllers\SintaExportController::class, 'downloadPkm'])
            ->name('pkm');
    });

    // Research Routes
    Route::middleware(['permission:module_penelitian'])->prefix('research')->name('research.')->group(function () {
        Route::get('/', \App\Livewire\Research\Proposal\Index::class)->name('proposal.index');

        // Only dosen can create proposals
        Route::get('proposal/create', \App\Livewire\Research\Proposal\Create::class)
            ->middleware('role:dosen')
            ->name('proposal.create');

        Route::get('proposal/{proposal}', \App\Livewire\Research\Proposal\Show::class)->name('proposal.show');
        Route::get('proposal/{proposal}/edit', \App\Livewire\Research\Proposal\Edit::class)->name('proposal.edit');

        Route::get('proposal-revision', \App\Livewire\Research\ProposalRevision\Index::class)->name('proposal-revision.index');
        Route::get('proposal-revision/{proposal}', \App\Livewire\Research\ProposalRevision\Show::class)->name('proposal-revision.show');

        // Laporan Kemajuan dihilangkan berdasarkan arahan simplifikasi
        Route::get('progress-report', \App\Livewire\Research\ProgressReport\Index::class)->name('progress-report.index');
        Route::get('progress-report/{proposal}', \App\Livewire\Reports\Show::class)
            ->name('progress-report.show')
            ->defaults('type', 'research-progress');

        Route::get('final-report', \App\Livewire\Research\FinalReport\Index::class)->name('final-report.index');
        Route::get('final-report/{proposal}', \App\Livewire\Research\FinalReport\Show::class)
            ->name('final-report.show');

        Route::get('daily-note', \App\Livewire\Research\DailyNote\Index::class)->name('daily-note.index');
        Route::get('daily-note/{proposal}', \App\Livewire\Research\DailyNote\Show::class)->name('daily-note.show');
    });

    // Policy & Recognition Routes
    Route::middleware(['permission:module_rekognisi'])->prefix('recognition')->name('recognition.')->group(function () {
        Route::get('policy-involvement', \App\Livewire\Lecturer\PolicyInvolvement\Index::class)->name('policy-involvement.index');
    });

    // Community Service Routes
    Route::middleware(['permission:module_pengabdian'])->prefix('community-service')->name('community-service.')->group(function () {
        Route::get('/', \App\Livewire\CommunityService\Proposal\Index::class)->name('proposal.index');

        // Only dosen can create proposals
        Route::get('proposal/create', \App\Livewire\CommunityService\Proposal\Create::class)
            ->middleware('role:dosen')
            ->name('proposal.create');

        Route::get('proposal/{proposal}', \App\Livewire\CommunityService\Proposal\Show::class)->name('proposal.show');
        Route::get('proposal/{proposal}/edit', \App\Livewire\CommunityService\Proposal\Edit::class)->name('proposal.edit');

        Route::get('proposal-revision', \App\Livewire\CommunityService\ProposalRevision\Index::class)->name('proposal-revision.index');
        Route::get('proposal-revision/{proposal}', \App\Livewire\CommunityService\ProposalRevision\Show::class)->name('proposal-revision.show');

        // Laporan Kemajuan dihilangkan berdasarkan arahan simplifikasi
        Route::get('progress-report', \App\Livewire\CommunityService\ProgressReport\Index::class)->name('progress-report.index');
        Route::get('progress-report/{proposal}', \App\Livewire\Reports\Show::class)
            ->name('progress-report.show')
            ->defaults('type', 'community-service-progress');

        Route::get('final-report', \App\Livewire\CommunityService\FinalReport\Index::class)->name('final-report.index');
        Route::get('final-report/{proposal}', \App\Livewire\CommunityService\FinalReport\Show::class)
            ->name('final-report.show');

        Route::get('daily-note', \App\Livewire\CommunityService\DailyNote\Index::class)->name('daily-note.index');
        Route::get('daily-note/{proposal}', \App\Livewire\CommunityService\DailyNote\Show::class)->name('daily-note.show');
    });

    // IKU Dashboard & Verification (Standardized access for Rektor/Kepala LPPM)
    Route::get('/iku', \App\Livewire\Iku\IkuDashboard::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('accreditation.hub');

    Route::get('/iku/verification', \App\Livewire\Iku\IkuVerification::class)
        ->middleware(['role:admin lppm|rektor|kepala lppm'])
        ->name('accreditation.verification');

    // Dekan Routes
    Route::middleware(['permission:module_persetujuan_dekan'])->prefix('dekan')->name('dekan.')->group(function () {
        Route::get('proposals', DekanProposalIndex::class)->name('proposals.index');
        Route::get('reports', \App\Livewire\Dekan\ReportIndex::class)->name('reports.index');
        Route::get('riwayat-persetujuan', \App\Livewire\Dekan\ApprovalHistory::class)->name('approval-history');
    });

    // Kaprodi Routes
    Route::middleware(['permission:module_persetujuan_kaprodi'])->prefix('kaprodi')->name('kaprodi.')->group(function () {
        Route::get('proposals', \App\Livewire\Kaprodi\ProposalValidation::class)->name('proposals.index');
    });

    // Review Routes
    Route::middleware(['permission:module_review'])->prefix('review')->name('review.')->group(function () {
        Route::get('research', ReviewResearch::class)->name('research');
        Route::get('community-service', ReviewCommunityService::class)->name('community-service');
        Route::get('riwayat-review', \App\Livewire\Review\ReviewHistory::class)->name('review-history');
        Route::get('monev', \App\Livewire\Reviewer\Monev\Index::class)->name('monev');
    });

    // Kepala LPPM Routes
    Route::middleware(['role:kepala lppm|rektor'])->prefix('kepala-lppm')->name('kepala-lppm.')->group(function () {
        Route::get('persetujuan-awal', \App\Livewire\KepalaLppm\InitialApproval::class)->name('initial-approval');
        Route::get('persetujuan-akhir', \App\Livewire\KepalaLppm\FinalDecision::class)->name('final-decision');
        Route::get('persetujuan-laporan', \App\Livewire\KepalaLppm\ReportApproval::class)->name('report-approval');
        Route::get('monev/recap', \App\Livewire\KepalaLppm\Monev\MonevRecap::class)->name('monev.recap');
        Route::get('monev/dashboard', \App\Livewire\Rektor\MonevDashboard::class)->name('rektor.monev-dashboard');
    });

    // Admin LPPM Routes
    Route::prefix('admin-lppm')->name('admin-lppm.')->group(function () {
        // Reviewer Management
        Route::middleware(['permission:module_reviewer_management'])->group(function () {
            Route::get('penugasan-reviewer', \App\Livewire\AdminLppm\ReviewerAssignment::class)->name('assign-reviewers');
            Route::get('beban-kerja-reviewer', \App\Livewire\AdminLppm\ReviewerWorkload::class)->name('reviewer-workload');
            Route::get('monitoring-review', \App\Livewire\AdminLppm\ReviewMonitoring::class)->name('review-monitoring');
        });

        // Monev
        Route::get('monev', \App\Livewire\AdminLppm\Monev\MonevIndex::class)
            ->middleware('permission:module_monev')
            ->name('monev.index');
        // route for global audit log access outside settings tab
        Route::get('audit-log', \App\Livewire\Settings\AuditLog::class)
            ->name('audit-log');
    });

    Route::get('settings', SettingsIndex::class)
        ->middleware(['auth', 'verified'])
        ->name('settings');

    // Archive Management
    Route::get('admin/archives', \App\Livewire\Admin\Archive\ManageArchives::class)
        ->middleware(['permission:module_arsip_data'])
        ->name('admin.archives');

    Route::redirect('settings/profile', '/settings')->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)
        ->middleware(['permission:module_pengaturan'])
        ->name('settings.appearance');

    Route::middleware(['role:admin lppm|superadmin'])->group(function () {
        Route::get('settings/master-data', MasterData::class)->name('settings.master-data');
        Route::get('settings/proposal-schedule', \App\Livewire\Settings\ProposalSchedule::class)->name('settings.proposal-schedule');
        Route::get('settings/proposal-template', \App\Livewire\Settings\ProposalTemplate::class)->name('settings.proposal-template');
        Route::get('admin/eligibility-dashboard', \App\Livewire\Admin\EligibilityDashboard::class)->name('admin.eligibility-dashboard');
    });

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    // Notification Routes
    Route::get('notifications', NotificationCenter::class)
        ->middleware(['auth', 'verified'])
        ->name('notifications');

    // Role Switcher Route
    Route::post('role/switch', [RoleSwitcherController::class, 'switch'])
        ->name('role.switch');

    // PDF Export Route
    Route::get('proposals/{proposal}/export-pdf', [\App\Http\Controllers\ProposalExportController::class, 'download'])
        ->name('proposals.export-pdf');

    Route::get('proposals/{proposal}/preview-pdf', [\App\Http\Controllers\ProposalExportController::class, 'preview'])
        ->name('proposals.preview-pdf');

    Route::get('reports/{proposal}/export-pdf', [\App\Http\Controllers\ProposalExportController::class, 'downloadReport'])
        ->name('reports.export-pdf');

    Route::get('reviewers/{proposalReviewer}/export-pdf', [\App\Http\Controllers\ReviewExportController::class, 'download'])
        ->name('reviewers.export-pdf');

    Route::get('daily-notes/{proposal}/export-pdf', [\App\Http\Controllers\DailyNoteExportController::class, 'download'])
        ->name('daily-notes.export-pdf');

    Route::get('media/{media:uuid}/download', [\App\Http\Controllers\MediaDownloadController::class, 'download'])
        ->middleware(['auth'])
        ->name('media.download');

    Route::get('monev/{id}/ba-pdf', [\App\Http\Controllers\ReportExportController::class, 'monevBaPdf'])
        ->name('export.monev.ba');
});

require __DIR__.'/auth.php';

Route::get('/verify/reports/{institutionalReport}', [\App\Http\Controllers\ReportVerificationController::class, 'show'])
    ->middleware(['signed'])
    ->name('reports.verify');

Route::get('/verify/signatures/{documentSignature}', [\App\Http\Controllers\DocumentSignatureVerificationController::class, 'show'])
    ->middleware(['signed'])
    ->name('signatures.verify');

// Rute Ekspor Laporan via Standar HTTP (Bypass Livewire)
Route::group(['middleware' => ['auth', 'verified', 'permission:module_laporan']], function () {
    Route::get('/laporan-penelitian/export/pdf', [\App\Http\Controllers\ReportExportController::class, 'researchPdf'])->name('reports.research.pdf');
    Route::get('/laporan-penelitian/export/excel', [\App\Http\Controllers\ReportExportController::class, 'researchExcel'])->name('reports.research.excel');

    Route::get('/laporan-pkm/export/pdf', [\App\Http\Controllers\ReportExportController::class, 'pkmPdf'])->name('reports.pkm.pdf');
    Route::get('/laporan-pkm/export/excel', [\App\Http\Controllers\ReportExportController::class, 'pkmExcel'])->name('reports.pkm.excel');

    Route::get('/laporan-luaran/export/pdf', [\App\Http\Controllers\ReportExportController::class, 'outputPdf'])->name('reports.output.pdf');
    Route::get('/laporan-luaran/export/excel', [\App\Http\Controllers\ReportExportController::class, 'outputExcel'])->name('reports.output.excel');

    Route::get('/laporan-mitra/export/pdf', [\App\Http\Controllers\ReportExportController::class, 'partnerPdf'])->name('reports.partner.pdf');
    Route::get('/laporan-mitra/export/excel', [\App\Http\Controllers\ReportExportController::class, 'partnerExcel'])->name('reports.partner.excel');

    Route::get('/admin/dashboard/export-research', [\App\Http\Controllers\ReportExportController::class, 'dashboardResearchExport'])->name('admin.dashboard.export-research');

    Route::get('/monev/export-recap', [\App\Http\Controllers\ReportExportController::class, 'monevRecapExcel'])->name('export.monev.recap');
    Route::get('/laporan-monev/export/pdf', [\App\Http\Controllers\ReportExportController::class, 'monevPdf'])->name('reports.monev.pdf');

    // IKU Exports
    Route::get('/admin/iku/export-pdf', [\App\Http\Controllers\ReportExportController::class, 'ikuPdf'])->name('admin.iku.export-pdf');
    Route::get('/admin/iku/export-excel', [\App\Http\Controllers\ReportExportController::class, 'ikuExcel'])->name('admin.iku.export-excel');
});

// Archive Export Routes - Should match archive module permission
Route::group(['middleware' => ['auth', 'verified', 'permission:module_arsip_data']], function () {
    Route::get('/admin/archives/export', [\App\Http\Controllers\ReportExportController::class, 'archiveExport'])->name('admin.archives.export');
    Route::get('/admin/archives/template', [\App\Http\Controllers\ReportExportController::class, 'archiveTemplate'])->name('admin.archives.template');
});

// IKU Dashboard removed from here - moved to shared role-based group above
