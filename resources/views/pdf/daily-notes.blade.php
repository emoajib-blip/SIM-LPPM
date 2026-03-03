<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Catatan Harian - {{ $proposal->id }}</title>
    <style>
        @page {
            margin: 1.5cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9pt;
            line-height: 1.4;
            color: #000;
        }

        .header-table {
            width: 100%;
            border-bottom: 2px solid #000;
            margin-bottom: 5px;
            padding-bottom: 5px;
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
            margin-top: 10px;
        }

        table.data-table th,
        table.data-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
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
            /* page-break-inside: avoid; */
        }

        .signature-space {
            height: 80px;
        }
    </style>
</head>

<body>
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

    <div class="document-title">
        CATATAN HARIAN (LOGBOOK)
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
            <td>{{ $proposal->submitter->name }}</td>
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
                    <td>
                        <div class="font-bold">{{ $note->activity_description }}</div>
                        @if ($note->notes)
                            <div style="margin-top: 5px; font-style: italic; color: #444; font-size: 8pt;">
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

    @if ($notes->count() > 0)
        <div style="margin-top: 20px; margin-bottom: 10px; page-break-inside: avoid;">
            <div class="font-bold" style="margin-bottom: 5px;">Ringkasan Penggunaan Anggaran:</div>
            <table class="data-table" style="width: 50%;">
                <thead>
                    <tr>
                        <th>Kelompok RAB</th>
                        <th class="text-right">Total (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupTotals = $notes->groupBy('budget_group_id');
                    @endphp
                    @foreach ($groupTotals as $groupId => $items)
                        <tr>
                            <td>{{ $items->first()->budgetGroup->name ?? 'Tanpa Kelompok' }}</td>
                            <td class="text-right">{{ number_format($items->sum('amount'), 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-right">Total Keseluruhan</th>
                        <th class="text-right">{{ number_format($notes->sum('amount'), 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif

    <div class="footer" style="text-align: right; width: 300px; float: right;">
        <p>Pekalongan, {{ date('d F Y') }}</p>
        <p>Ketua Pengusul,</p>
        <div class="signature-space"
            style="height: 80px; display: flex; justify-content: flex-end; align-items: center; padding-right: 50px;">
            @if(isset($isSigned) && $isSigned)
                @php
                    $qrText = 'Catatan harian ini dinyatakan sah secara digital oleh: ' . strtoupper($proposal->submitter->name) . ' pada ' . date('d/m/Y H:i');
                @endphp
                <img src="{{ generate_qr_code_data_uri($qrText) }}" width="70" alt="QR Code"
                    style="margin-left: auto; display: block;">
            @else
                <div
                    style="color: #999; border: 1px dashed #ccc; padding: 10px; text-align: center; font-size: 8pt; width: 100%;">
                    [DRAFT - Belum Ditandatangani]
                </div>
            @endif
        </div>
        <p><strong>( {{ strtoupper($proposal->submitter->name) }} )</strong></p>
    </div>
    <div style="clear: both;"></div>

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