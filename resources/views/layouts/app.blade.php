<!DOCTYPE html>
<html>
<head>
    <title>e-Arsip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #0d6efd;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #0b5ed7;
            padding-left: 10px;
        }
        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .card-circle {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            background-color: #0d6efd;
            color: white;
            font-size: 24px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>e-Arsip</h4>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
    <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button class="btn btn-danger btn-sm w-100">Logout</button>
    </form>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>