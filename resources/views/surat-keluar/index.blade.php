@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Surat Keluar</h2>

    <form method="GET" action="{{ route('surat-keluar.index') }}">
        <input type="text" name="search" placeholder="Cari surat..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <a href="{{ route('surat-keluar.create') }}">+ Tambah Surat Keluar</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratKeluar as $i => $surat)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->tanggal_surat }}</td>
                <td>{{ $surat->tujuan }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>
                    <a href="{{ route('surat-keluar.edit', $surat->id) }}">Edit</a> |
                    <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form> |
                    <a href="{{ route('surat-keluar.cetak', $surat->id) }}" target="_blank">Cetak</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $suratKeluar->links() }}
</div>
@endsection