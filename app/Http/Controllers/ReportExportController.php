<?php

namespace App\Http\Controllers;

use App\Actions\Reports\GetPartnerReportQuery;
use App\Models\Proposal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportController extends Controller
{
    // ====== PENELITIAN ======
    public function researchPdf(Request $request)
    {
        $period = $request->query('period', date('Y'));

        $proposals = Proposal::query()
            ->where('detailable_type', 'App\Models\Research')
            ->where('start_year', $period)
            ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'researchScheme', 'budgetItems'])
            ->latest()
            ->get();

        $pdf = Pdf::loadView('reports.research-pdf', [
            'proposals' => $proposals,
            'period' => $period,
        ])->setPaper('a4', 'landscape');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return $pdf->download('laporan-penelitian-'.$period.'-'.now()->format('YmdHis').'.pdf');
    }

    public function researchExcel(Request $request)
    {
        $period = $request->query('period', date('Y'));
        if (ob_get_level()) {
            ob_end_clean();
        }

        return Excel::download(
            new \App\Exports\ResearchReportExport($period),
            'laporan-penelitian-'.$period.'-'.now()->format('YmdHis').'.xlsx'
        );
    }

    // ====== PENGABDIAN (PKM) ======
    public function pkmPdf(Request $request)
    {
        $period = $request->query('period', date('Y'));

        $proposals = Proposal::query()
            ->where('detailable_type', 'App\Models\CommunityService')
            ->where('start_year', $period)
            ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'researchScheme', 'budgetItems'])
            ->latest()
            ->get();

        $pdf = Pdf::loadView('reports.community-service-pdf', [
            'proposals' => $proposals,
            'period' => $period,
        ])->setPaper('a4', 'landscape');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return $pdf->download('laporan-pkm-'.$period.'-'.now()->format('YmdHis').'.pdf');
    }

    public function pkmExcel(Request $request)
    {
        $period = $request->query('period', date('Y'));
        if (ob_get_level()) {
            ob_end_clean();
        }

        return Excel::download(
            new \App\Exports\CommunityServiceReportExport($period),
            'laporan-pkm-'.$period.'-'.now()->format('YmdHis').'.xlsx'
        );
    }

    // ====== LUARAN ======
    public function outputPdf(Request $request)
    {
        $activeTab = $request->query('activeTab', 'research');
        $search = $request->query('search', '');
        $outputType = $request->query('outputType', 'all');

        $proposals = $this->getOutputProposalsQuery($activeTab, $search, $outputType)->get();

        $pdf = Pdf::loadView('reports.output-reports-pdf', [
            'proposals' => $proposals,
            'activeTab' => $activeTab,
            'outputType' => $outputType,
        ])->setPaper('a4', 'landscape');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return $pdf->download('laporan-luaran-'.$activeTab.'-'.now()->format('YmdHis').'.pdf');
    }

    public function outputExcel(Request $request)
    {
        $activeTab = $request->query('activeTab', 'research');
        $search = $request->query('search', '');
        $outputType = $request->query('outputType', 'all');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return Excel::download(
            new \App\Exports\OutputReportExport($activeTab, $search, $outputType),
            'laporan-luaran-'.$activeTab.'-'.now()->format('YmdHis').'.xlsx'
        );
    }

    protected function getOutputProposalsQuery($activeTab, $search, $outputType)
    {
        $detailableType = $activeTab === 'research' ? 'App\\Models\\Research' : 'App\\Models\\CommunityService';

        $query = Proposal::query()
            ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'progressReports.mandatoryOutputs.proposalOutput', 'progressReports.additionalOutputs.proposalOutput'])
            ->where('detailable_type', $detailableType)
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
        $search = $request->query('search', '');
        $typeFilter = $request->query('typeFilter', '');
        $periodFilter = $request->query('periodFilter', '');

        $partners = $action->handle($search, $typeFilter, $periodFilter)->get();

        $pdf = Pdf::loadView('reports.partner-collaboration-pdf', [
            'partners' => $partners,
            'periodFilter' => $periodFilter,
            'typeFilter' => $typeFilter,
        ])->setPaper('a4', 'landscape');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return $pdf->download('laporan-mitra-'.now()->format('Y-m-d').'.pdf');
    }

    public function partnerExcel(Request $request)
    {
        $search = $request->query('search', '');
        $typeFilter = $request->query('typeFilter', '');
        $periodFilter = $request->query('periodFilter', '');

        if (ob_get_level()) {
            ob_end_clean();
        }

        return Excel::download(
            new \App\Exports\PartnerCollaborationExport($search, $typeFilter, $periodFilter),
            'laporan-mitra-'.now()->format('Y-m-d').'.xlsx'
        );
    }
}
