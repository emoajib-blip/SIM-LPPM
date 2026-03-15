<!DOCTYPE html>
<html>
<head>
    <title>Laporan Luaran</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 3px double #000; padding-bottom: 10px; }
        .institution { font-size: 14pt; font-weight: bold; margin-bottom: 2px; }
        .lppm { font-size: 12pt; font-weight: bold; margin-bottom: 10px; }
        .title { font-size: 11pt; font-weight: bold; text-decoration: underline; text-transform: uppercase; }
        .subtitle { font-size: 10pt; margin-top: 5px; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 6px 4px; vertical-align: top; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; font-size: 9pt; }
        td { font-size: 9pt; }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        .text-muted { color: #555; font-size: 8pt; }
        
        .footer { position: fixed; bottom: 0; left: 0; right: 0; font-size: 8pt; text-align: right; border-top: 1px solid #ddd; padding-top: 5px; }

        .digital-signature {
            border: 1px solid #1a56db;
            padding: 5px;
            display: inline-block;
            margin-bottom: 5px;
            border-radius: 4px;
            background-color: #ffffff;
            color: #1a56db;
            font-family: 'Courier New', Courier, monospace;
            text-align: center;
            width: 80px;
        }

        .digital-signature img {
            width: 70px;
            height: 70px;
        }

        .signature-label {
            display: block;
            font-size: 7px;
            margin-top: 2px;
            color: #1a56db;
            font-weight: bold;
        }


    </style>
</head>
<body>
    @if($isPreview ?? false)
    <div class="header">
        <div class="institution">INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN</div>
        <div class="lppm">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT (LPPM)</div>
        <div class="title">LAPORAN LUARAN {{ strtoupper($activeTab === 'research' ? 'PENELITIAN' : 'PENGABDIAN') }}</div>
        <div class="subtitle">SIM-LPPM ITSNU</div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="25%">Proposal & Ketua</th>
                <th width="15%">Prodi</th>
                <th width="15%">Kategori Luaran</th>
                <th width="42%">Detail & Status</th>
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
