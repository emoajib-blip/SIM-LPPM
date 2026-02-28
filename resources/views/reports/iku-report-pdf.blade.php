<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Capaian IKU - {{ $period }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
            line-height: 1.5;
            font-size: 12px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            text-transform: uppercase;
            margin: 0;
        }

        .header h2 {
            font-size: 14px;
            margin: 5px 0;
        }

        .header p {
            font-size: 10px;
            margin: 0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .title h3 {
            text-decoration: underline;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .signature-section {
            margin-top: 50px;
            width: 100%;
        }

        .signature-table {
            border: none;
            width: 100%;
        }

        .signature-table td {
            border: none;
            width: 50%;
            text-align: center;
            padding-top: 60px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 8px;
            color: #999;
        }

        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 10px;
            color: #fff;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-primary {
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $institution->name ?? 'INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN' }}</h1>
        <h2>LEMBAGA PENELITIAN DAN PENGABDIAN MASYARAKAT (LPPM)</h2>
        <p>{{ $institution->address ?? 'Jl. Raya Karangdowo No. 9, Kedungwuni, Pekalongan, Jawa Tengah' }}</p>
    </div>

    <div class="title">
        <h3>LAPORAN CAPAIAN INDIKATOR KINERJA UTAMA (IKU)</h3>
        <p>Tahun Anggaran: {{ $period }}</p>
    </div>

    <table>
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

    <div style="margin-top: 20px;">
        <p><strong>Keterangan:</strong></p>
        <p style="font-size: 10px;">Laporan ini disusun berdasarkan Keputusan Menteri Pendidikan, Kebudayaan, Riset, dan
            Teknologi Nomor 358/M/KEP/2025. Data diambil secara otomatis dari sistem informasi LPPM ITSNU Pekalongan.
        </p>
    </div>

    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td>
                    Pekalongan, {{ now()->translatedFormat('d F Y') }}<br>
                    Mengetahui,<br>
                    <strong>Rektor</strong><br><br><br><br><br>
                    <u><strong>{{ format_name($rektor?->identity?->title_prefix, $rektor?->name ?? 'Drs. H. Ali Imron', $rektor?->identity?->title_suffix) }}</strong></u><br>
                    NPP. {{ $rektor?->identity?->identity_id ?? '-' }}
                </td>
                <td>
                    <br>
                    Hormat Kami,<br>
                    <strong>Kepala LPPM</strong><br><br><br><br><br>
                    <u><strong>{{ format_name($lppmHead?->identity?->title_prefix, $lppmHead?->name ?? 'Kepala LPPM', $lppmHead?->identity?->title_suffix) }}</strong></u><br>
                    NPP. {{ $lppmHead?->identity?->identity_id ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Dicetak otomatis oleh SIM LPPM ITSNU Pekalongan pada {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>

</html>