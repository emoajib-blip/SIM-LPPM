<table>
    <thead>
    <tr>
        <th colspan="10" style="text-align: center; font-weight: bold; font-size: 16px;">
            INSTITUT TEKNOLOGI DAN SAINS NAHDLATUL ULAMA PEKALONGAN
        </th>
    </tr>
    <tr>
        <th colspan="10" style="text-align: center; font-weight: bold; font-size: 14px;">
            LEMBAGA PENELITIAN DAN PENGABDIAN KEPADA MASYARAKAT (LPPM)
        </th>
    </tr>
    <tr>
        <th colspan="10" style="text-align: center; font-weight: bold; font-size: 12px;">
            LAPORAN KERJASAMA MITRA {{ $periodFilter ? "PERIODE TAHUN $periodFilter" : "SEMUA PERIODE" }}
        </th>
    </tr>
    <tr><th colspan="10"></th></tr>
    <tr>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 50px;">No</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 200px;">Nama Mitra</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 250px;">Institusi</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 120px;">Jenis Mitra</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 200px;">Kontak Email</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 100px;">Total Usulan</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 100px;">Disetujui</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 150px;">Dana Disetujui (Rp)</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 120px;">Dok MOU/PKS</th>
        <th style="font-weight: bold; border: 2px solid #000000; background-color: #e2e8f0; text-align: center; width: 120px;">Surat Kesediaan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($partners as $index => $partner)
        <tr>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $index + 1 }}</td>
            <td style="border: 1px solid #000000; font-weight: bold; vertical-align: top;">{{ $partner->name }}</td>
            <td style="border: 1px solid #000000; vertical-align: top;">{{ $partner->institution }}</td>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $partner->type }}</td>
            <td style="border: 1px solid #000000; vertical-align: top;">{{ $partner->email }}</td>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $partner->proposals_count }}</td>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $partner->approved_count }}</td>
            <td style="border: 1px solid #000000; text-align: right; vertical-align: top;">{{ $partner->total_budget }}</td>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $partner->hasMedia('mou_pks') ? 'Tersedia' : '-' }}</td>
            <td style="border: 1px solid #000000; text-align: center; vertical-align: top;">{{ $partner->hasMedia('commitment_letter') ? 'Tersedia' : '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
