<!DOCTYPE html>
<html>

<head>
    <title>Laporan Monitoring dan Evaluasi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Vetted by AI - Manual Review Required by Senior Engineer/Manager */
        html, body {
            margin: 0;
            padding: 0;
            border: 0;
        }

        @page {
            margin: 3cm 2.5cm 3cm 3.5cm;
        }

        body {
            font-family: "Arial", "Helvetica", sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            color: #000;
            text-align: left;
        }

        /* ============================
           KOP SURAT
        ============================ */
        .kop-surat {
            border-bottom: 3pt solid #000;
            padding-bottom: 6px;
            margin-bottom: 0;
            position: relative;
            overflow: hidden;
        }

        .kop-surat-inner {
            border-bottom: 1pt solid #000;
            padding-bottom: 4px;
            margin-bottom: 2px;
        }

        .logo {
            position: absolute;
            left: 0;
            top: 4px;
            width: 75px;
        }

        .header-text {
            text-align: center;
            margin-left: 85px;
            margin-right: 0;
        }

        .inst-name {
            font-size: 13pt;
            font-weight: bold;
            color: #000;
            margin-bottom: 1px;
            letter-spacing: 0.5pt;
        }

        .lppm-name {
            font-size: 11pt;
            font-weight: bold;
            margin-top: 1px;
            margin-bottom: 4px;
        }

        .inst-address {
            font-size: 8.5pt;
            color: #333;
            margin-top: 1px;
        }

        /* ============================
           JUDUL LAPORAN
        ============================ */
        .report-title-container {
            text-align: center;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .report-title {
            font-size: 11pt;
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .report-subtitle {
            font-size: 9.5pt;
            margin-top: 2px;
            color: #333;
        }

        /* ============================
           TABEL DATA UTAMA
        ============================ */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
            table-layout: fixed;
            page-break-inside: auto;
        }

        table.data-table thead tr {
            page-break-inside: avoid;
            page-break-after: avoid;
        }

        table.data-table tbody tr {
            page-break-inside: avoid;
        }

        table.data-table th {
            background-color: #5c21b5; /* Purple for Monev */
            color: #fff;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            font-size: 9pt;
            padding: 5px 6px;
            border: 0.5pt solid #4c1d95;
            line-height: 1.3;
        }

        table.data-table td {
            font-size: 9pt;
            line-height: 1.35;
            padding: 4px 6px;
            vertical-align: top;
            border: 0.5pt solid #ddd6fe;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        table.data-table tbody tr:nth-child(even) td {
            background-color: #f5f3ff;
        }

        table.data-table tbody tr:nth-child(odd) td {
            background-color: #ffffff;
        }

        .text-center { text-align: center; }
        .text-right  { text-align: right; }
        .text-left   { text-align: left; }
        .text-justify { text-align: justify; }
        .fw-bold     { font-weight: bold; }

        .cell-title {
            font-weight: bold;
            text-align: left;
            line-height: 1.35;
        }

        .text-muted {
            color: #555;
            font-size: 8pt;
        }

        .status-ok   { color: #166534; font-weight: bold; }
        .status-warn { color: #92400e; font-weight: bold; }

        /* ============================
           TANDA TANGAN
        ============================ */
        .signature-wrapper {
            margin-top: 28px;
            page-break-inside: avoid;
        }

        table.signature-table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        table.signature-table td {
            border: none;
            padding: 0;
            vertical-align: top;
        }

        .sign-block {
            text-align: center;
            font-size: 10.5pt;
            line-height: 1.6;
        }

        .sign-space {
            height: 70px;
        }

        .sign-name {
            font-weight: bold;
            text-decoration: underline;
            font-size: 10.5pt;
        }

        .sign-nip {
            font-size: 9pt;
            color: #333;
        }

        .digital-signature {
            border: 1pt solid #7c3aed;
            padding: 4px;
            display: inline-block;
            margin: 4px auto;
            border-radius: 4px;
            background-color: #f5f3ff;
            color: #7c3aed;
            text-align: center;
            width: 75px;
        }

        .digital-signature img {
            width: 65px;
            height: 65px;
        }

        .signature-label {
            display: block;
            font-size: 6.5pt;
            margin-top: 2px;
            color: #7c3aed;
            font-weight: bold;
        }

        /* ============================
           FOOTER & WATERMARK
        ============================ */
        .footer {
            position: fixed;
            bottom: -1.5cm;
            left: 0;
            right: 0;
            font-size: 8pt;
            text-align: center;
            color: #666;
            border-top: 0.5pt solid #ccc;
            padding-top: 4px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 75pt;
            color: rgba(200, 200, 200, 0.35);
            z-index: -1000;
            white-space: nowrap;
            font-weight: bold;
        }
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
        <div class="report-title">LAPORAN REKAPITULASI MONITORING DAN EVALUASI (MONEV)</div>
        <div class="report-subtitle">Tahun Akademik: <strong>{{ $period }}</strong> | Semester: <strong>{{ ucfirst($semester) }}</strong></div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 35%;">Judul Penelitian / Pengabdian</th>
                <th style="width: 20%;">Pengusul</th>
                <th style="width: 15%;">Reviewer</th>
                <th style="width: 10%;">Skor</th>
                <th style="width: 15%;">Status Akhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $index => $review)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="cell-title">{{ $review->proposal->title }}</td>
                    <td>
                        <div style="font-weight: bold;">{{ $review->proposal->submitter->name }}</div>
                        <div class="text-muted">NIDN: {{ $review->proposal->submitter->identity?->identity_id ?? '-' }}</div>
                    </td>
                    <td class="text-center">{{ $review->reviewer->name }}</td>
                    <td class="text-center fw-bold">{{ $review->score ?? '-' }}</td>
                    <td class="text-center">
                        @if($review->status)
                            <span class="status-ok">{{ $review->status }}</span>
                        @else
                            <span class="text-muted">Belum Dinilai</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 25px; color: #888; font-style: italic;">
                        Tidak ada data monev untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-wrapper">
        <table class="signature-table">
            <tr>
                <td width="33%">
                    <div class="sign-block">
                        <div>Pekalongan, {{ now()->translatedFormat('d F Y') }}</div>
                        <div>Mengetahui,</div>
                        <div style="font-weight: bold;">Rektor ITSNU Pekalongan</div>
                    @if(!($isPreview ?? false) && $institutionalReport && $institutionalReport->status === \App\Enums\InstitutionalReportStatus::APPROVED)
                        <div class="digital-signature">
                            <img src="{{ generate_qr_code_data_uri(route('reports.monitoring', ['ref' => substr($institutionalReport->id, 0, 8)])) }}"
                                alt="QR Code">
                            <span class="signature-label">DIGITALLY SIGNED</span>
                        </div>
                    @else
                        <div style="margin-bottom: 75px;"></div>
                    @endif
                    <div class="sign-name">
                        {{ format_name($rektor?->identity?->title_prefix, $rektor?->name ?? 'Rektor', $rektor?->identity?->title_suffix) }}
                    </div>
                    <div class="sign-nip">NPP. {{ $rektor?->identity?->identity_id ?? '-' }}</div>
                </td>
                <td width="34%"></td>
                <td width="33%" class="text-center">
                    <div class="sign-date" style="margin-bottom: 4px;">Pekalongan,
                        {{ now()->translatedFormat('d F Y') }}
                    </div>
                    <div style="margin-bottom: 4px;">Dibuat oleh,</div>
                    <div style="margin-bottom: 4px; font-weight: bold;">Kepala LPPM ITSNU Pekalongan</div>
                    @if(!($isPreview ?? false) && $institutionalReport && in_array($institutionalReport->status, [\App\Enums\InstitutionalReportStatus::SUBMITTED, \App\Enums\InstitutionalReportStatus::APPROVED]))
                        <div class="digital-signature" style="border-color: #059669; color: #059669;">
                            <img src="{{ generate_qr_code_data_uri(route('reports.monitoring', ['ref' => substr($institutionalReport->id, 0, 8)])) }}"
                                alt="QR Code">
                            <span class="signature-label" style="color: #059669;">VERIFIED BY LPPM</span>
                        </div>
                    @else
                        <div style="margin-bottom: 75px;"></div>
                    @endif
                    <div class="sign-name">
                        {{ format_name($lppmHead?->identity?->title_prefix, $lppmHead?->name ?? 'Kepala LPPM', $lppmHead?->identity?->title_suffix) }}
                    </div>
                    <div class="sign-nip">NPP. {{ $lppmHead?->identity?->identity_id ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Halaman 1 dari 1 | SIM-LPPM ITSNU Pekalongan | Dicetak oleh: {{ auth()->user()->name ?? 'Administrator' }}
    </div>
</body>

</html>
