<!DOCTYPE html>
<html>
<head>
    <title>Laporan Luaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
        /* Vetted by AI - Manual Review Required by Senior Engineer/Manager */
        @page {
            margin: 3cm 3cm 3cm 4cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9pt;
            line-height: 1.4;
            color: #000;
            text-align: left;
        }
        .kop-surat {
            border-bottom: 2pt solid #000;
            padding-bottom: 2px;
            margin-bottom: 5px;
            position: relative;
        }
        .kop-surat-inner {
            border-bottom: 0.5pt solid #000;
            padding-bottom: 5px;
        }
        .logo {
            position: absolute;
            left: 0;
            top: 0;
            width: 65px;
        }
        .header-text {
            text-align: center;
            margin-left: 70px;
        }
        .inst-name {
            font-size: 12pt;
            font-weight: bold;
            margin-bottom: 2px;
        }
        .lppm-name {
            font-size: 10pt;
            font-weight: bold;
            margin-bottom: 2px;
        }
        .inst-address {
            font-size: 8pt;
            color: #333;
        }
        .report-title-container {
            text-align: center;
            margin: 15px 0;
        }
        .report-title {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }
        .report-subtitle {
            font-size: 9pt;
            margin-top: 5px;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        table.data-table th {
            background-color: #f2f2f2;
            border: 0.5pt solid #000;
            padding: 5px;
            font-weight: bold;
            text-align: center;
            font-size: 8.5pt;
        }
        table.data-table td {
            border: 0.5pt solid #000;
            padding: 5px;
            vertical-align: top;
            font-size: 8.5pt;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .signature-wrapper {
            margin-top: 30px;
            page-break-inside: avoid;
        }
        table.signature-table {
            width: 100%;
            border: none;
        }
        table.signature-table td {
            border: none;
            padding: 0;
            vertical-align: top;
            text-align: center;
        }
        .sign-block {
            display: inline-block;
            text-align: center;
        }
        .sign-name {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 60px;
        }
        .digital-signature {
            margin: 5px 0;
        }
        .digital-signature img {
            width: 60px;
        }
        .footer {
            position: fixed;
            bottom: -2cm;
            left: 0;
            right: 0;
            font-size: 7pt;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <div class="kop-surat-inner">
            <img src="{{ get_logo_base64() }}" class="logo">
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
        <div class="report-title">LAPORAN LUARAN {{ strtoupper($activeTab === 'research' ? 'PENELITIAN' : 'PENGABDIAN') }}</div>
        <div class="report-subtitle">SIM-LPPM ITSNU</div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 28%;">Proposal &amp; Ketua</th>
                <th style="width: 15%;">Prodi</th>
                <th style="width: 15%;">Kategori Luaran</th>
                <th style="width: 38%;">Detail &amp; Status</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1; @endphp
            @foreach($proposals as $proposal)
                @foreach($proposal->progressReports as $report)
                    @foreach($report->mandatoryOutputs as $output)
                        @if($outputType === 'all' || $outputType === 'mandatory')
                        <tr>
                            <td class="text-center">{{ $index++ }}</td>
                            <td>
                                <div class="fw-bold">{{ $proposal->title }}</div>
                                <div class="text-muted">{{ $proposal->submitter?->name ?? '-' }}</div>
                            </td>
                            <td class="text-center">{{ $proposal->submitter?->identity?->studyProgram?->name ?? '-' }}</td>
                            <td class="text-center">Wajib: {{ $output->proposalOutput?->category ?? '-' }}</td>
                            <td>
                                <div>Status: <strong>{{ ucfirst($output->status_type ?? 'Draft') }}</strong></div>
                                @if($output->journal_title)<div class="text-muted">Jurnal: {{ $output->journal_title }}</div>@endif
                                @if($output->article_title)<div class="text-muted">Judul: {{ $output->article_title }}</div>@endif
                                @php
                                    $link = $output->article_url ?? ($output->journal_url ?? ($output->media_url ?? ($output->video_url ?? ($output->url ?? null))));
                                @endphp
                                @if($link)<div class="text-muted" style="font-size: 7pt; word-break: break-all;">URL: {{ $link }}</div>@endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    @foreach($report->additionalOutputs as $output)
                        @if($outputType === 'all' || $outputType === 'additional')
                        <tr>
                            <td class="text-center">{{ $index++ }}</td>
                            <td>
                                <div class="fw-bold">{{ $proposal->title }}</div>
                                <div class="text-muted">{{ $proposal->submitter?->name ?? '-' }}</div>
                            </td>
                            <td class="text-center">{{ $proposal->submitter?->identity?->studyProgram?->name ?? '-' }}</td>
                            <td class="text-center">Tambahan: {{ $output->proposalOutput?->category ?? '-' }}</td>
                            <td>
                                <div>Status: <strong>{{ ucfirst($output->status ?? 'Draft') }}</strong></div>
                                @if($output->journal_title)<div class="text-muted">Jurnal: {{ $output->journal_title }}</div>@endif
                                @php
                                    $linkAdd = $output->book_url ?? ($output->journal_url ?? ($output->media_url ?? ($output->video_url ?? ($output->url ?? null))));
                                @endphp
                                @if($linkAdd)<div class="text-muted" style="font-size: 7pt; word-break: break-all;">URL: {{ $linkAdd }}</div>@endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    
        <table style="width: 100%; border: none;">
            <tr>
                <td width="33%" style="border: none; text-align: center; padding: 0;">
                    <div style="margin-top: 10px; margin-bottom: 4px;">Pekalongan,
                        {{ now()->translatedFormat('d F Y') }}
                    </div>
                    <div style="margin-bottom: 4px;">Mengetahui,</div>
                    <div style="margin-bottom: 4px;"><strong>Rektor ITSNU Pekalongan</strong></div>
                    @if($institutionalReport && $institutionalReport->status === \App\Enums\InstitutionalReportStatus::APPROVED)
                        <div class="digital-signature">
                            <img src="{{ generate_qr_code_data_uri(\Illuminate\Support\Facades\URL::signedRoute('reports.verify', ['institutionalReport' => $institutionalReport->id, 'variant' => 'approved'])) }}" alt="QR Code">
                            <span class="signature-label">DIGITALLY SIGNED</span>
                        </div>
                        <div class="text-muted">Ditandatangani: {{ $institutionalReport->approved_at?->translatedFormat('d F Y H:i') ?? '-' }}</div>
                    @else
                        <div style="margin-bottom: 75px;"></div>
                    @endif
                    <div style="font-weight: bold; text-decoration: underline;">{{ format_name($rektor?->identity?->title_prefix, $rektor?->name ?? 'Rektor', $rektor?->identity?->title_suffix) }}</div>
                    <div style="font-size: 9pt;">NPP. {{ $rektor?->identity?->identity_id ?? '-' }}</div>
                </td>
                <td width="34%" style="border: none;"></td>
                <td width="33%" style="border: none; text-align: center; padding: 0;">
                    <div style="margin-top: 10px; margin-bottom: 4px;">Pekalongan,
                        {{ now()->translatedFormat('d F Y') }}
                    </div>
                    <div style="margin-bottom: 4px;">Dibuat oleh,</div>
                    <div style="margin-bottom: 4px;"><strong>Kepala LPPM ITSNU Pekalongan</strong></div>
                    @if($institutionalReport && in_array($institutionalReport->status, [\App\Enums\InstitutionalReportStatus::SUBMITTED, \App\Enums\InstitutionalReportStatus::APPROVED]))
                        <div class="digital-signature" style="border-color: #059669; color: #059669;">
                            <img src="{{ generate_qr_code_data_uri(\Illuminate\Support\Facades\URL::signedRoute('reports.verify', ['institutionalReport' => $institutionalReport->id, 'variant' => ((string) ($institutionalReport->status?->value) === 'approved' ? 'approved' : 'submitted')])) }}" alt="QR Code">
                            <span class="signature-label" style="color: #059669;">VERIFIED BY LPPM</span>
                        </div>
                        <div class="text-muted">Ditandatangani: {{ $institutionalReport->submitted_at?->translatedFormat('d F Y H:i') ?? '-' }}</div>
                    @else
                        <div style="margin-bottom: 75px;"></div>
                    @endif
                    <div style="font-weight: bold; text-decoration: underline;">{{ format_name($lppmHead?->identity?->title_prefix, $lppmHead?->name ?? 'Kepala LPPM', $lppmHead?->identity?->title_suffix) }}</div>
                    <div style="font-size: 9pt;">NPP. {{ $lppmHead?->identity?->identity_id ?? '-' }}</div>
                </td>
            </tr>
        </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d/m/Y H:i') }} oleh {{ auth()->user()->name ?? 'System' }}
    </div>
</body>
</html>
