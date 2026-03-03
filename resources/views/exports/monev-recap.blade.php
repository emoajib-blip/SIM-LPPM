<table>
    <thead>
        <tr>
            <th colspan="9" style="text-align: center; font-size: 14pt; font-weight: bold;">
                REKAPITULASI MONITORING DAN EVALUASI (MONEV) TAHUN AKADEMIK {{ $academicYear }}
                {{ $semester ? strtoupper($semester) : '' }}
            </th>
        </tr>
        <tr></tr>
        <tr>
            <th style="font-weight: bold; border: 1px solid black;">No</th>
            <th style="font-weight: bold; border: 1px solid black;">Nama Dosen</th>
            <th style="font-weight: bold; border: 1px solid black;">Fakultas / Prodi</th>
            <th style="font-weight: bold; border: 1px solid black;">Judul Proposal</th>
            <th style="font-weight: bold; border: 1px solid black;">Jenis</th>
            <th style="font-weight: bold; border: 1px solid black;">Skor Monev</th>
            <th style="font-weight: bold; border: 1px solid black;">Status Akhir</th>
            <th style="font-weight: bold; border: 1px solid black;">Reviewer</th>
            <th style="font-weight: bold; border: 1px solid black;">Catatan Reviewer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proposals as $index => $proposal)
            @php
                $latestReview = $proposal->monevReviews->first();
                $identity = $proposal->submitter->identity;
            @endphp
            <tr>
                <td style="border: 1px solid black;">{{ $index + 1 }}</td>
                <td style="border: 1px solid black;">{{ $proposal->submitter->name }}</td>
                <td style="border: 1px solid black;">
                    {{ $identity?->faculty?->name }} / {{ $identity?->studyProgram?->name }}
                </td>
                <td style="border: 1px solid black;">{{ $proposal->title }}</td>
                <td style="border: 1px solid black;">
                    {{ $proposal->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian' }}
                </td>
                <td style="border: 1px solid black;">{{ $latestReview?->score ?? '-' }}</td>
                <td style="border: 1px solid black;">
                    {{ $latestReview ? str_replace('_', ' ', strtoupper($latestReview->status)) : 'PENDING' }}
                </td>
                <td style="border: 1px solid black;">{{ $latestReview?->reviewer?->name ?? '-' }}</td>
                <td style="border: 1px solid black;">{{ $latestReview?->notes ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>