<!DOCTYPE html>
<html>
<head>
    <title>Tambah Surat Masuk</title>
</head>
<body>

<h2>Tambah Surat Masuk</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('surat-masuk.store') }}">
    @csrf

    <label>Nomor Surat</label><br>
    <input type="text" name="nomor_surat"><br><br>

    <label>Tanggal Surat</label><br>
    <input type="date" name="tanggal_surat"><br><br>

    <label>Pengirim</label><br>
    <input type="text" name="pengirim"><br><br>

    <label>Perihal</label><br>
    <input type="text" name="perihal"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>