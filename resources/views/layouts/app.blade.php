<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS (optional) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: row;
        }
        .sidebar {
            background-color: #252627;
            color: white;
            min-width: 250px;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #252627;
            border-radius: 5px;
        }
        .sidebar h3 {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f1f1f1;
        }
        .navbar {
            background-color: #252627;
            color: white;
        }
        .navbar-brand {
            color: white !important;
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="d-flex align-items-center mb-4">
                <h3 class="ms-1 mb-0">Admin Dashboard</h3>
            </div>
            <a href="#"><i class="bi bi-house-door"></i> Dashboard</a>
            <a href="{{ route('dosens.index') }}"><i class="bi bi-person"></i> Dosen Management</a>
            <a href="#"><i class="bi bi-bar-chart"></i> Reports</a>
            <a href="#"><i class="bi bi-gear"></i> Settings</a>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/pp.png.png') }}" alt="Logo"> Universitil Juandil
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-bell"></i> Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Dynamic Content -->
            <main>
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-end mb-3">
                        <!-- Print Button -->
                        <a href="#" class="btn btn-outline-secondary me-2" onclick="window.print()">
                            <i class="bi bi-printer"></i>
                        </a>

                        <a href="{{ route('download.pdf') }}" class="btn btn-outline-danger me-2">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </a>
                        <a href="{{ route('dosens.export-excel') }}" class="btn btn-outline-success">
                            <i class="bi bi-file-earmark-excel"></i>
                        </a>
                    </div>

                    <!-- Main Content Section -->
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
