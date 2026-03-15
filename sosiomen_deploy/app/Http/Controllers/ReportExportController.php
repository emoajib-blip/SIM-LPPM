<?php

namespace App\Http\Controllers;

use App\Actions\Reports\GetPartnerReportQuery;
use App\Models\Proposal;
use App\Traits\HasIkuCalculations;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportController extends Controller
{
    use HasIkuCalculations;

    public function ikuPdf(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $ikuMetrics = $this->getIkuMetrics($period);

            $institution = \App\Models\Institution::first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            $lppmHead = \App\Models\User::role('kepala lppm')->with('identity')->first();

            $institutionalReport = \App\Models\InstitutionalReport::where('type', 'iku')
                ->where('year', $period)
                ->first();

            $pdf = Pdf::loadView('reports.iku-report-pdf', [
                'ikuMetrics' => $ikuMetrics,
                'period' => $period,
                'institution' => $institution,
                'rektor' => $rektor,
                'lppmHead' => $lppmHead,
                'institutionalReport' => $institutionalReport,
            ])->setPaper('a4', 'portrait');

            return $pdf->download('laporan-rekap-iku-'.$period.'-'.now()->format('YmdHis').'.pdf');
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('IKU PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh PDF: '.$e->getMessage());
        }
    }

    public function ikuExcel(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));

            $download = Excel::download(
                new \App\Exports\IkuReportExport($period),
                'laporan-rekap-iku-'.$period.'-'.now()->format('YmdHis').'.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            Log::error('IKU Excel Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Excel: '.$e->getMessage());
        }
    }

    // ====== PENELITIAN ======
    public function researchPdf(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $search = $request->query('search');
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');
            $isPreview = $request->boolean('preview');

            $proposals = Proposal::query()
                ->where('detailable_type', 'App\Models\Research')
                ->where('start_year', $period)
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($sub) use ($search) {
                        $sub->where('title', 'like', "%{$search}%")
                            ->orWhereHas('submitter', fn ($u) => $u->where('name', 'like', "%{$search}%"));
                    });
                })
                ->when($scheme && $scheme !== 'all', fn ($q) => $q->where('research_scheme_id', $scheme))
                ->when($faculty && $faculty !== 'all', function ($q) use ($faculty) {
                    $q->whereHas('submitter.identity', fn ($i) => $i->where('faculty_id', $faculty));
                })
                ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'researchScheme', 'budgetItems'])
                ->latest()
                ->get();

            $institutionalReport = \App\Models\InstitutionalReport::where('type', 'research')
                ->where('year', $period)
                ->first();

            $institution = \App\Models\Institution::first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            $lppmHead = \App\Models\User::role('kepala lppm')->with('identity')->first();

            $pdf = Pdf::loadView('reports.research-pdf', [
                'proposals' => $proposals,
                'period' => $period,
                'institution' => $institution,
                'rektor' => $rektor,
                'lppmHead' => $lppmHead,
                'institutionalReport' => $institutionalReport,
                'isPreview' => $isPreview,
            ])->setPaper('a4', 'landscape');

            $filename = ($isPreview ? 'PREVIEW-' : '').'laporan-penelitian-'.$period.'-'.now()->format('YmdHis').'.pdf';

            return $pdf->download($filename);
        } catch (\Exception $e) {

            Log::error('Research PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh PDF: '.$e->getMessage());
        }
    }

    public function researchExcel(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $search = $request->query('search');
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');

            $download = Excel::download(
                new \App\Exports\ResearchReportExport($period, $search, $scheme, $faculty),
                'laporan-penelitian-'.$period.'-'.now()->format('YmdHis').'.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            Log::error('Research Excel Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Excel: '.$e->getMessage());
        }
    }

    // ====== PENGABDIAN (PKM) ======
    public function pkmPdf(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $search = $request->query('search');
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');
            $isPreview = $request->boolean('preview');

            $proposals = Proposal::query()
                ->where('detailable_type', 'App\Models\CommunityService')
                ->where('start_year', $period)
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($sub) use ($search) {
                        $sub->where('title', 'like', "%{$search}%")
                            ->orWhereHas('submitter', fn ($u) => $u->where('name', 'like', "%{$search}%"));
                    });
                })
                ->when($scheme && $scheme !== 'all', fn ($q) => $q->where('research_scheme_id', $scheme))
                ->when($faculty && $faculty !== 'all', function ($q) use ($faculty) {
                    $q->whereHas('submitter.identity', fn ($i) => $i->where('faculty_id', $faculty));
                })
                ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'researchScheme', 'budgetItems'])
                ->latest()
                ->get();

            $institutionalReport = \App\Models\InstitutionalReport::where('type', 'pkm')
                ->where('year', $period)
                ->first();

            $institution = \App\Models\Institution::first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            $lppmHead = \App\Models\User::role('kepala lppm')->with('identity')->first();

            $pdf = Pdf::loadView('reports.community-service-pdf', [
                'proposals' => $proposals,
                'period' => $period,
                'institution' => $institution,
                'rektor' => $rektor,
                'lppmHead' => $lppmHead,
                'institutionalReport' => $institutionalReport,
                'isPreview' => $isPreview,
            ])->setPaper('a4', 'landscape');

            $filename = ($isPreview ? 'PREVIEW-' : '').'laporan-pkm-'.$period.'-'.now()->format('YmdHis').'.pdf';

            return $pdf->download($filename);
        } catch (\Exception $e) {

            Log::error('PKM PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh PDF: '.$e->getMessage());
        }
    }

    public function pkmExcel(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $search = $request->query('search');
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');

            $download = Excel::download(
                new \App\Exports\CommunityServiceReportExport($period, $search, $scheme, $faculty),
                'laporan-pkm-'.$period.'-'.now()->format('YmdHis').'.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('PKM Excel Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Excel: '.$e->getMessage());
        }
    }

    // ====== LUARAN ======
    public function outputPdf(Request $request)
    {

        try {
            $activeTab = $request->query('activeTab', 'research');
            $search = $request->query('search', '');
            $outputType = $request->query('outputType', 'all');
            $period = $request->query('period', date('Y'));
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');
            $isPreview = $request->boolean('preview');

            $proposals = $this->getOutputProposalsQuery($activeTab, $search, $outputType, $period, $scheme, $faculty)->get();

            $institutionalReport = \App\Models\InstitutionalReport::where('type', 'output')
                ->where('year', $period)
                ->first();

            $institution = \App\Models\Institution::first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            $lppmHead = \App\Models\User::role('kepala lppm')->with('identity')->first();

            $pdf = Pdf::loadView('reports.output-reports-pdf', [
                'proposals' => $proposals,
                'activeTab' => $activeTab,
                'outputType' => $outputType,
                'period' => $period,
                'institution' => $institution,
                'rektor' => $rektor,
                'lppmHead' => $lppmHead,
                'institutionalReport' => $institutionalReport,
                'isPreview' => $isPreview,
            ])->setPaper('a4', 'landscape');

            $filename = ($isPreview ? 'PREVIEW-' : '').'laporan-luaran-'.$activeTab.'-'.now()->format('YmdHis').'.pdf';

            return $pdf->download($filename);
        } catch (\Exception $e) {

            Log::error('Output PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh PDF: '.$e->getMessage());
        }
    }

    public function outputExcel(Request $request)
    {

        try {
            $activeTab = $request->query('activeTab', 'research');
            $search = $request->query('search', '');
            $outputType = $request->query('outputType', 'all');
            $period = $request->query('period', date('Y'));
            $scheme = $request->query('scheme');
            $faculty = $request->query('faculty');

            $download = Excel::download(
                new \App\Exports\OutputReportExport($activeTab, $search, $outputType, $period, $scheme, $faculty),
                'laporan-luaran-'.$activeTab.'-'.now()->format('YmdHis').'.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            Log::error('Output Excel Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Excel: '.$e->getMessage());
        }
    }

    protected function getOutputProposalsQuery($activeTab, $search, $outputType, $period = null, $scheme = null, $faculty = null)
    {
        $detailableType = $activeTab === 'research' ? 'App\\Models\\Research' : 'App\\Models\\CommunityService';

        $query = Proposal::query()
            ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'progressReports.mandatoryOutputs.proposalOutput', 'progressReports.additionalOutputs.proposalOutput'])
            ->where('detailable_type', $detailableType)
            ->when($period, fn ($q) => $q->where('start_year', $period))
            ->where(function (Builder $query) {
                $query->whereHas('progressReports.mandatoryOutputs')
                    ->orWhereHas('progressReports.additionalOutputs');
            });

        if ($search) {
            $query->where(function (Builder $q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('submitter', function (Builder $u) use ($search) {
                        $u->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($scheme && $scheme !== 'all') {
            $query->where('research_scheme_id', $scheme);
        }

        if ($faculty && $faculty !== 'all') {
            $query->whereHas('submitter.identity', function ($q) use ($faculty) {
                $q->where('faculty_id', $faculty);
            });
        }

        if ($outputType === 'mandatory') {
            $query->whereHas('progressReports.mandatoryOutputs');
        } elseif ($outputType === 'additional') {
            $query->whereHas('progressReports.additionalOutputs');
        }

        return $query->latest();
    }

    // ====== MITRA ======
    public function partnerPdf(Request $request, GetPartnerReportQuery $action)
    {

        try {
            $search = $request->query('search', '');
            $typeFilter = $request->query('typeFilter', '');
            $periodFilter = $request->query('periodFilter', '');

            $partners = $action->handle($search, $typeFilter, $periodFilter)->get();

            $institutionalReport = \App\Models\InstitutionalReport::where('type', 'partner')
                ->where('year', $periodFilter ?: date('Y'))
                ->first();

            $institution = \App\Models\Institution::first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            $lppmHead = \App\Models\User::role('kepala lppm')->with('identity')->first();

            $pdf = Pdf::loadView('reports.partner-collaboration-pdf', [
                'partners' => $partners,
                'periodFilter' => $periodFilter,
                'typeFilter' => $typeFilter,
                'institution' => $institution,
                'rektor' => $rektor,
                'lppmHead' => $lppmHead,
                'institutionalReport' => $institutionalReport,
            ])->setPaper('a4', 'landscape');

            return $pdf->download('laporan-mitra-'.now()->format('Y-m-d').'.pdf');
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('Partner PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh PDF: '.$e->getMessage());
        }
    }

    public function partnerExcel(Request $request)
    {

        try {
            $search = $request->query('search', '');
            $typeFilter = $request->query('typeFilter', '');
            $periodFilter = $request->query('periodFilter', '');

            $download = Excel::download(
                new \App\Exports\PartnerCollaborationExport($search, $typeFilter, $periodFilter),
                'laporan-mitra-'.now()->format('Y-m-d').'.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('Partner Excel Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Excel: '.$e->getMessage());
        }
    }

    // ====== ARSIP ======
    public function archiveExport(Request $request)
    {

        try {
            $search = $request->query('search', '');
            $yearFilter = $request->query('yearFilter', '');
            $filename = 'Export_Arsip_Kegiatan_'.date('Ymd_His').'.xlsx';

            $download = Excel::download(
                new \App\Exports\ArchiveDataExport($search, $yearFilter),
                $filename
            );

            return $download;
        } catch (\Exception $e) {

            Log::error('Archive Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Export: '.$e->getMessage());
        }
    }

    public function archiveTemplate()
    {

        try {
            $download = Excel::download(
                new \App\Exports\ArchiveTemplateExport,
                'template_import_arsip.xlsx'
            );

            return $download;
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('Archive Template Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Template: '.$e->getMessage());
        }
    }

    public function dashboardResearchExport(Request $request)
    {

        try {
            $period = $request->query('period', date('Y'));
            $filename = "research-proposals-{$period}.xlsx";

            /** Vetted by AI - Manual Review Required by Senior Engineer/Manager */
            $download = Excel::download(
                new \App\Exports\ResearchProposalExport((int) $period),
                $filename
            );

            return $download;
        } catch (\Exception $e) {

            Log::error('Dashboard Research Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh Export: '.$e->getMessage());
        }
    }

    /**
     * Export Monev Recap to Excel.
     */
    public function monevRecapExcel(Request $request)
    {
        $request->validate([
            'academic_year' => 'required|string',
            'semester' => 'nullable|in:ganjil,genap',
        ]);

        $academicYear = $request->academic_year;
        $semester = $request->semester;

        $fileName = "Monev_Recap_{$academicYear}_".($semester ?? 'all').'.xlsx';

        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\MonevRecapExport($academicYear, $semester), $fileName);
    }
}
