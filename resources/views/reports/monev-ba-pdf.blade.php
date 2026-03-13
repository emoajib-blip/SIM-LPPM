<!DOCTYPE html>
<html>
<head>
    <title>Berita Acara Monev</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        html, body { margin: 0; padding: 0; border: 0; }
        @page { margin: 2.5cm 2.5cm 2.5cm 3cm; }
        body { font-family: "Arial", sans-serif; font-size: 11pt; line-height: 1.5; color: #000; }
        .kop-surat { border-bottom: 2pt solid #000; padding-bottom: 5px; margin-bottom: 20px; text-align: center; position: relative; }
        .logo { position: absolute; left: 0; top: 0; width: 70px; }
        .inst-name { font-size: 14pt; font-weight: bold; }
        .lppm-name { font-size: 12pt; font-weight: bold; margin-top: 2px; }
        .inst-address { font-size: 9pt; color: #333; margin-top: 5px; }
        
        .title { text-align: center; font-weight: bold; text-decoration: underline; font-size: 12pt; margin-bottom: 20px; text-transform: uppercase; }
        
        .content-section { margin-bottom: 15px; }
        .label { width: 180px; display: inline-block; vertical-align: top; font-weight: bold; }
        .value { display: inline-block; width: 450px; vertical-align: top; }
        
        table.borang-table { width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 20px; }
        table.borang-table th, table.borang-table td { border: 1pt solid #000; padding: 8px; vertical-align: top; }
        table.borang-table th { background-color: #f2f2f2; text-align: center; }
        
        .signature-section { margin-top: 40px; width: 100%; }
        .signature-table { width: 100%; border: none; }
        .signature-table td { width: 50%; border: none; text-align: center; vertical-align: top; }
        .sign-space { height: 80px; }
        .sign-name { font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <img src="{{ public_path('logo.png') }}" class="logo">
        <div class="inst-name">INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN</div>
        <div class="lppm-name">LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT</div>
        <div class="inst-address">Jl. Karangdowo No. 9, Kedungwuni, Kab. Pekalongan 51173</div>
    </div>

    <div class="title">
        @if($review->proposal->detailable_type === \App\Models\Research::class)
            BERITA ACARA MONITORING DAN EVALUASI INTERNAL<br>PROGRAM PENELITIAN TAHUN ANGGARAN {{ $review->academic_year ?? date('Y') }}
        @else
            BERITA ACARA MONITORING DAN EVALUASI<br>PROGRAM PENGABDIAN KEPADA MASYARAKAT ITSNU PEKALONGAN
        @endif
    </div>

    <div class="content-section">
        <p>Pada hari ini, <strong>{{ $review->reviewed_at?->translatedFormat('l') ?? '..........' }}</strong>, tanggal <strong>{{ $review->reviewed_at?->translatedFormat('d F Y') ?? '..........' }}</strong>, telah dilaksanakan Monitoring dan Evaluasi Internal untuk proposal berikut:</p>
    </div>

    <div class="content-section">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="width: 180px; font-weight: bold;">Judul {{ $review->proposal->detailable_type === \App\Models\Research::class ? 'Penelitian' : 'Kegiatan' }}</td>
                <td>: <strong>{{ $review->proposal->title }}</strong></td>
            </tr>
            @if($review->proposal->detailable_type === \App\Models\Research::class)
                <tr>
                    <td style="font-weight: bold;">Bidang Penelitian</td>
                    <td>: {{ $review->proposal?->focusArea?->name ?? '-' }}</td>
                </tr>
            @endif
            <tr>
                <td style="font-weight: bold;">Skema</td>
                <td>: {{ $review->proposal->researchScheme?->name ?? $review->proposal->communityServiceScheme?->name ?? '-' }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Ketua {{ $review->proposal->detailable_type === \App\Models\Research::class ? 'Peneliti' : 'Pelaksana' }}</td>
                <td>: {{ $review->proposal->submitter->name }} (NIDN: {{ $review->proposal->submitter->identity?->identity_id ?? '-' }})</td>
            </tr>
            @if($review->proposal->detailable_type === \App\Models\Research::class)
                <tr>
                    <td style="font-weight: bold;">Jabatan Fungsional</td>
                    <td>: {{ $review->proposal->submitter->identity?->functional_position ?? '-' }}</td>
                </tr>
            @else
                <tr>
                    <td style="font-weight: bold;">Dana Disetujui</td>
                    <td>: Rp {{ number_format($review->proposal?->sbk_value ?? 0, 0, ',', '.') }}</td>
                </tr>
            @endif
        </table>
    </div>

    <h4 style="margin-bottom: 5px;">HASIL EVALUASI CAPAIAN:</h4>
    <table class="borang-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 45%;">Komponen Penilaian</th>
                <th>Komentar Reviewer / Pilihan Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($criteria as $item)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $item->criteria }}</td>
                    <td>
                        @php 
                            $fieldKey = \Illuminate\Support\Str::snake($item->criteria);
                            $val = $review->borang_data[$fieldKey] ?? '-';
                        @endphp
                        {{ $val }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" style="text-align: right; background-color: #f9f9f9;"><strong>SKOR TOTAL (0-100)</strong></td>
                <td style="font-weight: bold; background-color: #f9f9f9;">{{ $review->score }}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; background-color: #f9f9f9;"><strong>REKOMENDASI STATUS</strong></td>
                <td style="font-weight: bold; text-transform: uppercase;">{{ str_replace('_', ' ', $review->status) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="content-section">
        <strong>Catatan Reviewer:</strong><br>
        <div style="border: 1pt solid #ccc; padding: 10px; min-height: 80px; text-align: justify;">
            {{ $review->notes ?? 'Tidak ada catatan tambahan.' }}
        </div>
    </div>

    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td>
                    <p style="margin-bottom: 5px;">Monev Reviewer,</p>
                    <div class="sign-space">
                        @if($review->reviewed_at)
                            <div style="border: 1.5pt solid #1a56db; display: inline-block; padding: 8px; color: #1a56db; font-size: 8pt; border-radius: 4px; font-weight: bold; background-color: #f0f7ff;">
                                <div style="font-size: 10pt; border-bottom: 1pt solid #1a56db; margin-bottom: 3px;">DIGITALLY VERIFIED</div>
                                REVIEWER CODE: {{ substr(md5($review->reviewer_id), 0, 8) }}<br>
                                DATE: {{ $review->reviewed_at->format('d/m/Y H:i') }}
                            </div>
                        @endif
                    </div>
                    <div class="sign-name">{{ $review->reviewer->name }}</div>
                    <div style="font-size: 9pt;">NIDN: {{ $review->reviewer->identity?->identity_id ?? '-' }}</div>
                </td>
                <td>
                    <p style="margin-bottom: 5px;">Mengetahui,<br>Admin LPPM ITSNU Pekalongan</p>
                    <div class="sign-space">
                        @if($review->finalized_by_lppm_at)
                            <div style="border: 1.5pt solid #059669; display: inline-block; padding: 8px; color: #059669; font-size: 8pt; border-radius: 4px; font-weight: bold; background-color: #ecfdf5;">
                                <div style="font-size: 10pt; border-bottom: 1pt solid #059669; margin-bottom: 3px;">FINALIZED & VALIDATED</div>
                                ADMIN AUTH: {{ substr(uuid_create(), 0, 8) }}<br>
                                DATE: {{ $review->finalized_by_lppm_at->format('d/m/Y H:i') }}
                            </div>
                        @endif
                    </div>
                    <div class="sign-name">...........................................</div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 30px;">
                    <p style="margin-bottom: 5px;">Mengesahkan,<br>Kepala LPPM ITSNU Pekalongan</p>
                    <div class="sign-space" style="height: 100px;">
                        @if($review->approved_by_kepala_at)
                            <div style="border: 2pt solid #dc2626; display: inline-block; padding: 10px; color: #dc2626; font-size: 9pt; border-radius: 6px; font-weight: bold; background-color: #fef2f2; position: relative;">
                                <div style="font-size: 11pt; border-bottom: 1.5pt solid #dc2626; margin-bottom: 5px; letter-spacing: 1px;">APPROVED BY HEAD OF LPPM</div>
                                SIGNATURE VERIFIED: SIM-LPPM/{{ $review->id }}<br>
                                TIMESTAMP: {{ $review->approved_by_kepala_at->format('d/m/Y H:i:s') }}
                            </div>
                        @else
                             <div class="sign-space"></div>
                        @endif
                    </div>
                    @php $kepala = \App\Models\User::role('kepala lppm')->first(); @endphp
                    <div class="sign-name">{{ $kepala->name ?? '...........................................' }}</div>
                    <div style="font-size: 9pt;">NIDN: {{ $kepala->identity?->identity_id ?? '-' }}</div>
                </td>
            </tr>
        </table>
    </div>

    <div style="position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 8pt; color: #888; border-top: 0.5pt solid #eee; padding-top: 5px;">
        Dokumen ini dihasilkan secara otomatis oleh SIM-LPPM ITSNU Pekalongan pada {{ now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
