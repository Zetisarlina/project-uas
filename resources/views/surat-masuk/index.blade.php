<!DOCTYPE html>
<html>
<head>
    <title>Data Surat Masuk</title>
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; padding: 20px; }
        h1 { color: #007bff; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background-color: #007bff; color: #fff; }
    </style>
</head>
<body>
    <h1>Data Surat Masuk</h1>
    <a href="{{ route('surat-masuk.create') }}">+ Tambah Surat Masuk</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratMasuk as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>
                        <a href="{{ route('surat-masuk.edit', $surat->id) }}">Edit</a> |
                        <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>