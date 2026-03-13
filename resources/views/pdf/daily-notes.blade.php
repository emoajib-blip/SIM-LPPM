<!DOCTYPE html>
<html>
@php
    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
    // Defensive defaults in case variables are not passed from all render paths
    $isApproved ??= false;
    $isSigned ??= false;
    $logbookApprovalMode ??= 'digital';
@endphp
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Catatan Harian - {{ $proposal->id }}</title>
    <style>
        @page {
            margin: 3cm 3cm 3cm 4cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            text-align: justify;
        }

        .cover-page {
            box-sizing: border-box;
            height: 24.5cm;
            text-align: center;
            padding: 1cm 0;
            margin: 0;
            width: 100%;
            page-break-after: always;
            overflow: hidden;
            position: relative;
        }

        .cover-header {
            font-size: 16pt;
            font-weight: bold;
            margin-bottom: 1cm;
            text-transform: uppercase;
        }

        .cover-logo {
            width: 150px;
            margin: 1cm 0;
        }

        .cover-title {
            font-size: 16pt;
            font-weight: bold;
            margin: 1.5cm 0;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .cover-authors {
            margin: 1cm 0;
            font-size: 12pt;
        }

        .cover-authors-table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .cover-authors-table td {
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }

        .cover-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            text-transform: uppercase;
        }

        .signature-section {
            width: 100%;
            margin-top: 1cm;
        }

        .signature-table {
            width: 100%;
            border: none;
        }

        .signature-table td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            border: none;
            padding: 10px;
        }

        .signature-qr {
            margin: 10px auto;
            display: block;
        }

        .header-table {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 5px;
            padding-bottom: 5px;
        }

        .log-content {
            margin-top: 5px;
            font-size: 8.5pt;
            text-align: justify;
            white-space: pre-wrap;
            line-height: 1.5;
        }

        .logo {
            width: 60px;
        }

        .header-text {
            text-align: left;
            padding-left: 10px;
        }

        .header-text div {
            font-weight: bold;
            font-size: 11pt;
        }

        .document-title {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            font-size: 14pt;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            border: none;
            padding: 2px 0;
            vertical-align: top;
        }

        .info-label {
            width: 150px;
            font-weight: bold;
        }

        .info-colon {
            width: 10px;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            font-size: 11pt;
            line-height: 1.5;
        }

        table.data-table th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
        }

        .signature-space {
            min-height: 80px;
        }
    </style>
</head>

