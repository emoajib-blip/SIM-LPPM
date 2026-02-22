<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Proposal Export - {{ $proposal->id }}</title>
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
        .protection-box {
            text-align: center;
            border: 1px solid #000;
            padding: 5px;
            margin-top: 5px;
            font-size: 8pt;
            background-color: #fff;
            margin-bottom: 10px;
        }
        .proposal-type-box {
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #000;
            color: #fff;
            padding: 3px;
            font-size: 10pt;
        }
        .proposal-id {
            text-align: center;
            font-size: 9pt;
            margin-bottom: 15px;
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
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .page-break { page-break-after: always; }
        
        .section-title {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 3px;
            font-size: 10pt;
        }
        .mb-0 { margin-bottom: 0; }
        .mt-0 { margin-top: 0; }
        
        .title-border-box {
            border: 1px solid #000;
            padding: 8px;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: justify;
        }

        .group-total {
            font-weight: bold;
            padding: 5px 0;
            margin-bottom: 2px;
            font-size: 9pt;
        }
        a {
            color: #0000EE;
            text-decoration: underline;
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

    <div class="protection-box">
        <strong>PROTEKSI ISI PROPOSAL</strong><br>
        Dilarang menyalin, menyimpan, memperbanyak sebagian atau seluruh isi proposal ini dalam bentuk apapun<br>
        kecuali oleh pengusul dan pengelola administrasi pengabdian kepada masyarakat
    </div>

    <div class="proposal-type-box">
        PROPOSAL {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }} {{ $proposal->start_year }}
    </div>

    <div class="proposal-id">
        ID Proposal: {{ $proposal->id }}<br>
        Rencana Pelaksanaan {{ $proposal->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian' }} : tahun {{ $proposal->start_year }} s.d. tahun {{ (int)$proposal->start_year + (int)$proposal->duration_in_years - 1 }}
    </div>

    @php 
        $sectionNum = 1; 
        if (!function_exists('formatName')) {
            function formatName($prefix, $name, $suffix) {
                $fullName = trim($name);
                if (!empty($prefix) && !str_starts_with($fullName, $prefix) && !str_contains($fullName, $prefix . ' ')) {
                    $fullName = $prefix . ' ' . $fullName;
                }
                if (!empty($suffix) && !str_ends_with($fullName, $suffix) && !str_contains($fullName, ', ' . $suffix)) {
                    $fullName = $fullName . ', ' . $suffix;
                }
                return trim($fullName, ' ,');
            }
        }
        $submitterFullName = formatName($proposal->submitter->identity->title_prefix ?? '', $proposal->submitter->name, $proposal->submitter->identity->title_suffix ?? '');
    @endphp

    {{-- 1. JUDUL --}}
    <div class="section-title">{{ $sectionNum++ }}. JUDUL {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }}</div>
    <div class="title-border-box">
        {{ $proposal->title }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Kelompok Skema</th>
                <th>Ruang Lingkup</th>
                <th>Bidang Fokus</th>
                <th>Lama Kegiatan</th>
                <th>Tahun Pertama Usulan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{{ $proposal->researchScheme->name ?? '-' }}</td>
                <td class="text-center">
                    @if($proposal->detailable_type === 'App\Models\Research')
                        Penelitian
                    @else
                        Pemberdayaan Kemitraan Masyarakat
                    @endif
                </td>
                <td class="text-center">{{ $proposal->focusArea->name ?? '-' }}</td>
                <td class="text-center">{{ $proposal->duration_in_years }}</td>
                <td class="text-center">{{ $proposal->start_year }}</td>
            </tr>
        </tbody>
    </table>

    <table class="no-border" style="margin-bottom: 15px; font-size: 8.5pt;">
        <tr>
            <td width="150" style="padding: 2px;">Tema Penelitian</td>
            <td style="padding: 2px;">: {{ $proposal->theme->name ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 2px;">Topik Penelitian</td>
            <td style="padding: 2px;">: {{ $proposal->topic->name ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 2px;">Kata Kunci (Keywords)</td>
            <td style="padding: 2px;">
                : 
                @if($proposal->keywords && count($proposal->keywords) > 0)
                    {{ implode(', ', $proposal->keywords->pluck('name')->toArray()) }}
                @else
                    -
                @endif
            </td>
        </tr>
        @if($proposal->detailable_type === 'App\Models\Research')
            <tr>
                <td style="padding: 2px;">Jenis TKT</td>
                <td style="padding: 2px;">: {{ $proposal->detailable->tkt_type ?? '-' }}</td>
            </tr>
        @endif
    </table>

    {{-- 2. IDENTITAS PENGUSUL --}}
    <div class="section-title">{{ $sectionNum++ }}. IDENTITAS PENGUSUL</div>
    <table>
        <thead>
            <tr>
                <th width="20%">Nama, Peran</th>
                <th width="15%">Institusi</th>
                <th width="15%">Program Studi</th>
                <th width="15%">Bidang Tugas</th>
                <th width="10%">ID Sinta</th>
                <th width="10%">H-Index</th>
                <th width="15%">Rumpun Ilmu</th>
            </tr>
        </thead>
        <tbody>
            {{-- Ketua --}}
            <tr>
                <td>
                    <span class="font-bold">{{ strtoupper($submitterFullName) }}</span><br>
                    Ketua Pengusul
                </td>
                <td>{{ $proposal->submitter->identity->institution->name ?? '-' }}</td>
                <td>{{ $proposal->submitter->identity->studyProgram->name ?? '-' }}</td>
                <td>{{ $proposal->teamMembers->firstWhere('id', $proposal->submitter_id)->pivot->tasks ?? '-' }}</td>
                <td class="text-center">{{ $proposal->submitter->identity->sinta_id ?? '-' }}</td>
                <td class="text-center">{{ $proposal->submitter->identity->scopus_h_index ?? '-' }}</td>
                <td>{{ $proposal->clusterLevel1->name ?? '-' }}</td>
            </tr>
            {{-- Anggota Dosen --}}
            @php
                $lecturerMembersSection2 = $proposal->teamMembers->filter(fn($m) => $m->id !== $proposal->submitter_id && ($m->identity?->type === 'dosen' || $m->pivot->role === 'anggota' || $m->pivot->role === 'dosen'));
            @endphp
            @foreach($lecturerMembersSection2 as $member)
                @if($member->identity?->type === 'dosen' || $member->pivot->role === 'anggota' || $member->pivot->role === 'dosen')
                <tr>
                    <td>
                        <span class="font-bold">{{ strtoupper(formatName($member->identity->title_prefix ?? '', $member->name, $member->identity->title_suffix ?? '')) }}</span><br>
                        Anggota Pelaksana
                    </td>
                    <td>{{ $member->identity->institution->name ?? '-' }}</td>
                    <td>{{ $member->identity->studyProgram->name ?? '-' }}</td>
                    <td>{{ $member->pivot->tasks ?? '-' }}</td>
                    <td class="text-center">{{ $member->identity->sinta_id ?? '-' }}</td>
                    <td class="text-center">{{ $member->identity->scopus_h_index ?? '-' }}</td>
                    <td>{{ $proposal->clusterLevel1->name ?? '-' }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    {{-- 3. IDENTITAS MAHASISWA --}}
    <div class="section-title">{{ $sectionNum++ }}. IDENTITAS MAHASISWA</div>
    @php 
        // Get students from relations
        $mahasiswaRelation = $proposal->teamMembers->filter(fn($m) => ($m->identity?->type === 'mahasiswa' || $m->pivot?->role === 'mahasiswa'));
        
        // Get students from JSON
        $mahasiswaJson = [];
        if (!empty($proposal->student_members)) {
            $decoded = is_string($proposal->student_members) ? json_decode($proposal->student_members, true) : $proposal->student_members;
            if (is_array($decoded)) {
                $mahasiswaJson = $decoded;
            }
        }
        
        $hasStudents = $mahasiswaRelation->count() > 0 || count($mahasiswaJson) > 0;
    @endphp
    
    @if($hasStudents)
    <table>
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Tugas Dalam {{ $proposal->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian' }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- Display from Relations --}}
            @foreach($mahasiswaRelation as $member)
                <tr>
                    <td>{{ strtoupper($member->name) }}</td>
                    <td>{{ $member->identity->identity_id ?? '-' }}</td>
                    <td>{{ $member->identity->studyProgram->name ?? '-' }}</td>
                    <td>{{ $member->pivot->tasks ?? '-' }}</td>
                </tr>
            @endforeach
            
            {{-- Display from JSON --}}
            @foreach($mahasiswaJson as $student)
                <tr>
                    <td>{{ strtoupper($student['name'] ?? '-') }}</td>
                    <td>{{ $student['identifier'] ?? '-' }}</td>
                    <td>{{ $student['study_program'] ?? ($student['prodi'] ?? '-') }}</td>
                    <td>{{ $student['tasks'] ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div style="margin-left: 20px; border: 1px dashed #ccc; padding: 10px; color: #666; font-style: italic;">
        Tidak ada anggota mahasiswa dalam usulan ini.
    </div>
    @endif

    {{-- 4. MITRA KERJASAMA --}}
    @if($proposal->partners->count() > 0)
    <div class="section-title">{{ $sectionNum++ }}. MITRA KERJASAMA</div>
    @foreach($proposal->partners as $index => $partner)
    <div style="margin-bottom: 5px;">
        <strong>Mitra Sasaran {{ $index + 1 }}</strong>
        <table class="no-border" style="margin-left: 15px; margin-bottom: 5px;">
            <tr><td width="150" style="padding: 1px;">Jenis Mitra</td><td style="padding: 1px;">: {{ $partner->type ?? '-' }}</td></tr>
            <tr><td style="padding: 1px;">Nama Mitra Sasaran</td><td style="padding: 1px;">: {{ $partner->name }}</td></tr>
            <tr><td style="padding: 1px;">Institusi</td><td style="padding: 1px;">: {{ $partner->institution ?? '-' }}</td></tr>
            <tr><td style="padding: 1px;">Alamat Lengkap</td><td style="padding: 1px;">: {{ $partner->address ?? '-' }}</td></tr>
        </table>
    </div>
    @endforeach

    @if($proposal->detailable_type === 'App\Models\CommunityService')
        <div style="margin-top: 10px;">
            <strong>Ringkasan Permasalahan Mitra:</strong>
            <div style="margin-left: 20px; text-align: justify; margin-bottom: 5px;">{{ $proposal->detailable->partner_issue_summary ?? '-' }}</div>
            
            <strong>Solusi yang Ditawarkan:</strong>
            <div style="margin-left: 20px; text-align: justify; margin-bottom: 5px;">{{ $proposal->detailable->solution_offered ?? '-' }}</div>
        </div>
    @endif
    
    @endif

    {{-- Asta Cita (Skip if empty) --}}
    @if(isset($proposal->asta_cita) && $proposal->asta_cita)
    <div class="section-title">{{ $sectionNum++ }}. Asta Cita</div>
    <div style="margin-left: 20px; text-align: justify;">{{ $proposal->asta_cita }}</div>
    @endif

    {{-- SDGs (Skip if empty) --}}
    @if(isset($proposal->sdgs) && $proposal->sdgs)
    <div class="section-title">{{ $sectionNum++ }}. (SDGs)</div>
    <div style="margin-left: 20px; text-align: justify;">{{ $proposal->sdgs }}</div>
    @endif

    {{-- IKU (Skip if empty) --}}
    @if(isset($proposal->iku) && $proposal->iku)
    <div class="section-title">{{ $sectionNum++ }}. IKU</div>
    <div style="margin-left: 20px; text-align: justify;">{{ $proposal->iku }}</div>
    @endif

    {{-- Luaran Dijanjikan --}}
    @if($proposal->outputs->count() > 0)
    <div class="section-title">{{ $sectionNum++ }}. LUARAN DIJANJIKAN</div>
    <table>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Kelompok Luaran</th>
                <th>Jenis Luaran</th>
                <th>Status Target</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposal->outputs as $output)
            <tr>
                <td class="text-center">{{ $output->output_year }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $output->group)) }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $output->type)) }}</td>
                <td class="text-center">{{ $output->target_status }}</td>
                <td>{{ $output->description ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- Dokumen Pendukung --}}
    @php
        $supportingDocs = [];
        if ($proposal->detailable?->hasMedia('substance_file')) {
            $supportingDocs[] = ['name' => 'Substansi Usulan', 'file' => $proposal->detailable->getFirstMedia('substance_file')];
        }
    @endphp
    @if(count($supportingDocs) > 0)
    <div class="section-title">{{ $sectionNum++ }}. Dokumen Pendukung</div>
    <table>
        <thead>
            <tr>
                <th>Nama Data Pendukung</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supportingDocs as $doc)
            <tr>
                <td>{{ $doc['name'] }}</td>
                <td>Terlampir</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- Dokumen Pendukung Lainnya --}}
    @php
        $otherDocs = [];
        foreach($proposal->partners as $partner) {
            if ($partner->hasMedia('commitment_letter')) {
                $otherDocs[] = ['name' => 'Surat Pernyataan Kerjasama Mitra - ' . $partner->name, 'file' => $partner->getFirstMedia('commitment_letter')];
            }
        }
    @endphp
    @if(count($otherDocs) > 0)
    <div class="section-title">{{ $sectionNum++ }}. Dokumen Pendukung Lainnya</div>
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Nama Mitra</th>
                <th>File</th>
            </tr>
        </thead>
        <tbody>
            @foreach($otherDocs as $doc)
            <tr>
                <td>Surat Pernyataan Kerjasama</td>
                <td>{{ str_replace('Surat Pernyataan Kerjasama Mitra - ', '', $doc['name']) }}</td>
                <td>Terlampir</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- ANGGARAN --}}
    <div class="section-title">{{ $sectionNum++ }}. ANGGARAN</div>
    <p class="mb-0">Rencana Anggaran Biaya pengabdian mengacu pada PMK dan buku Panduan Penelitian dan Pengabdian kepada Masyarakat yang berlaku.</p>
    @php
        $totalRAB = $proposal->budgetItems->sum('total_price');
        $budgetGroups = $proposal->budgetItems->groupBy(function($item) {
            return $item->budgetGroup->name ?? ($item->group ?? 'Lainnya');
        });
    @endphp
    <p class="mt-0"><strong>Total RAB : Rp. {{ number_format($totalRAB, 0, ',', '.') }}</strong></p>

    @foreach($budgetGroups as $groupName => $items)
        @php $groupTotal = $items->sum('total_price'); @endphp
        <div class="group-total">
            Total Biaya {{ $groupName }} Rp. {{ number_format($groupTotal, 0, ',', '.') }} 
            ({{ $totalRAB > 0 ? number_format(($groupTotal / $totalRAB) * 100, 2) : 0 }}%)
        </div>
        <table>
            <thead>
                <tr>
                    <th width="20%">Komponen</th>
                    <th width="35%">Item</th>
                    <th width="10%">Satuan</th>
                    <th width="5%">Vol.</th>
                    <th width="15%">Biaya Satuan</th>
                    <th width="15%">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->budgetComponent->name ?? $item->component }}</td>
                    <td>{{ $item->item_description }}</td>
                    <td class="text-center">{{ $item->budgetComponent->unit ?? ($item->unit ?? '-') }}</td>
                    <td class="text-center">{{ $item->volume }}</td>
                    <td class="text-right">{{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($item->total_price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    {{-- HALAMAN PENGESAHAN --}}
    @if($proposal_approval_mode === 'digital' || $proposal_approval_mode === 'both')
    <div class="page-break"></div>
    <div style="text-align: center; font-weight: bold; font-size: 11pt; margin-bottom: 20px; text-transform: uppercase;">
        HALAMAN PERSETUJUAN PROPOSAL {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }}
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
            $lecturerMembers = $proposal->teamMembers->filter(fn($m) => $m->id !== $proposal->submitter_id && ($m->identity?->type === 'dosen' || $m->pivot->role === 'anggota' || $m->pivot->role === 'dosen'));
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
            <td>{{ formatName($member->identity->title_prefix ?? '', $member->name, $member->identity->title_suffix ?? '') }}</td>
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
            
            // Add JSON members to this list for display
            if (!empty($proposal->student_members)) {
                $rawJson = is_string($proposal->student_members) ? json_decode($proposal->student_members, true) : $proposal->student_members;
                if (is_array($rawJson)) {
                    foreach($rawJson as $jm) {
                        // Create a dummy object to match structure
                        $dummy = new \stdClass();
                        $dummy->name = $jm['name'];
                        $dummy->identity = new \stdClass();
                        $dummy->identity->identity_id = $jm['identifier'] ?? '-';
                        $dummy->identity->studyProgram = new \stdClass();
                        $dummy->identity->studyProgram->name = $jm['study_program'] ?? ($jm['prodi'] ?? '-');
                        $dummy->identity->institution = new \stdClass();
                        $dummy->identity->institution->name = $jm['institution'] ?? 'ITSNU Pekalongan';
                        $dummy->pivot = new \stdClass();
                        $dummy->pivot->tasks = $jm['tasks'] ?? '-';
                        
                        $studentMembers->push($dummy);
                    }
                }
            }
            
            $nextNum = 4 + $lecturerMembers->count();
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
                        <img src="{{ generate_qr_code_data_uri('Disetujui secara digital oleh: ' . $dean_name . ' (Dekan) pada ' . \Carbon\Carbon::parse($dean_signed_at)->format('d-m-Y H:i')) }}" width="70">
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
                    <img src="{{ generate_qr_code_data_uri('Diajukan secara digital oleh: ' . $submitterFullName . ' (Ketua Pengusul) pada ' . \Carbon\Carbon::parse($lecturer_signed_at)->format('d-m-Y H:i')) }}" width="70">
                </div>
                <div style="font-size: 8pt; margin-bottom: 5px;">Diajukan pada: {{ \Carbon\Carbon::parse($lecturer_signed_at)->format('d-m-Y H:i') }}</div>
                <strong><u>{{ $submitterFullName }}</u></strong><br>
                NIDN. {{ $proposal->submitter->identity->identity_id ?? '-' }}
            </td>
        </tr>

        {{-- LPPM Head --}}
        <tr>
            <td colspan="2" class="text-center" style="padding-top: 20px;">
                Menyetujui,<br>
                Kepala LPPM ITSNU Pekalongan
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center" style="height: 100px; vertical-align: bottom;">
                @if(isset($lppm_signed_at) && $lppm_signed_at)
                    <div style="margin-bottom: 5px;">
                        <img src="{{ generate_qr_code_data_uri('Diketahui secara digital oleh: ' . $lppm_head_name . ' (Kepala LPPM) pada ' . \Carbon\Carbon::parse($lppm_signed_at)->format('d-m-Y H:i')) }}" width="70">
                    </div>
                    <div style="font-size: 8pt; margin-bottom: 5px;">Disetujui pada: {{ \Carbon\Carbon::parse($lppm_signed_at)->format('d-m-Y H:i') }}</div>
                @else
                    <div style="height: 70px;"></div>
                @endif
                <strong><u>{{ $lppm_head_name }}</u></strong><br>
                NIDN. {{ $lppm_head_id }}
            </td>
        </tr>
    </table>
    @endif



</body>
</html>
