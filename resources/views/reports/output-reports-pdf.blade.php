<!DOCTYPE html>
<html>
<head>
    <title>Laporan Luaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

        table.data-table { width: 100%; border-collapse: collapse; margin-top: 6px; table-layout: fixed; page-break-inside: auto; }
        table.data-table thead tr { page-break-inside: avoid; page-break-after: avoid; }
        table.data-table tbody tr { page-break-inside: avoid; }
        table.data-table th { background-color: #1a4a8e; color: #fff; font-weight: bold; text-align: center; vertical-align: middle; font-size: 9pt; padding: 5px 6px; border: 0.5pt solid #0e2e5a; line-height: 1.3; }
        table.data-table td { font-size: 9pt; line-height: 1.35; padding: 4px 6px; vertical-align: top; border: 0.5pt solid #c0c8d8; word-wrap: break-word; overflow-wrap: break-word; }
        table.data-table tbody tr:nth-child(even) td { background-color: #f4f6fa; }
        table.data-table tbody tr:nth-child(odd) td { background-color: #ffffff; }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        .cell-title { font-weight: bold; text-align: left; line-height: 1.35; }
        .text-muted { color: #555; font-size: 8pt; }

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
        .watermark { position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); font-size: 75pt; color: rgba(200, 200, 200, 0.35); z-index: -1000; white-space: nowrap; font-weight: bold; }
    </style>
</head>
<body>
    @if($isPreview ?? false)
        <div class="watermark">DRAFT PREVIEW</div>
    @endif
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
                    @if(!($isPreview ?? false) && $institutionalReport && $institutionalReport->status === \App\Enums\InstitutionalReportStatus::APPROVED)
                        <div class="digital-signature">
                            <img src="{{ generate_qr_code_data_uri(route('reports.output.pdf', ['activeTab' => $activeTab, 'ref' => substr($institutionalReport->id, 0, 8)])) }}" alt="QR Code">
                            <span class="signature-label">DIGITALLY SIGNED</span>
                        </div>
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
                    @if(!($isPreview ?? false) && $institutionalReport && in_array($institutionalReport->status, [\App\Enums\InstitutionalReportStatus::SUBMITTED, \App\Enums\InstitutionalReportStatus::APPROVED]))
                        <div class="digital-signature" style="border-color: #059669; color: #059669;">
                            <img src="{{ generate_qr_code_data_uri(route('reports.output.pdf', ['activeTab' => $activeTab, 'ref' => substr($institutionalReport->id, 0, 8)])) }}" alt="QR Code">
                            <span class="signature-label" style="color: #059669;">VERIFIED BY LPPM</span>
                        </div>
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