<body>
    @php
        $isResearch = $proposal->detailable_type === \App\Models\Research::class;
        $docType = ($isResearch ? 'PENELITIAN' : 'PENGABDIAN');
        $docFullType = ($isResearch ? 'PENELITIAN' : 'PENGABDIAN MASYARAKAT');
        $docTitle = "CATATAN HARIAN $docType DAN LAPORAN KEUANGAN $docFullType";
        $period = $proposal->dailyNotes->min('activity_date')?->format('d/m/Y') . ' s/d ' . $proposal->dailyNotes->max('activity_date')?->format('d/m/Y');
    @endphp

    {{-- Cover Page --}}
    <div class="cover-page">
        <div class="cover-header">
            {{ $docTitle }}
        </div>

        @if (file_exists(public_path('logo.png')))
            <img src="{{ public_path('logo.png') }}" alt="Logo" class="cover-logo">
        @else
            <div style="height: 120px;"></div>
        @endif

        <div class="cover-title">
            @php
                $cleanTitle = $proposal->title;
                // Strip common prefixes if they exist (case-insensitive)
                $cleanTitle = preg_replace('/^(PENELITIAN|PENGABDIAN MASYARAKAT|PENGABDIAN):?\s*/i', '', $cleanTitle);
            @endphp
            {{ strtoupper($cleanTitle) }}
        </div>

        <div class="cover-authors">
            <div style="margin-bottom: 15px; font-weight: bold;">OLEH:</div>
            <table class="cover-authors-table">
                <tr>
                    <td width="30%">Ketua Pengusul</td>
                    <td width="5%">:</td>
                    <td>{{ $proposal->submitter->name }} (NIDN:
                        {{ $proposal->submitter->identity?->identity_id ?? '-' }})
                    </td>
                </tr>
                <tr>
                    <td>Anggota</td>
                    <td>:</td>
                    <td>
                        @forelse($proposal->teamMembers->filter(fn($m) => $m->id !== $proposal->submitter_id) as $member)
                            <div>- {{ $member->name }} (NIDN: {{ $member->identity?->identity_id ?? '-' }})</div>
                        @empty
                            -
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>{{ $proposal->submitter->identity?->studyProgram?->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td>{{ $proposal->submitter->identity?->studyProgram?->faculty?->name ?? '-' }}</td>
                </tr>
            </table>
        </div>


        <div class="cover-footer">
            INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN<br>
            TAHUN {{ $proposal->start_year }}
        </div>
    </div>

    {{-- Halaman Pengesahan --}}
    <div style="page-break-inside: avoid;">
        <div class="document-title"
            style="margin-top: 20px; margin-bottom: 15px; border-bottom: 2px solid #000; padding-bottom: 10px;">
            HALAMAN PENGESAHAN
        </div>

        <table class="info-table" style="margin-bottom: 15px;">
            <tr>
                <td class="info-label">Judul Usulan</td>
                <td class="info-colon">:</td>
                <td><strong>{{ $proposal->title }}</strong></td>
            </tr>
            <tr>
                <td class="info-label">Ketua Pengusul</td>
                <td class="info-colon">:</td>
                <td>{{ $proposal->submitter->name }} (NIDN: {{ $proposal->submitter->identity?->identity_id ?? '-' }})</td>
            </tr>
            <tr>
                <td class="info-label">Skema</td>
                <td class="info-colon">:</td>
                <td>{{ $proposal->researchScheme->name ?? ($proposal->communityServiceScheme->name ?? '-') }}</td>
            </tr>
            <tr>
                <td class="info-label">Total Anggaran Digunakan</td>
                <td class="info-colon">:</td>
                <td class="font-bold">Rp {{ number_format($notes->sum('amount'), 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="info-label">Jumlah Catatan Aktivitas</td>
                <td class="info-colon">:</td>
                <td>{{ $notes->count() }} Kali Kegiatan</td>
            </tr>
        </table>

        <div style="margin-top: 10px; margin-bottom: 15px;">
            <div class="font-bold"
                style="margin-bottom: 10px; font-size: 11pt; border-bottom: 1px solid #000; padding-bottom: 5px;">Ringkasan
                Biaya sesuai Kelompok RAB:</div>
            <table class="data-table" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kelompok RAB</th>
                        <th class="text-right" width="30%">Total Tagihan (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupTotals = $notes->groupBy('budget_group_id');
                    @endphp
                    @foreach ($groupTotals as $groupId => $items)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $items->first()->budgetGroup->name ?? 'Tanpa Kelompok' }}</td>
                            <td class="text-right">{{ number_format($items->sum('amount'), 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">TOTAL KESELURUHAN</th>
                        <th class="text-right">{{ number_format($notes->sum('amount'), 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="footer" style="margin-top: 10px;">
            <table class="signature-table" style="width: 100%; margin-top: 10px;">
                <tr>
                    <td style="width: 50%; text-align: center;">
                        <p style="margin: 0;">Pekalongan, {{ date('d F Y') }}</p>
                        <p style="margin: 0;">Yang Melaporkan,<br>Ketua Pengusul</p>
                        <div class="signature-space"
                            style="height: 60px; display: flex; justify-content: center; align-items: center; margin: 5px 0;">
                            @if ($isSigned)
                                @php
                                    $qrTextSubmitter = 'Catatan harian & laporan keuangan ini dilaporkan secara digital oleh: ' . strtoupper($proposal->submitter->name) . ' pada ' . ($proposal->logbook_signed_at?->format('d/m/Y H:i') ?? date('d/m/Y H:i'));
                                @endphp
                                <img src="{{ generate_qr_code_data_uri($qrTextSubmitter) }}" width="60" alt="QR Code"
                                    style="margin: 0 auto; display: block;">
                            @else
                                <div
                                    style="color: #999; border: 1px dashed #ccc; padding: 10px; text-align: center; font-size: 8pt; width: 80%; margin: 0 auto;">
                                    [DRAFT - Belum Ditandatangani]
                                </div>
                            @endif
                        </div>
                        <p style="margin: 0;"><strong>{{ strtoupper($proposal->submitter->name) }}</strong></p>
                    </td>
                    <td style="width: 50%; text-align: center;">
                        <p style="margin: 0;">&nbsp;</p>
                        <p style="margin: 0;">Menyetujui,<br>Kepala LPPM</p>
                        <div class="signature-space"
                            style="height: 60px; display: flex; justify-content: center; align-items: center; margin: 5px 0;">
                            @if ($isApproved)
                                @php
                                    $headOfLppm = \App\Models\User::role('kepala lppm')->first();
                                    $qrTextLppm = "Logbook & Laporan Keuangan ini telah disetujui secara digital oleh Kepala LPPM:\nNama: " . ($headOfLppm->name ?? 'Kepala LPPM') . "\nTanggal: " . $proposal->logbook_approved_at?->format('d/m/Y H:i');
                                @endphp
                                <img src="{{ generate_qr_code_data_uri($qrTextLppm) }}" width="60" alt="QR Code"
                                    style="margin: 0 auto; display: block;">
                            @else
                                <div
                                    style="color: #999; border: 1px dashed #ccc; padding: 10px; text-align: center; font-size: 8pt; width: 80%; margin: 0 auto;">
                                    [Menunggu Validasi LPPM]
                                </div>
                            @endif
                        </div>
                        <p style="margin: 0;"><strong>( KEPALA LPPM )</strong></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div style="page-break-before: always;"></div>
    {{-- End Halaman Pengesahan --}}
    <table class="header-table no-border">
        <tr>
            <td class="logo" style="width: 60px; border: none;">
                @if (file_exists(public_path('logo.png')))
                    <img src="{{ public_path('logo.png') }}" alt="Logo" style="width: 50px;">
                @endif
            </td>
            <td class="header-text" style="border: none;">
                <div>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM)</div>
                <div>Institut Teknologi dan Sains Nahdlatul Ulama (ITSNU) Pekalongan</div>
                <div style="font-weight: normal; font-size: 8pt;">Jl. Karangdowo No. 9, Karangdowo, Kec. Kedungwuni,
                    Kab. Pekalongan, Jawa Tengah 51173</div>
                <div style="font-weight: normal; font-size: 8pt;">Email: lppmitsnupkl@gmail.com | Website:
                    https://lppm.itsnupekalongan.ac.id/</div>
            </td>
        </tr>
    </table>

    <div class="document-title"
        style="margin-top: 1cm; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px;">
        {{ $docTitle }}
    </div>

    <table class="info-table">
        <tr>
            <td class="info-label">Judul Usulan</td>
            <td class="info-colon">:</td>
            <td><strong>{{ $proposal->title }}</strong></td>
        </tr>
        <tr>
            <td class="info-label">Ketua Pengusul</td>
            <td class="info-colon">:</td>
            <td>{{ $proposal->submitter->name }} (NIDN: {{ $proposal->submitter->identity?->identity_id ?? '-' }})</td>
        </tr>
        <tr>
            <td class="info-label">Program Studi</td>
            <td class="info-colon">:</td>
            <td>{{ $proposal->submitter->identity?->studyProgram?->name ?? '-' }}</td>
        </tr>
        <tr>
            <td class="info-label">Skema</td>
            <td class="info-colon">:</td>
            <td>{{ $proposal->researchScheme->name ?? ($proposal->communityServiceScheme->name ?? '-') }}</td>
        </tr>
        <tr>
            <td class="info-label">Tahun Pelaksanaan</td>
            <td class="info-colon">:</td>
            <td>{{ $proposal->start_year }}</td>
        </tr>
    </table>



    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="12%">Tgl</th>
                <th width="30%">Aktivitas & Catatan</th>
                <th width="15%">Kelompok RAB</th>
                <th width="15%">Nominal (Rp)</th>
                <th width="8%">Progres</th>
                <th width="15%">Bukti (File)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notes as $index => $note)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $note->activity_date->format('d/m/Y') }}</td>
                    <td class="text-justify">
                        <div class="font-bold" style="line-height: 1.4;">{{ $note->activity_description }}</div>
                        @if ($note->notes)
                            <div style="margin-top: 5px; font-style: italic; color: #444; font-size: 8pt; line-height: 1.4;">
                                Catatan: {{ $note->notes }}
                            </div>
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $note->budgetGroup->name ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $note->amount ? number_format($note->amount, 0, ',', '.') : '-' }}
                    </td>
                    <td class="text-center">{{ $note->progress_percentage }}%</td>
                    <td>
                        @if ($note->media->isNotEmpty())
                            <ul style="margin: 0; padding-left: 15px; font-size: 8pt;">
                                @foreach ($note->media as $media)
                                    <li>{{ \Illuminate\Support\Str::limit($media->file_name, 20) }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div style="text-align: center; color: #666;">-</div>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada catatan aktivitas.</td>
                </tr>
            @endforelse
        </tbody>
        {{-- @if ($notes->count() > 0)
        <tfoot>
            <tr>
                <td colspan="4" class="font-bold text-right">Total Nominal Digunakan:</td>
                <td class="font-bold text-right">
                    {{ number_format($notes->sum('amount'), 0, ',', '.') }}
                </td>
                <td></td>
            </tr>
        </tfoot>
        @endif --}}
    </table>



    @php
        $hasAttachments = false;
        foreach ($notes as $note) {
            if ($note->media->isNotEmpty()) {
                $hasAttachments = true;
                break;
            }
        }
    @endphp

    @if ($hasAttachments)
        <div style="page-break-before: always;"></div>
        <div class="document-title" style="margin-bottom: 20px;">
            LAMPIRAN BUKTI DUKUNG
        </div>

        @foreach ($notes as $note)
            @if ($note->media->isNotEmpty())
                <div style="margin-bottom: 30px; border: 1px solid #ccc; padding: 15px; page-break-inside: avoid;">
                    <div
                        style="margin-top: 0; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 8px; font-weight: bold; font-size: 11pt;">
                        Kegiatan: {{ $note->activity_date->format('d F Y') }}
                        <div style="font-weight: normal; font-size: 9pt; color: #555; margin-top: 3px;">
                            {{ $note->activity_description }}
                        </div>
                    </div>

                    @foreach ($note->media as $media)
                        <div style="margin-bottom: 20px; text-align: center;">
                            <div
                                style="font-weight: bold; margin-bottom: 8px; font-size: 8pt; text-align: left; background: #f9f9f9; padding: 4px; border-left: 3px solid #ccc;">
                                File: {{ $media->file_name }}
                            </div>

                            @if (str_starts_with($media->mime_type, 'image/'))
                                @php
                                    // Attempt to get optimized 'pdf_image', fallback to original local path
                                    $imagePath = $media->hasGeneratedConversion('pdf_image') && file_exists($media->getPath('pdf_image'))
                                        ? $media->getPath('pdf_image')
                                        : $media->getPath();
                                @endphp

                                @if(file_exists($imagePath))
                                    <img src="{{ $imagePath }}"
                                        style="max-width: 100%; max-height: 500px; display: block; margin: 0 auto; border: 1px solid #ddd; padding: 3px;">
                                @else
                                    <div style="background: #fff0f0; border: 1px dashed red; padding: 10px; color: red;">
                                        Error: File gambar fisik tidak ditemukan di server.
                                    </div>
                                @endif
                            @else
                                <div style="background: #f8f9fa; border: 1px dashed #aaa; padding: 20px; color: #555;">
                                    Dokumen Lampiran Eksternal (<span style="text-transform: uppercase">{{ $media->extension }}</span>)<br>
                                    <small style="font-style: italic;">Sistem tidak dapat menempelkan file ini ke dalam lembar PDF. Harap
                                        ulik secara terpisah.</small>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    @endif
</body>

</html>