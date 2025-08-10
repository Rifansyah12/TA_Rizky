<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Hubungi Kami</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>jl.Terusan Logam no11 Bandung</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>022-88880845</p>
                        <p class="mb-2">
                            <i class="fab fa-whatsapp me-2"></i>
                            <a href="https://wa.me/6281320047252">
                                0813-2004-7252 (Hubungi via WhatsApp)
                            </a>
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://instagram.com/arrisalah_islamic_shcool"><i class="fab fa-instagram"></i></a>
                            <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a> -->
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/results?search_query=arrisalah+Islamic+school"><i class="fab fa-youtube"></i></a>
                            <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Quick Links</h3>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
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
        </div>
        <!-- Footer End -->

<!-- Tombol Kembali ke Atas -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
