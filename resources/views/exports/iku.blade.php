<table>
    <thead>
        <tr>
            <th colspan="5" style="font-weight: bold; font-size: 14pt; text-align: center;">
                LAPORAN REKAPITULASI CAPAIAN IKU (KEPMEN 358/M/KEP/2025)
            </th>
        </tr>
        <tr>
            <th colspan="5" style="font-weight: bold; font-size: 12pt; text-align: center;">
                {{ strtoupper($institution->name ?? 'ITSNU PEKALONGAN') }} - TAHUN {{ $period }}
            </th>
        </tr>
        <tr></tr>
        <tr>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">KODE
            </th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">
                INDIKATOR KINERJA UTAMA</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">TARGET
            </th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">
                CAPAIAN</th>
            <th style="font-weight: bold; border: 1px solid #000; text-align: center; background-color: #f2f2f2;">STATUS
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($ikuMetrics as $metric)
            <tr>
                <td style="border: 1px solid #000; text-align: center;">{{ $metric['code'] }}</td>
                <td style="border: 1px solid #000;">{{ $metric['name'] }}</td>
                <td style="border: 1px solid #000; text-align: center;">{{ number_format($metric['target'], 1) }}%</td>
                <td style="border: 1px solid #000; text-align: center;">{{ number_format($metric['achievement'], 1) }}%</td>
                <td style="border: 1px solid #000; text-align: center;">
                    @if($metric['achievement'] >= $metric['target'])
                        Tercapai
                    @else
                        Belum Tercapai
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>