<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kerjasama Mitra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page { margin: 1cm; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 10pt; color: #333; line-height: 1.4; }
        
        /* Kop Surat Styles */
        .kop-surat { border-bottom: 2.5pt solid #000; padding-bottom: 5px; margin-bottom: 2px; position: relative; }
        .kop-surat-inner { border-bottom: 0.5pt solid #000; padding-bottom: 3px; }
        .logo { position: absolute; left: 0; top: 0; width: 80px; }
        .header-text { text-align: center; margin-left: 90px; margin-right: 50px; }
        .inst-name { font-size: 14pt; font-weight: bold; color: #1a4a8e; margin-bottom: 0; }
        .lppm-name { font-size: 12pt; font-weight: bold; margin-top: 0; margin-bottom: 5px; }
        .inst-address { font-size: 8pt; font-style: italic; color: #555; }
        
        .report-title-container { text-align: center; margin-top: 20px; margin-bottom: 20px; }
        .report-title { font-size: 12pt; font-weight: bold; text-decoration: underline; text-transform: uppercase; }
        .report-subtitle { font-size: 10pt; margin-top: 5px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; table-layout: fixed; }
        th, td { border: 0.5pt solid #888; padding: 8px 5px; vertical-align: middle; word-wrap: break-word; }
        th { background-color: #f1f4f9; font-weight: bold; text-align: center; font-size: 8pt; color: #1a4a8e; }
        td { font-size: 8pt; }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        .text-muted { color: #666; font-size: 7.5pt; }
        
        .summary-box { margin-bottom: 20px; padding: 12px; border: 1pt solid #1a4a8e; background: #f1f4f9; border-radius: 4px; }
        .summary-title { font-weight: bold; margin-bottom: 5px; color: #1a4a8e; text-transform: uppercase; font-size: 9pt; }
        
        /* Signature Styles */
        .signature-wrapper { margin-top: 30px; width: 100%; }
        .signature-table { border: none !important; }
        .signature-table td { border: none !important; padding: 0; }
        .sign-date { margin-bottom: 60px; }
        .sign-name { font-weight: bold; text-decoration: underline; }
        .sign-nip { font-size: 9pt; }

        .footer { position: fixed; bottom: -0.5cm; left: 0; right: 0; font-size: 8pt; text-align: center; color: #999; border-top: 0.5pt solid #eee; padding-top: 5px; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <div class="kop-surat-inner">
            <img src="{{ public_path('logo.png') }}" class="logo">
            <div class="header-text">
                <div class="inst-name">INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN</div>
                <div class="lppm-name">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT (LPPM)</div>
                <div class="inst-address">
                    Jl. Karangdowo No. 9, Kedungwuni, Kab. Pekalongan, Jawa Tengah 51173<br>
                    Email: lppm@itsnupekalongan.ac.id | Website: https://lppm.itsnupekalongan.ac.id
                </div>
            </div>
        </div>
    </div>

    <div class="report-title-container">
        <div class="report-title">LAPORAN KERJASAMA MITRA</div>
        <div class="report-subtitle">
            Periode: <strong>{{ $periodFilter ?: 'Semua Tahun' }}</strong> 
            @if($typeFilter) | Jenis Mitra: <strong>{{ $typeFilter }}</strong> @endif
        </div>
    </div>

    <div class="summary-box">
        <div class="summary-title">Ringkasan Laporan:</div>
        <div style="font-size: 9pt;">
            Total Mitra yang tercatat dalam laporan ini adalah <strong>{{ count($partners) }}</strong> institusi/individu partner.
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Nama Mitra & Institusi</th>
                <th width="100px">Jenis Mitra</th>
                <th width="150px">Kontak / Email</th>
                <th width="70px">Jumlah Usulan</th>
                <th width="70px">Disetujui</th>
                <th width="100px">Total Dana</th>
                <th width="50px">Dok MOU</th>
            </tr>
        </thead>
        <tbody>
            @forelse($partners as $index => $partner)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>
                        <div class="fw-bold">{{ $partner->name }}</div>
                        <div class="text-muted">{{ $partner->institution }}</div>
                    </td>
                    <td class="text-center">{{ $partner->type }}</td>
                    <td class="text-center">{{ $partner->email ?: '-' }}</td>
                    <td class="text-center">{{ $partner->proposals_count }}</td>
                    <td class="text-center fw-bold">{{ $partner->approved_count }}</td>
                    <td class="text-right fw-bold">
                        Rp {{ number_format($partner->total_budget ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                        @if($partner->hasMedia('mou_pks'))
                            <span style="color: green; font-weight: bold;">✔</span>
                        @else
                            <span style="color: #ccc;">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding: 30px; color: #999;">
                        Tidak ada data mitra ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-wrapper">
        @php
            $lppm = \App\Models\User::role('kepala lppm')->with('identity')->first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            
            $lppmName = $lppm
                ? format_name($lppm->identity->title_prefix ?? '', $lppm->name, $lppm->identity->title_suffix ?? '')
                : 'Kepala LPPM';
            $lppmNIDN = $lppm?->identity?->identity_id ?? '-';
            $rektorName = $rektor
                ? format_name($rektor->identity->title_prefix ?? '', $rektor->name, $rektor->identity->title_suffix ?? '')
                : 'Rektor';
            $rektorNIDN = $rektor?->identity?->identity_id ?? '-';
        @endphp
        <table class="signature-table">
            <tr>
                <td width="50%" class="text-center">
                    <div class="sign-date" style="margin-bottom: 4px;">Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 4px;">Mengetahui,</div>
                    <div style="margin-bottom: 4px; font-weight: bold;">Rektor ITSNU Pekalongan</div>
                    <div style="margin-bottom: 65px;"></div>
                    <div class="sign-name">{{ $rektorName }}</div>
                    <div class="sign-nip">NIDN. {{ $rektorNIDN }}</div>
                </td>
                <td width="50%" class="text-center">
                    <div class="sign-date" style="margin-bottom: 4px;">Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 4px;">Dibuat oleh,</div>
                    <div style="margin-bottom: 4px; font-weight: bold;">Kepala LPPM ITSNU Pekalongan</div>
                    <div style="margin-bottom: 65px;"></div>
                    <div class="sign-name">{{ $lppmName }}</div>
                    <div class="sign-nip">NIDN. {{ $lppmNIDN }}</div>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="footer">
        SIM-LPPM ITSNU Pekalongan | Dicetak oleh: {{ auth()->user()->name ?? 'Administrator' }} pada {{ now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
