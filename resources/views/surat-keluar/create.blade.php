@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Surat Keluar</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat-keluar.store') }}" method="POST">
        @csrf
        <label>Nomor Surat:</label>
        <input type="text" name="nomor_surat" required><br><br>

        <label>Tanggal Surat:</label>
        <input type="date" name="tanggal_surat" required><br><br>

        <label>Tujuan:</label>
        <input type="text" name="tujuan" required><br><br>

        <label>Perihal:</label>
        <input type="text" name="perihal" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection