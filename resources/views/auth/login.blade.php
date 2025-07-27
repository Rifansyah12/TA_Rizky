<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RA Arisalah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('/img/kegiatan34.jpeg'); /* arahkan ke public/img/kegiatan34.jpeg */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.10); /* Lebih transparan */
            backdrop-filter: blur(1px); /* Blur di belakangnya */
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .full-height {
            min-height: 100vh;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.5); /* transparan */
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #000;
            backdrop-filter: blur(5px);
            box-shadow: none;
        }
        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5); /* Placeholder tetap terlihat */
        }

    </style>
</head>
<body style="background-image: url('{{ asset('img/kegiatan/kegiatan34.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; margin: 0;">
    <div class="container full-height d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow" style="
                    background-color: rgba(255, 255, 255, 0.10);
                    border: 1px solid #00ff88;
                    box-shadow: 0 0 15px #00ff88;
                    backdrop-filter: blur(8px);
                     border-radius: 16px; /* tambahkan ini */
                    ">
                <div class="card-header text-white text-center" style="background-color: rgba(25, 135, 84, 0.7); border-bottom: 1px solid rgba(255, 255, 255, 0.2);">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" style="width: 80px; height: 80px; margin-bottom: 10px;">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
