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
    </style>
</head>
<body>
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
    
    <div class="signature-wrapper" style="margin-top: 30px;">
        @php
            $lppm = \App\Models\User::role('kepala lppm')->with('identity')->first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();
            
            $formatName = function ($user) {
                if (!$user) return null;
                $name = trim($user->name);
                $prefix = trim($user->identity?->title_prefix);
                $suffix = trim($user->identity?->title_suffix);
                
                if ($prefix && !str_contains($name, $prefix)) {
                    $name = $prefix . ' ' . $name;
                }
                if ($suffix && !str_contains($name, $suffix)) {
                    $name = $name . (str_starts_with($suffix, ',') ? '' : ', ') . $suffix;
                }
                return $name;
            };

            $lppmName = $formatName($lppm) ?? 'Kepala LPPM';
            $lppmNIDN = $lppm?->identity?->identity_id ?? '-';
            $rektorName = $formatName($rektor) ?? 'Rektor';
            $rektorNIDN = $rektor?->identity?->identity_id ?? '-';
        @endphp
        <table style="width: 100%; border: none;">
            <tr>
                <td width="50%" style="border: none; text-align: center; padding: 0;">
                    <div style="margin-top: 10px; margin-bottom: 4px;">Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 4px;">Mengetahui,</div>
                    <div style="margin-bottom: 4px;"><strong>Rektor ITSNU Pekalongan</strong></div>
                    <div style="margin-bottom: 65px;"></div>
                    <div style="font-weight: bold; text-decoration: underline;">{{ $rektorName }}</div>
                    <div style="font-size: 9pt;">NIDN. {{ $rektorNIDN }}</div>
                </td>
                <td width="50%" style="border: none; text-align: center; padding: 0;">
                    <div style="margin-top: 10px; margin-bottom: 4px;">Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 4px;">Dibuat oleh,</div>
                    <div style="margin-bottom: 4px;"><strong>Kepala LPPM ITSNU Pekalongan</strong></div>
                    <div style="margin-bottom: 65px;"></div>
                    <div style="font-weight: bold; text-decoration: underline;">{{ $lppmName }}</div>
                    <div style="font-size: 9pt;">NIDN. {{ $lppmNIDN }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Dicetak pada: {{ now()->format('d/m/Y H:i') }} oleh {{ auth()->user()->name ?? 'System' }}
    </div>
</body>
</html>
