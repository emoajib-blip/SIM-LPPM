<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Export - {{ $proposal->id }}</title>
    <style>
        @page {
            margin: 1.5cm;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9pt;
            line-height: 1.2;
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
        .report-type-box {
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #000;
            color: #fff;
            padding: 3px;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
            vertical-align: top;
            font-size: 8pt;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }
        .no-border, .no-border td, .no-border th {
            border: none !important;
        }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .page-break { page-break-after: always; }
        .section-title {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 3px;
            font-size: 10pt;
        }
        .title-border-box {
            border: 1px solid #000;
            padding: 8px;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: justify;
        }
    </style>
</head>
<body>
    <table class="header-table no-border">
        <tr>
            <td class="logo" style="width: 60px;">
                @if(file_exists(public_path('logo.png')))
                    <img src="{{ public_path('logo.png') }}" alt="Logo" style="width: 50px;">
                @endif
            </td>
            <td class="header-text">
                <div>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM)</div>
                <div>Institut Teknologi dan Sains Nahdlatul Ulama (ITSNU) Pekalongan</div>
                <div style="font-weight: normal; font-size: 8pt;">Jl. Karangdowo No. 9, Karangdowo, Kec. Kedungwuni, Kab. Pekalongan, Jawa Tengah 51173</div>
                <div style="font-weight: normal; font-size: 8pt;">Email: lppmitsnupkl@gmail.com | Website: https://lppm.itsnupekalongan.ac.id/</div>
            </td>
        </tr>
    </table>

    <div class="report-type-box">
        LAPORAN KEMAJUAN {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }} {{ $report->reporting_year }}
    </div>

    <div style="text-align: center; margin-bottom: 15px;">
        ID Proposal: {{ $proposal->id }} | Periode: {{ strtoupper($report->reporting_period) }}
    </div>

    @php
        // helper is available globally now
        $submitterFullName = format_name(
            $proposal->submitter->identity->title_prefix ?? '',
            $proposal->submitter->name,
            $proposal->submitter->identity->title_suffix ?? ''
        );
    @endphp

    <div class="section-title">1. JUDUL {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }}</div>
    <div class="title-border-box">
        {{ $proposal->title }}
    </div>

    <div class="section-title">2. IDENTITAS PENGUSUL</div>
    <table>
        <thead>
            <tr>
                <th>Nama, Peran</th>
                <th>Institusi</th>
                <th>Program Studi</th>
                <th>Bidang Tugas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>{{ strtoupper($submitterFullName) }}</strong><br>Ketua Pengusul</td>
                <td>{{ $proposal->submitter->identity->institution->name ?? '-' }}</td>
                <td>{{ $proposal->submitter->identity->studyProgram->name ?? '-' }}</td>
                <td>Ketua</td>
            </tr>
            @foreach($proposal->teamMembers->where('pivot.role', 'anggota') as $member)
            <tr>
                <td><strong>{{ strtoupper(format_name($member->identity->title_prefix ?? '', $member->name, $member->identity->title_suffix ?? '')) }}</strong><br>Anggota Pelaksana</td>
                <td>{{ $member->identity->institution->name ?? '-' }}</td>
                <td>{{ $member->identity->studyProgram->name ?? '-' }}</td>
                <td>{{ $member->pivot->tasks ?? 'Anggota' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="section-title">3. RINGKASAN KEMAJUAN</div>
    <div style="text-align: justify; margin-bottom: 10px; border: 1px solid #eee; padding: 10px; font-size: 9pt;">
        {!! nl2br(e($report->summary_update)) !!}
    </div>

    <div class="section-title">4. CAPAIAN LUARAN WAJIB</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Luaran</th>
                <th>Status Saat Ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report->mandatoryOutputs as $index => $mo)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $mo->proposalOutput->type }}</td>
                <td>{{ ucfirst($mo->status_type) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($report->additionalOutputs->count() > 0)
    <div class="section-title">5. CAPAIAN LUARAN TAMBAHAN</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Luaran</th>
                <th>Status Saat Ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report->additionalOutputs as $index => $ao)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $ao->proposalOutput->type }}</td>
                <td>{{ ucfirst($ao->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- HALAMAN PENGESAHAN LAPORAN --}}
    @if($report_approval_mode === 'digital' || $report_approval_mode === 'both')
    <div class="page-break"></div>
    <div style="text-align: center; font-weight: bold; font-size: 11pt; margin-bottom: 20px; text-transform: uppercase;">
        HALAMAN PENGESAHAN LAPORAN KEMAJUAN {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }}
    </div>

    <table style="width: 100%; border-collapse: collapse; font-size: 9pt;">
        <tr>
            <td width="5%" class="text-center">1.</td>
            <td width="35%">Judul {{ $proposal->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian' }}</td>
            <td width="60%">{{ $proposal->title }}</td>
        </tr>
        <tr>
            <td class="text-center">2.</td>
            <td>Rumpun Ilmu</td>
            <td>{{ $proposal->researchScheme->name ?? '-' }} / {{ $proposal->focusArea->name ?? '-' }}</td>
        </tr>
        <tr>
            <td class="text-center">3.</td>
            <td colspan="2">Ketua {{ $proposal->detailable_type === 'App\Models\Research' ? 'Peneliti' : 'Pelaksana' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">a. Nama Lengkap</td>
            <td>{{ $submitterFullName }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">b. NIDN/ NIDK</td>
            <td>{{ $proposal->submitter->identity->identity_id ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">c. Jabatan Fungsional</td>
            <td>{{ $proposal->submitter->identity->functional_position ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">d. Program Studi</td>
            <td>{{ $proposal->submitter->identity->studyProgram->name ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">e. Nomor HP</td>
            <td>{{ $proposal->submitter->phone_number ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">f. Alamat surel (e-mail)</td>
            <td>{{ $proposal->submitter->email ?? '-' }}</td>
        </tr>

        @php
            $lecturerMembers = $proposal->teamMembers->filter(fn($m) => $m->id !== $proposal->submitter_id && ($m->identity?->type === 'dosen' || $m->pivot->role === 'anggota'));
            $memberCount = 0;
        @endphp

        @foreach($lecturerMembers as $member)
        @php $memberCount++; @endphp
        <tr>
            <td class="text-center">{{ 3 + $memberCount }}.</td>
            <td colspan="2">Anggota {{ $proposal->detailable_type === 'App\Models\Research' ? 'Peneliti' : 'Pelaksana' }} {{ $lecturerMembers->count() > 1 ? to_roman($memberCount) : '' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">a. Nama Lengkap</td>
            <td>{{ format_name($member->identity->title_prefix ?? '', $member->name, $member->identity->title_suffix ?? '') }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">b. NIDN/ NIDK</td>
            <td>{{ $member->identity->identity_id ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">c. Perguruan Tinggi</td>
            <td>{{ $member->identity->institution->name ?? 'ITSNU Pekalongan' }}</td>
        </tr>
        @endforeach

        @php
            $studentMembers = $proposal->teamMembers->filter(fn($m) => $m->identity?->type === 'mahasiswa' || $m->pivot->role === 'mahasiswa');
            $nextNum = 4 + $lecturerMembers->count();
            $totalRAB = $proposal->budgetItems->sum('total_price');
        @endphp

        <tr>
            <td class="text-center">{{ $nextNum }}.</td>
            <td>Nama Mahasiswa</td>
            <td>
                @if($studentMembers->count() > 0)
                    <ol style="margin: 0; padding-left: 15px;">
                    @foreach($studentMembers as $student)
                        <li>{{ $student->name }} ({{ $student->identity->identity_id ?? '-' }})</li>
                    @endforeach
                    </ol>
                @else
                    -
                @endif
            </td>
        </tr>

        <tr>
            <td class="text-center">{{ $nextNum + 1 }}.</td>
            <td>Luaran yang dihasilkan</td>
            <td>
                @if($proposal->outputs->count() > 0)
                    {{ implode(', ', $proposal->outputs->pluck('type')->unique()->toArray()) }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <td class="text-center">{{ $nextNum + 2 }}.</td>
            <td>Jangka Waktu Pelaksanaan</td>
            <td>{{ $proposal->duration_in_years }} Tahun</td>
        </tr>
        <tr>
            <td class="text-center">{{ $nextNum + 3 }}.</td>
            <td>Anggaran Biaya</td>
            <td>Rp {{ number_format($totalRAB, 0, ',', '.') }}</td>
        </tr>
    </table>

    <table class="no-border" style="width: 100%; margin-top: 30px;">
        <tr>
            <td width="50%"></td>
            <td width="50%" class="text-center">Pekalongan, {{ date('d F Y') }}</td>
        </tr>
        <tr>
            <td class="text-center">
                Mengetahui,<br>
                Dekan Fakultas {{ $proposal->submitter->identity->faculty->name ?? '.......................' }}
            </td>
            <td class="text-center">
                Ketua {{ $proposal->detailable_type === 'App\Models\Research' ? 'Peneliti' : 'Pelaksana' }}
            </td>
        </tr>

        <tr>
            <td class="text-center" style="height: 100px; vertical-align: bottom;">
                @if(isset($dean_signed_at) && $dean_signed_at)
                    <div style="margin-bottom: 5px;">
                        <img src="{{ generate_qr_code_data_uri('Laporan disetujui secara digital oleh: ' . $dean_name . ' (Dekan) pada ' . \Carbon\Carbon::parse($dean_signed_at)->format('d-m-Y H:i')) }}" width="70">
                    </div>
                    <div style="font-size: 8pt; margin-bottom: 5px;">Disetujui pada: {{ \Carbon\Carbon::parse($dean_signed_at)->format('d-m-Y H:i') }}</div>
                @else
                    <div style="height: 70px;"></div>
                @endif
                <strong><u>{{ $dean_name }}</u></strong><br>
                NIDN. {{ $dean_id }}
            </td>
            <td class="text-center" style="height: 100px; vertical-align: bottom;">
                <div style="margin-bottom: 5px;">
                    <img src="{{ generate_qr_code_data_uri('Laporan diajukan secara digital oleh: ' . $submitterFullName . ' (Ketua Pengusul) pada ' . \Carbon\Carbon::parse($lecturer_signed_at)->format('d-m-Y H:i')) }}" width="70">
                </div>
                <div style="font-size: 8pt; margin-bottom: 5px;">Diajukan pada: {{ \Carbon\Carbon::parse($lecturer_signed_at)->format('d-m-Y H:i') }}</div>
                <strong><u>{{ $submitterFullName }}</u></strong><br>
                NIDN. {{ $proposal->submitter->identity->identity_id ?? '-' }}
            </td>
        </tr>

        {{-- LPPM Head --}}
        <tr>
            <td colspan="2" class="text-center" style="padding-top: 20px;">
                @if(isset($reviewer_signed_at) && $reviewer_signed_at)
                    <div style="margin-bottom: 10px; font-style: italic;">
                        Telah direview oleh Reviewer pada tanggal: {{ \Carbon\Carbon::parse($reviewer_signed_at)->format('d F Y') }}
                    </div>
                @endif
                
                Menyetujui,<br>
                Kepala LPPM ITSNU Pekalongan
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center" style="height: 100px; vertical-align: bottom;">
                @if(isset($lppm_signed_at) && $lppm_signed_at)
                    <div style="margin-bottom: 5px;">
                        <img src="{{ generate_qr_code_data_uri('Laporan diketahui secara digital oleh: ' . $lppm_head_name . ' (Kepala LPPM) pada ' . \Carbon\Carbon::parse($lppm_signed_at)->format('d-m-Y H:i')) }}" width="70">
                    </div>
                    <div style="font-size: 8pt; margin-bottom: 5px;">Diperiksa pada: {{ \Carbon\Carbon::parse($lppm_signed_at)->format('d-m-Y H:i') }}</div>
                @else
                    <div style="height: 70px;"></div>
                @endif
                <strong><u>{{ $lppm_head_name }}</u></strong><br>
                NIDN. {{ $lppm_head_id }}
            </td>
        </tr>
    </table>

    <div style="margin-top: 60px; text-align: center; color: #666; font-size: 8pt; border: 1px dashed #ccc; padding: 15px; background-color: #fcfcfc;">
        <div style="font-weight: bold; margin-bottom: 5px; color: #333;">DOKUMEN INI DISAHKAN SECARA DIGITAL</div>
        <div>Sesuai dengan kebijakan LPPM ITSNU Pekalongan, pengesahan laporan dilakukan melalui sistem informasi.</div>
        <div style="margin-top: 5px; font-family: monospace;">ID Laporan: {{ $report->id }} | Dicetak pada: {{ date('Y-m-d H:i:s') }}</div>
    </div>
    @endif

</body>
</html>
