<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penelitian</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 1cm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            color: #333;
            line-height: 1.4;
        }

        /* Kop Surat Styles */
        .kop-surat {
            border-bottom: 2.5pt solid #000;
            padding-bottom: 5px;
            margin-bottom: 2px;
            position: relative;
        }

        .kop-surat-inner {
            border-bottom: 0.5pt solid #000;
            padding-bottom: 3px;
        }

        .logo {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
        }

        .header-text {
            text-align: center;
            margin-left: 90px;
            margin-right: 50px;
        }

        .inst-name {
            font-size: 14pt;
            font-weight: bold;
            color: #1a4a8e;
            margin-bottom: 0;
        }

        .lppm-name {
            font-size: 12pt;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .inst-address {
            font-size: 8pt;
            font-style: italic;
            color: #555;
        }

        .report-title-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .report-title {
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .report-subtitle {
            font-size: 10pt;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
        }

        th,
        td {
            border: 0.5pt solid #888;
            padding: 8px 5px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        th {
            background-color: #f1f4f9;
            font-weight: bold;
            text-align: center;
            font-size: 8.5pt;
            color: #1a4a8e;
        }

        td {
            font-size: 8.5pt;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-muted {
            color: #666;
            font-size: 7.5pt;
        }

        /* Signature Styles */
        .signature-wrapper {
            margin-top: 30px;
            width: 100%;
        }

        .signature-table {
            border: none !important;
        }

        .signature-table td {
            border: none !important;
            padding: 0;
        }

        .sign-date {
            margin-bottom: 60px;
        }

        .sign-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .sign-nip {
            font-size: 9pt;
        }

        .footer {
            position: fixed;
            bottom: -0.5cm;
            left: 0;
            right: 0;
            font-size: 8pt;
            text-align: center;
            color: #999;
            border-top: 0.5pt solid #eee;
            padding-top: 5px;
        }
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
        <div class="report-title">LAPORAN DATA PENELITIAN</div>
        <div class="report-subtitle">Tahun Anggaran Jurnal: <strong>{{ $period }}</strong></div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Judul Penelitian</th>
                <th width="120px">Ketua Peneliti</th>
                <th width="120px">Fakultas / Prodi</th>
                <th width="90px">Skema</th>
                <th width="80px">Status</th>
                <th width="90px">Dana Disetujui</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proposals as $index => $proposal)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="fw-bold">{{ $proposal->title }}</td>
                    <td>
                        <div>{{ $proposal->submitter?->name ?? '-' }}</div>
                        <div class="text-muted">NIDN: {{ $proposal->submitter?->identity?->identity_id ?? '-' }}</div>
                    </td>
                    <td>
                        {{ $proposal->submitter?->identity?->faculty?->name ?? '-' }}<br>
                        <span class="text-muted">{{ $proposal->submitter?->identity?->studyProgram?->name ?? '-' }}</span>
                    </td>
                    <td class="text-center">{{ $proposal->researchScheme?->name ?? '-' }}</td>
                    <td class="text-center">
                        <span class="fw-bold"
                            style="color: {{ $proposal->status?->value === 'approved' || $proposal->status?->value === 'completed' ? '#2d7a10' : '#444' }}">
                            {{ $proposal->status?->label() ?? '-' }}
                        </span>
                    </td>
                    <td class="text-right fw-bold">
                        @php
                            $dana = ($proposal->sbk_value ?? 0) > 0
                                ? $proposal->sbk_value
                                : ($proposal->budgetItems?->sum('total_price') ?? 0);
                        @endphp
                        Rp {{ number_format($dana, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center" style="padding: 30px; color: #999;">
                        Tidak ada data penelitian untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-wrapper">
        @php
            $lppm = \App\Models\User::role('kepala lppm')->with('identity')->first();
            $rektor = \App\Models\User::role('rektor')->with('identity')->first();

            // use the shared helper for consistency
            $lppmName = $lppm
                ? format_name(
                    $lppm->identity?->title_prefix ?? '',
                    $lppm->name,
                    $lppm->identity?->title_suffix ?? ''
                )
                : 'Kepala LPPM';
            $lppmNIDN = $lppm?->identity?->identity_id ?? '-';
            $rektorName = $rektor
                ? format_name(
                    $rektor->identity?->title_prefix ?? '',
                    $rektor->name,
                    $rektor->identity?->title_suffix ?? ''
                )
                : 'Rektor';
            $rektorNIDN = $rektor?->identity?->identity_id ?? '-';
        @endphp
        <table class="signature-table">
            <tr>
                <td width="50%" class="text-center">
                    <div class="sign-date" style="margin-bottom: 4px;">Pekalongan,
                        {{ now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 4px;">Mengetahui,</div>
                    <div style="margin-bottom: 4px; font-weight: bold;">Rektor ITSNU Pekalongan</div>
                    <div style="margin-bottom: 65px;"></div>
                    <div class="sign-name">{{ $rektorName }}</div>
                    <div class="sign-nip">NIDN. {{ $rektorNIDN }}</div>
                </td>
                <td width="50%" class="text-center">
                    <div class="sign-date" style="margin-bottom: 4px;">Pekalongan,
                        {{ now()->translatedFormat('d F Y') }}</div>
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
        Halaman 1 dari 1 | SIM-LPPM ITSNU Pekalongan | Dicetak oleh: {{ auth()->user()->name ?? 'Administrator' }}
    </div>
</body>

</html>