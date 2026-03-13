<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Capaian IKU - {{ $period }}</title>
    <style>
        /* Vetted by AI - Manual Review Required by Senior Engineer/Manager */
        html, body { margin: 0; padding: 0; border: 0; }
        @page { margin: 3cm 2.5cm 3cm 3.5cm; }
        body { font-family: "Arial", "Helvetica", sans-serif; font-size: 10pt; line-height: 1.4; color: #000; }

        .kop-surat { border-bottom: 3pt solid #000; padding-bottom: 6px; margin-bottom: 0; position: relative; overflow: hidden; }
        .kop-surat-inner { border-bottom: 1pt solid #000; padding-bottom: 4px; margin-bottom: 2px; }
        .logo { position: absolute; left: 0; top: 4px; width: 75px; }
        .header-text { text-align: center; margin-left: 85px; margin-right: 0; }
        .inst-name { font-size: 13pt; font-weight: bold; color: #000; margin-bottom: 1px; }
        .lppm-name { font-size: 11pt; font-weight: bold; margin-top: 1px; margin-bottom: 4px; }
        .inst-address { font-size: 8.5pt; color: #333; }

        .report-title-container { text-align: center; margin-top: 8px; margin-bottom: 8px; }
        .report-title { font-size: 11pt; font-weight: bold; text-decoration: underline; text-transform: uppercase; }
        .report-subtitle { font-size: 9.5pt; margin-top: 2px; color: #333; }

        table.data-table { width: 100%; border-collapse: collapse; margin-top: 6px; table-layout: fixed; page-break-inside: auto; margin-bottom: 16px; }
        table.data-table thead tr { page-break-inside: avoid; page-break-after: avoid; }
        table.data-table tbody tr { page-break-inside: avoid; }
        table.data-table th { background-color: #1a4a8e; color: #fff; font-weight: bold; text-align: center; vertical-align: middle; font-size: 9pt; padding: 5px 6px; border: 0.5pt solid #0e2e5a; line-height: 1.3; }
        table.data-table td { font-size: 9pt; line-height: 1.35; padding: 4px 6px; vertical-align: top; border: 0.5pt solid #c0c8d8; word-wrap: break-word; overflow-wrap: break-word; }
        table.data-table tbody tr:nth-child(even) td { background-color: #f4f6fa; }
        table.data-table tbody tr:nth-child(odd) td { background-color: #ffffff; }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold, .fw-bold { font-weight: bold; }
        .text-muted { color: #555; font-size: 8pt; }
        .badge { display: inline-block; padding: 1px 5px; border-radius: 3px; font-size: 8pt; color: #fff; }
        .bg-success { background-color: #166534; }
        .bg-primary { background-color: #1a4a8e; }

        .signature-wrapper { margin-top: 20px; page-break-inside: avoid; }
        table.signature-table { width: 100%; border-collapse: collapse; border: none; }
        table.signature-table td { border: none; padding: 0; vertical-align: top; }
        .sign-block { text-align: center; font-size: 10pt; line-height: 1.6; }
        .sign-name { font-weight: bold; text-decoration: underline; }
        .sign-nip { font-size: 9pt; color: #333; }
        .digital-signature { border: 1pt solid #1a56db; padding: 4px; display: inline-block; margin: 4px auto; border-radius: 4px; background-color: #f0f4ff; color: #1a56db; text-align: center; width: 75px; }
        .digital-signature img { width: 65px; height: 65px; }
        .signature-label { display: block; font-size: 6.5pt; margin-top: 2px; color: #1a56db; font-weight: bold; }
        .footer { position: fixed; bottom: -1.5cm; left: 0; right: 0; font-size: 8pt; text-align: center; color: #666; border-top: 0.5pt solid #ccc; padding-top: 4px; }
    </style>
</head>

<body>
    <div class="kop-surat">
        <div class="kop-surat-inner">
            <img src="{{ public_path('logo.png') }}" class="logo">
            <div class="header-text">
                <div class="inst-name">{{ $institution->name ?? 'INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN' }}</div>
                <div class="lppm-name">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT (LPPM)</div>
                <div class="inst-address">
                    {{ $institution->address ?? 'Jl. Karangdowo No. 9, Kedungwuni, Kab. Pekalongan, Jawa Tengah 51173' }}<br>
                    Email: lppm@itsnupekalongan.ac.id | Website: https://lppm.itsnupekalongan.ac.id
                </div>
            </div>
        </div>
    </div>

    <div class="report-title-container">
        <div class="report-title">LAPORAN CAPAIAN INDIKATOR KINERJA UTAMA (IKU)</div>
        <div class="report-subtitle">Tahun Anggaran: <strong>{{ $period }}</strong></div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 15%;">Kode IKU</th>
                <th style="width: 40%;">Indikator Kinerja</th>
                <th style="width: 15%;">Target</th>
                <th style="width: 15%;">Capaian</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($ikuMetrics as $key => $metric)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center font-bold">{{ strtoupper($key) }}</td>
                    <td>
                        <div class="font-bold">{{ $metric['name'] }}</div>
                        <div style="font-size: 10px; color: #666;">{{ $metric['description'] }}</div>
                    </td>
                    <td class="text-center">{{ $metric['target'] }}%</td>
                    <td class="text-center font-bold">{{ round($metric['achievement'], 2) }}%</td>
                    <td class="text-center">
                        @if($metric['achievement'] >= $metric['target'])
                            <span style="color: green; font-weight: bold;">TERCAPAI</span>
                        @else
                            <span style="color: red; font-weight: bold;">PENDING</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 12px; padding: 8px 10px; border-left: 3pt solid #1a4a8e; background: #f8f9ff; font-size: 9pt;">
        <div style="font-weight: bold; color: #1a4a8e; margin-bottom: 3px;">Keterangan:</div>
        <div style="color: #333; line-height: 1.4;">
            Laporan ini disusun berdasarkan Keputusan Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi
            Nomor 358/M/KEP/2025. Data diambil secara otomatis dari sistem informasi LPPM ITSNU Pekalongan.
        </div>
    </div>

    <div class="signature-wrapper">
        <table class="signature-table">
            <tr>
                <td width="33%">
                    <div class="sign-block">
                        <div>Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                        <div>Mengetahui,</div>
                        <div style="font-weight: bold;">Rektor ITSNU Pekalongan</div>
                        @if($institutionalReport && $institutionalReport->status === \App\Enums\InstitutionalReportStatus::APPROVED)
                            <div class="digital-signature">
                                <img src="{{ generate_qr_code_data_uri(route('reports.iku', ['period' => $period, 'ref' => substr($institutionalReport->id, 0, 8)])) }}"
                                    alt="QR Code">
                                <span class="signature-label">DIGITALLY SIGNED</span>
                            </div>
                        @else
                            <div style="height: 55px;"></div>
                        @endif
                        <div class="sign-name">{{ format_name($rektor?->identity?->title_prefix, $rektor?->name ?? 'Rektor', $rektor?->identity?->title_suffix) }}</div>
                        <div class="sign-nip">NPP. {{ $rektor?->identity?->identity_id ?? '-' }}</div>
                    </div>
                </td>
                <td width="34%"></td>
                <td width="33%">
                    <div class="sign-block">
                        <div>Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                        <div>Dibuat oleh,</div>
                        <div style="font-weight: bold;">Kepala LPPM ITSNU Pekalongan</div>
                        @if($institutionalReport && in_array($institutionalReport->status, [\App\Enums\InstitutionalReportStatus::SUBMITTED, \App\Enums\InstitutionalReportStatus::APPROVED]))
                            <div class="digital-signature" style="border-color: #059669; color: #059669;">
                                <img src="{{ generate_qr_code_data_uri(route('reports.iku', ['period' => $period, 'ref' => substr($institutionalReport->id, 0, 8)])) }}"
                                    alt="QR Code">
                                <span class="signature-label" style="color: #059669;">VERIFIED BY LPPM</span>
                            </div>
                        @else
                            <div style="height: 55px;"></div>
                        @endif
                        <div class="sign-name">{{ format_name($lppmHead?->identity?->title_prefix, $lppmHead?->name ?? 'Kepala LPPM', $lppmHead?->identity?->title_suffix) }}</div>
                        <div class="sign-nip">NPP. {{ $lppmHead?->identity?->identity_id ?? '-' }}</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Dicetak otomatis oleh SIM LPPM ITSNU Pekalongan pada {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>

</html>