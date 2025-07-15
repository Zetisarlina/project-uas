<!DOCTYPE html>
<html>
<head>
    <title>Cetak Surat Keluar</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
    </style>
</head>
<body>
    <h3>Data Surat Keluar</h3>
    <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Tanggal:</strong> {{ $surat->tanggal_surat }}</p>
    <p><strong>Tujuan:</strong> {{ $surat->tujuan }}</p>
    <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
</body>
</html>