<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Tanda Tangan (Internal)</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 24px; background: #f6f7fb; color: #111827; }
        .card { max-width: 860px; margin: 0 auto; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 18px 18px; }
        .title { font-size: 18px; font-weight: 700; margin: 0 0 6px 0; }
        .subtitle { margin: 0 0 16px 0; color: #6b7280; font-size: 13px; line-height: 1.5; }
        .grid { display: grid; grid-template-columns: 1fr; gap: 10px; }
        .row { display: flex; justify-content: space-between; gap: 12px; padding: 10px 12px; border: 1px solid #f1f5f9; border-radius: 10px; background: #fafafa; }
        .k { color: #6b7280; font-size: 12px; }
        .v { font-weight: 600; font-size: 13px; text-align: right; word-break: break-all; }
        .badge { display: inline-block; padding: 3px 8px; border-radius: 999px; font-size: 12px; font-weight: 800; }
        .b-valid { background: #dcfce7; color: #166534; }
        .b-invalid { background: #fee2e2; color: #991b1b; }
        .actions { margin-top: 14px; display: flex; gap: 10px; flex-wrap: wrap; }
        .btn { display: inline-block; text-decoration: none; padding: 10px 12px; border-radius: 10px; font-weight: 700; font-size: 13px; border: 1px solid #e5e7eb; color: #111827; background: #ffffff; }
        .muted { margin-top: 12px; font-size: 12px; color: #6b7280; line-height: 1.5; }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="title">Verifikasi Tanda Tangan (Internal)</h1>
        <p class="subtitle">
            Halaman ini memverifikasi integritas tanda tangan internal berbasis QR (bukan TTE tersertifikasi PSrE).
        </p>

        <div class="grid">
            <div class="row">
                <div class="k">Status Verifikasi</div>
                <div class="v"><span class="badge {{ $isValid ? 'b-valid' : 'b-invalid' }}">{{ $isValid ? 'VALID' : 'TIDAK VALID' }}</span></div>
            </div>
            <div class="row">
                <div class="k">Dokumen</div>
                <div class="v">{{ $signature->document_type }} / {{ $signature->document_id }}</div>
            </div>
            <div class="row">
                <div class="k">Versi Dokumen</div>
                <div class="v">{{ $signature->variant ?? '-' }}</div>
            </div>
            <div class="row">
                <div class="k">Aksi</div>
                <div class="v">{{ $signature->action }}</div>
            </div>
            <div class="row">
                <div class="k">Peran</div>
                <div class="v">{{ $signature->signed_role }}</div>
            </div>
            <div class="row">
                <div class="k">Ditandatangani Oleh</div>
                <div class="v">{{ $signature->signed_by ?? '-' }}</div>
            </div>
            <div class="row">
                <div class="k">Waktu Tanda Tangan</div>
                <div class="v">{{ $signature->signed_at?->translatedFormat('d M Y H:i') ?? '-' }}</div>
            </div>
            <div class="row">
                <div class="k">Hash Dokumen (SHA-256)</div>
                <div class="v">{{ $signature->document_hash ?? '-' }}</div>
            </div>
            <div class="row">
                <div class="k">KID</div>
                <div class="v">{{ $signature->kid }}</div>
            </div>
        </div>

        <div class="actions">
            <a class="btn" href="{{ url('/') }}">Beranda</a>
        </div>

        <div class="muted">
            Jika Anda memegang file PDF, cocokkan hash dokumen yang tercantum di sini dengan informasi dokumen yang Anda verifikasi.
        </div>
    </div>
</body>
</html>

