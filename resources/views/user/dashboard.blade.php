<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - e-Arsip</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f4f8; padding: 20px; }
        .navbar { background-color: #007bff; padding: 10px; color: #fff; display: flex; justify-content: space-between; }
        .menu a { color: #fff; margin-right: 15px; text-decoration: none; }
        .content { margin-top: 30px; }
        .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="menu">
            <a href="/dashboard">Dashboard</a>
            <a href="/surat-masuk">Surat Masuk</a>
            <a href="/surat-keluar">Surat Keluar</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none; color: #fff; border: none;">Logout</button>
        </form>
    </div>

    <div class="content">
        <div class="card">
            <h2>Halo Admin, selamat datang di Dashboard</h2>
            <p>Total Surat Masuk: <strong>{{ $totalMasuk ?? '0' }}</strong></p>
            <p>Total Surat Keluar: <strong>{{ $totalKeluar ?? '0' }}</strong></p>
        </div>
    </div>

</body>
</html>