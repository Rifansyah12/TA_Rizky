<!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-success navbar-dark sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-primary">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo" style="width: 100px; height: 100px;" class="me-3">RA Ar-risalah</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-item nav-link active">Beranda</a>
                    <a href="{{ route('profil') }}" class="nav-item nav-link">Profil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.html" class="dropdown-item">Pendaftaran</a>
                            <a href="team.html" class="dropdown-item">Kegiatan</a>
                            <a href="call-to-action.html" class="dropdown-item">Agenda</a>
                        </div>
                    </div>
                    <a href="{{ route('prestasi') }}" class="nav-item nav-link">Prestasi</a>
                    <a href="{{ route('ekstrakulikuler') }}" class="nav-item nav-link">Ekstrakulikuler</a>
                
                    </div>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary rounded-pill px-3 my-2">
                        PPDB Online<i class="fa fa-arrow-right ms-3"></i>
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-light rounded-pill px-3 me-2 my-2">
                            <i class="fa fa-sign-in-alt me-2"></i>Login
                    </a>
            </div>
        </nav>