<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Proposal Export - {{ $proposal->id }}</title>
    <style>
    @page { 
        size: a4 portrait;
        margin: 3cm 3cm 3cm 4cm; 
    }
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100%;
    }
    body { 
        font-family: "Times New Roman", Times, serif; 
        font-size: 12pt; 
        line-height: 1.5; 
        color: #000;
        text-align: justify;
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
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            font-size: 11pt;
            line-height: 1.5;
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
        .text-justify { text-align: justify; }
        
        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            font-size: 11pt;
            border-left: 3px solid #000;
            padding-left: 8px;
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

        /* Improved Cover Page Styles (DomPDF Compatible) */
        .cover-page {
            box-sizing: border-box;
            width: 100%;
            text-align: center;
            padding-top: 1cm;
            margin: 0;
            page-break-after: always;
            position: relative;
        }
        .cover-header {
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 30px;
            margin-top: 10px;
        }
        .cover-logo {
            margin: 30px 0;
        }
        .cover-logo img {
            width: 150px;
        }
        .cover-title {
            font-size: 14pt;
            font-weight: bold;
            margin: 20px 0;
            padding: 0 40px;
            line-height: 1.4;
            text-transform: uppercase;
        }
        .cover-authors-container {
            margin: 30px auto;
            width: 90%;
        }
        .cover-authors-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
            border: 1px dashed #999;
        }
        .cover-authors-table td {
            padding: 8px;
            border: 1px dashed #999;
        }
        .cover-footer {
            margin-top: 40px;
            font-weight: bold;
            font-size: 12pt;
            text-transform: uppercase;
            line-height: 1.4;
            position: absolute;
            bottom: 0.5cm;
            width: 100%;
        }
        .cover-table {
            width: 100%;
            height: 18cm;
            border-collapse: collapse;
            border: none !important;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .cover-table td {
            border: none !important;
            padding: 0;
            vertical-align: top;
            text-align: center;
        }
    </style>
    @php
        $submitterFullName = format_name(
            $proposal->submitter->identity?->title_prefix ?? '',
            $proposal->submitter->name,
            $proposal->submitter->identity?->title_suffix ?? ''
        );
        $academicYear = $proposal->start_year . '/' . ((int)$proposal->start_year + 1);
        $facultyName = $proposal->submitter->identity?->faculty?->name ?? '.......................';
        $prodiName = $proposal->submitter->identity?->studyProgram?->name ?? '.......................';
    @endphp
</head><body><table class="cover-table">
        <tr>
            <td>
                <div class="cover-header">
                    PROPOSAL {{ $proposal->detailable_type === 'App\Models\Research' ? 'PENELITIAN' : 'PENGABDIAN' }} INTERNAL
                </div>

                <div class="cover-logo">
                    @if(file_exists(public_path('logo.png')))
                        <img src="{{ public_path('logo.png') }}" alt="Logo">
                    @else
                        <div style="height: 150px; border: 1px dashed #ccc; padding: 50px; margin: 0 auto; width: 200px;">LOGO UNIVERSITAS</div>
                    @endif
                </div>

                <div class="cover-title">
                    {{ $proposal->title }}
                </div>

                <div class="cover-authors-container">
                    <table class="cover-authors-table">
                        <tr>
                            <td colspan="4" class="text-center" style="background-color: #f9f9f9; font-weight: bold;">Oleh:</td>
                        </tr>
                        <tr>
                            <td width="20%">Ketua</td>
                            <td width="5%" class="text-center">:</td>
                            <td width="45%">{{ $submitterFullName }}</td>
                            <td width="30%">NIDN: {{ $proposal->submitter->identity?->identity_id ?? '-' }}</td>
                        </tr>
                        @php
                            $lecturerMembers = $proposal->teamMembers->filter(fn($m) => $m->id !== $proposal->submitter_id && ($m->identity?->type === 'dosen' || $m->pivot->role === 'anggota' || $m->pivot->role === 'dosen'));
                        @endphp
                        @foreach($lecturerMembers as $index => $member)
                        <tr>
                            <td width="20%">Anggota {{ $index + 1 }}</td>
                            <td width="5%" class="text-center">:</td>
                            <td width="45%">{{ format_name($member->identity?->title_prefix ?? '', $member->name, $member->identity?->title_suffix ?? '') }}</td>
                            <td width="30%">NIDN: {{ $member->identity?->identity_id ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div class="cover-footer">
                    PROGRAM STUDI {{ strtoupper($prodiName) }}<br>
                    FAKULTAS {{ strtoupper($facultyName) }}<br>
                    INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN<br>
                    TAHUN {{ $academicYear }}
                </div>
            </td>
        </tr>
    </table>

    <div style="page-break-after: always;"></div>

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
        // reuse the already formatted name
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
                <td>{{ $proposal->submitter->identity?->institution->name ?? '-' }}</td>
                <td>{{ $proposal->submitter->identity?->studyProgram->name ?? '-' }}</td>
                <td>{{ $proposal->teamMembers->firstWhere('id', $proposal->submitter_id)->pivot->tasks ?? '-' }}</td>
                <td class="text-center">{{ $proposal->submitter->identity?->sinta_id ?? '-' }}</td>
                <td class="text-center">{{ $proposal->submitter->identity?->scopus_h_index ?? '-' }}</td>
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
                        <span class="font-bold">{{ strtoupper(format_name($member->identity?->title_prefix ?? '', $member->name, $member->identity?->title_suffix ?? '')) }}</span><br>
                        Anggota Pelaksana
                    </td>
                    <td>{{ $member->identity?->institution?->name ?? 'ITSNU Pekalongan' }}</td>
                    <td>{{ $member->identity?->studyProgram?->name ?? '-' }}</td>
                    <td>{{ $member->pivot->tasks ?? '-' }}</td>
                    <td class="text-center">{{ $member->identity?->sinta_id ?? '-' }}</td>
                    <td class="text-center">{{ $member->identity?->scopus_h_index ?? '-' }}</td>
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
                    <td>{{ $member->identity?->identity_id ?? '-' }}</td>
                    <td>{{ $member->identity?->studyProgram?->name ?? '-' }}</td>
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

            <strong>Latar Belakang:</strong>
            <div class="text-justify">{!! nl2br(e($proposal->detailable->background_service ?? '')) !!}</div>

            <strong>Metodologi:</strong>
            <div class="text-justify">{!! nl2br(e($proposal->detailable->methodology_service ?? '')) !!}</div>
        </div>
    @elseif($proposal->detailable_type === 'App\Models\Research')
        <div class="text-justify" style="line-height: 1.4;">
            <strong>Latar Belakang:</strong>
            <div>{!! nl2br(e($proposal->detailable->background_research ?? '')) !!}</div>

            <strong style="display: block; margin-top: 10px;">Metodologi:</strong>
            <div>{!! nl2br(e($proposal->detailable->methodology_research ?? '')) !!}</div>
        </div>
    @endif
    
    @endif

    {{-- Asta Cita (Skip if empty) --}}
    @if(isset($proposal->asta_cita) && $proposal->asta_cita)
    <div class="section-title">{{ $sectionNum++ }}. Asta Cita</div>
    <div style="margin-left: 20px; text-align: justify;">{{ $proposal->asta_cita }}</div>
    @endif

    {{-- SDGs (Skip if empty) --}}
    @if(isset($proposal->sdgs) && $proposal->sdgs->count() > 0)
    <div class="section-title">{{ $sectionNum++ }}. Sustainable Development Goals (SDGs)</div>
    <div style="margin-left: 20px; text-align: justify;">
        @foreach($proposal->sdgs as $sdg)
            <div>{{ trim($sdg->name) }} : {{ $sdg->description }}</div>
        @endforeach
    </div>
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
        
        // Add physical approval file if applicable
        if (in_array($proposal_approval_mode, ['upload', 'both']) && $proposal->detailable?->hasMedia('approval_file')) {
            $supportingDocs[] = ['name' => 'Lembar Pengesahan (Tanda Tangan Basah)', 'file' => $proposal->detailable->getFirstMedia('approval_file')];
        }
    @endphp
    @if(count($supportingDocs) > 0)
    <div class="section-title">{{ $sectionNum++ }}. Dokumen Pendukung (Terlampir)</div>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="75%">Nama Data Pendukung</th>
                <th width="20%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supportingDocs as $index => $doc)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $doc['name'] }}</td>
                <td class="text-center">Terlampir</td>
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
                // Find media for THIS specific proposal
                $media = $partner->getMedia('commitment_letter')
                    ->where('custom_properties.proposal_id', $proposal->id)
                    ->first();
                if ($media) {
                    $otherDocs[] = ['name' => 'Surat Pernyataan Kerjasama Mitra - ' . $partner->name, 'file' => $media];
                }
            }
        }
    @endphp
    @if(count($otherDocs) > 0)
    <div class="section-title">{{ $sectionNum++ }}. Dokumen Pendukung Lainnya (Terlampir)</div>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Kategori</th>
                <th width="40%">Nama Mitra</th>
                <th width="20%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($otherDocs as $index => $doc)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>Surat Pernyataan Kerjasama</td>
                <td>{{ str_replace('Surat Pernyataan Kerjasama Mitra - ', '', $doc['name']) }}</td>
                <td class="text-center">Terlampir</td>
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
    <div style="text-align: center; font-weight: bold; font-size: 11.5pt; color: #1a4d2e; margin-bottom: 20px; text-transform: uppercase;">
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
            <td>{{ $proposal->submitter->identity?->identity_id ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">c. Jabatan Fungsional</td>
            <td>{{ $proposal->submitter->identity?->functional_position ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">d. Program Studi</td>
            <td>{{ $proposal->submitter->identity?->studyProgram?->name ?? '-' }}</td>
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
            <td>{{ format_name($member->identity?->title_prefix ?? '', $member->name, $member->identity?->title_suffix ?? '') }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">b. NIDN/ NIDK</td>
            <td>{{ $member->identity?->identity_id ?? '-' }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-left: 20px;">c. Perguruan Tinggi</td>
            <td>{{ $member->identity?->institution?->name ?? 'ITSNU Pekalongan' }}</td>
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
                        <li>{{ $student->name }} ({{ $student->identity?->identity_id ?? '-' }})</li>
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

    <div style="page-break-inside: avoid;">
        <table class="no-border" style="width: 100%; margin-top: 30px;">
            <tr>
                <td width="33%"></td>
                <td width="33%"></td>
                <td width="34%" class="text-center">Pekalongan, {{ date('d F Y') }}</td>
            </tr>
            <tr>
                <td class="text-center" style="vertical-align: top;">
                    Menyetujui,<br>
                    Kepala LPPM ITSNU Pekalongan
                </td>
                <td class="text-center" style="vertical-align: top;">
                    Mengetahui,<br>
                    Dekan Fakultas {{ $proposal->submitter->identity?->faculty?->name ?? '.......................' }}
                </td>
                <td class="text-center" style="vertical-align: top;">
                    <br>
                    Ketua {{ $proposal->detailable_type === 'App\Models\Research' ? 'Peneliti' : 'Pelaksana' }}
                </td>
            </tr>

            <tr>
                <td class="text-center" style="height: 100px; vertical-align: bottom;">
                    @php
                        $lppmSig = $proposal->signatures->where('signed_role', 'kepala_lppm')->where('action', 'finalized')->first();
                    @endphp
                    @if($lppmSig)
                        <div style="margin-bottom: 5px;">
                            <img src="{{ generate_qr_code_data_uri(\Illuminate\Support\Facades\URL::signedRoute('signatures.verify', ['documentSignature' => $lppmSig->id])) }}" width="70">
                        </div>
                        <div style="font-size: 7pt; margin-bottom: 5px;">Disetujui secara digital oleh:<br>{{ $lppm_head_name }}<br>pada {{ $lppmSig->signed_at->format('d-m-Y H:i') }}</div>
                    @else
                        <div style="height: 70px;"></div>
                    @endif
                    <strong><u>{{ $lppm_head_name }}</u></strong><br>
                    NIDN. {{ $lppm_head_id }}
                </td>
                <td class="text-center" style="height: 100px; vertical-align: bottom;">
                    @php
                        $dekanSig = $proposal->signatures->where('signed_role', 'dekan')->where('action', 'approved')->first();
                    @endphp
                    @if($dekanSig)
                        <div style="margin-bottom: 5px;">
                            <img src="{{ generate_qr_code_data_uri(\Illuminate\Support\Facades\URL::signedRoute('signatures.verify', ['documentSignature' => $dekanSig->id])) }}" width="70">
                        </div>
                        <div style="font-size: 7pt; margin-bottom: 5px;">Disetujui secara digital oleh:<br>{{ $dean_name }}<br>pada {{ $dekanSig->signed_at->format('d-m-Y H:i') }}</div>
                    @else
                        <div style="height: 70px;"></div>
                    @endif
                    <strong><u>{{ $dean_name }}</u></strong><br>
                    NIDN. {{ $dean_id }}
                </td>
                <td class="text-center" style="height: 100px; vertical-align: bottom;">
                    @php
                        $lecturerSig = $proposal->signatures->where('signed_role', 'lecturer')->where('action', 'submitted')->first();
                    @endphp
                    @if($lecturerSig)
                        <div style="margin-bottom: 5px;">
                            <img src="{{ generate_qr_code_data_uri(\Illuminate\Support\Facades\URL::signedRoute('signatures.verify', ['documentSignature' => $lecturerSig->id])) }}" width="70">
                        </div>
                        <div style="font-size: 7pt; margin-bottom: 5px;">Diajukan secara digital oleh:<br>{{ $submitterFullName }}<br>pada {{ $lecturerSig->signed_at->format('d-m-Y H:i') }}</div>
                    @else
                        <div style="height: 70px;"></div>
                    @endif
                    <strong><u>{{ $submitterFullName }}</u></strong><br>
                    NIDN. {{ $proposal->submitter->identity?->identity_id ?? '-' }}
                </td>
            </tr>
        </table>
    </div>
    @endif
</body>
</html>
