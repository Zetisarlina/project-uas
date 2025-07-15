@extends('layouts.app')

@section('content')
<div style="padding: 30px;">
    <h2>Dashboard</h2>

    <div style="margin-bottom: 10px; font-weight: bold;">
        Hari ini: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
    </div>

    <div id="jam" style="font-size: 18px; font-weight: bold; margin-bottom: 20px;"></div>

    {{-- BAGIAN TOTAL SURAT --}}
    <div style="display: flex; gap: 30px; margin-left: 50px; margin-bottom: 30px;">
        <div style="width: 180px; height: 120px; background-color: #007bff; color: white; border-radius: 10px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div style="font-size: 32px;">{{ $totalMasuk }}</div>
            <div>Total Surat Masuk</div>
        </div>

        <div style="width: 180px; height: 120px; background-color: #17a2b8; color: white; border-radius: 10px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <div style="font-size: 32px;">{{ $totalKeluar }}</div>
            <div>Total Surat Keluar</div>
        </div>
    </div>

    {{-- BAGIAN KALENDER DAN CARI --}}
    <div style="margin-left: 50px;">
        <div style="margin-bottom: 20px;">
            <label>Kalender Hari Ini:</label><br>
            <input type="date" value="{{ \Carbon\Carbon::now()->toDateString() }}" disabled>
        </div>

        <form action="{{ route('surat-masuk.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Cari surat masuk..." style="padding: 6px; width: 250px;">
            <button type="submit" style="padding: 6px 12px;">Cari</button>
        </form>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('jam').innerText = 'Jam: ' + jam + ':' + menit + ':' + detik;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection