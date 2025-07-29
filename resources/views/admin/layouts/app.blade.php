<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>

        body {
            overflow-x: hidden;
        }
        footer {
            border-top: 1px solid #dee2e6;
            margin-top: 2rem;
            padding-top: 1rem;
            text-align: center;
            color: #6c757d;
        }

      
        .nav-link:hover {
            background-color: #6c757d; /* Bootstrap Primary */
            color: #fff !important;
        }

        .nav-link.active {
            background-color: #6c757d;
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        @include('admin.layouts.sidebar')

        <div class="flex-grow-1 d-flex flex-column" style="min-height: 100vh;">

            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Admin Panel</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span class="nav-link">Halo, {{ Auth::user()-> name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <main class="flex-grow-1 p-4 py-5" style="background-color: #f8f9fa;">
            @yield('content')
        </main>

            {{-- Footer --}}
            <footer>
                &copy; {{ date('Y') }} Admin.
            </footer>
        </div>
    </div>

    <!-- Bootstrap 5 Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Hapus yang tidak perlu -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
