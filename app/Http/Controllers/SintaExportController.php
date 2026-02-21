<?php

namespace App\Http\Controllers;

use App\Exports\SintaCommunityServiceExport;
use App\Exports\SintaResearchExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class SintaExportController extends Controller
{
    public function downloadResearch(Request $request)
    {
        $year = $request->query('year', date('Y'));
        $filename = 'SINTA_Penelitian_'.$year.'_'.now()->format('YmdHis').'.xlsx';

        return Excel::download(new SintaResearchExport($year), $filename);
    }

    public function downloadPkm(Request $request)
    {
        $year = $request->query('year', date('Y'));
        $filename = 'SINTA_PengabdianMasyarakat_'.$year.'_'.now()->format('YmdHis').'.xlsx';

        return Excel::download(new SintaCommunityServiceExport($year), $filename);
    }
}
