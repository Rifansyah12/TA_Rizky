<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Kontak -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Kontak Kami</h3>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Contoh No.123, Bandung, Indonesia</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@raarrisalah.sch.id</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Tautan Cepat -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Tautan Cepat</h3>
                <a class="btn btn-link text-white-50" href="#">Profil</a>
                <div class="dropdown">
                    <a class="btn btn-link text-white-50 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Berita
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pendaftaran.html">Pendaftaran</a></li>
                        <li><a class="dropdown-item" href="kegiatan.html">Kegiatan</a></li>
                        <li><a class="dropdown-item" href="agenda.html">Agenda</a></li>
                    </ul>
                </div>
                <a class="btn btn-link text-white-50" href="#">Prestasi</a>
                <a class="btn btn-link text-white-50" href="#">Ekstrakurikuler</a>
            </div>

            <!-- Galeri Foto -->
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Galeri Foto</h3>
                <div class="row g-2 pt-2">
                    @forelse($galeris as $galeri)
                        <div class="col-4">
                            <img class="img-fluid rounded bg-light p-1" src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}">
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-white">Belum ada foto di galeri.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Hak Cipta -->
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">RA Ar-Risalah</a>, Hak Cipta Dilindungi.
                    Dirancang oleh <a class="border-bottom" href="https://htmlcodex.com"></a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="#">Beranda</a>
                        <a href="#">Kebijakan Cookie</a>
                        <a href="#">Bantuan</a>
                        <a href="#">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Tombol Kembali ke Atas -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
