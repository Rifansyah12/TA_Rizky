<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ra Ar-risalah</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/kegiatan/Logo.png') }}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<!-- Tambahkan CSS ini di bagian <style> atau file CSS -->
<style>
    .team-img {
        width: 100%;
        height: 500px; /* Ukuran tinggi tetap, bisa disesuaikan */
        overflow: hidden;
        border-radius: 8px; /* opsional */
    }

    .team-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

.team-text.small-text {
    font-size: 1rem; /* sebelumnya 0.85rem */
}

.team-text.small-text h3 {
    font-size: 1.25rem; /* sebelumnya 1rem */
    margin-bottom: 6px;
}

.team-text.small-text p {
    font-size: 1.1rem; /* sebelumnya 1rem */
    margin-bottom: 6px;
}

.team-text.small-text .btn {
    width: 36px; /* sebelumnya 30px */
    height: 36px;
    font-size: 0.9rem; /* sebelumnya 0.75rem */
    padding: 0;
}

</style>
<body>
    <div class="container-xxl bg-success p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


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
                    <a href="index.html" class="nav-item nav-link active">Beranda</a>
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
        <!-- Navbar End -->


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <!-- Carousel Slide 1 -->
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/kegiatan/kegiatan.jpeg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Selamat Datang di RA Ar-Risalah</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Tempat pendidikan anak usia dini yang menyenangkan, islami, dan penuh kasih sayang.</p>
                                    <a href="#tentang" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Tentang Kami</a>
                                    <a href="#kelas" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Lihat Kegiatan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Slide 2 -->
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/kegiatan/kegiatan_(40).jpeg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Membentuk Generasi Cerdas dan Berakhlak Mulia</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Kami berkomitmen memberikan pendidikan terbaik yang menyentuh hati dan membangun karakter anak sejak dini.</p>
                                    <a href="#program" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Program Unggulan</a>
                                    <a href="#daftar" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Facilities Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Fasilitas</h1>
                    <p style="color: white;">RA kami dilengkapi dengan berbagai fasilitas penunjang pembelajaran anak usia dini, seperti ruang kelas yang nyaman, taman bermain edukatif, perpustakaan mini, alat peraga pembelajaran, 
                    serta lingkungan yang bersih dan aman untuk mendukung tumbuh 
                    kembang anak secara optimal.</p>
                </div>
               <div class="row g-4">
                <!-- Ekstrakurikuler -->
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="facility-item">
                            <div class="facility-icon bg-primary">
                                <span class="bg-primary"></span>
                                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                                <span class="bg-primary"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3">Ekstrakurikuler</h3>
                                <p class="mb-0">Tersedia berbagai kegiatan ekstrakurikuler yang mendukung minat dan bakat anak sejak usia dini.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Taman Bermain -->
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="facility-item">
                            <div class="facility-icon bg-success">
                                <span class="bg-success"></span>
                                <i class="fa fa-futbol fa-3x text-success"></i>
                                <span class="bg-success"></span>
                            </div>
                            <div class="facility-text bg-success">
                                <h3 class="text-success mb-3">Taman Bermain</h3>
                                <p class="mb-0">Area bermain edukatif yang dirancang untuk mengembangkan kemampuan fisik dan sosial anak.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ruang Guru -->
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="facility-item">
                            <div class="facility-icon bg-warning">
                                <span class="bg-warning"></span>
                                <i class="fa fa-user-tie fa-3x text-warning"></i>
                                <span class="bg-warning"></span>
                            </div>
                            <div class="facility-text bg-warning">
                                <h3 class="text-warning mb-3">Ruang Guru</h3>
                                <p class="mb-0">Tempat guru beristirahat dan mempersiapkan kegiatan belajar mengajar secara optimal.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ruang Kelas -->
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="facility-item">
                            <div class="facility-icon bg-info">
                                <span class="bg-info"></span>
                                <i class="fa fa-chalkboard fa-3x text-info"></i>
                                <span class="bg-info"></span>
                            </div>
                            <div class="facility-text bg-info">
                                <h3 class="text-info mb-3">Ruang Kelas</h3>
                                <p class="mb-0">Ruang kelas yang nyaman dan dilengkapi fasilitas belajar untuk menunjang kegiatan anak.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Facilities End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Kenali Lebih Dekat RA Ar-Risalah</h1>
                        <p style="color: white;">RA Ar-Risalah hadir sebagai lembaga pendidikan anak usia dini yang mengutamakan pendidikan karakter, nilai-nilai keislaman, serta pengembangan potensi anak secara menyeluruh.</p>
                        <p class="mb-4" style="color: white;">Dengan lingkungan yang aman dan nyaman, serta guru yang profesional dan penuh kasih sayang, kami membantu anak tumbuh menjadi pribadi yang cerdas, mandiri, dan berakhlak mulia.</p>
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-6">
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="#tentang">Selengkapnya</a>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">Kepala RA</h6>
                                        <small style="color: white;">Ibu Neng, S.Pd</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/kegiatan/kegiatan_(25).jpeg" alt="Anak-anak RA">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/kegiatan/kegiatan_(33).jpeg" alt="Kegiatan Belajar">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/kegiatan/kegiatan_(29).jpeg" alt="Taman Bermain">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- About End -->


        <!-- Call To Action Start -->
        <!-- <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/call-to-action.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Become A Teacher</h1>
                                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.
                                    Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                                </p>
                                <a class="btn btn-primary py-3 px-5" href="">Get Started Now<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Call To Action End -->


        <!-- Classes Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Kelas di RA Ar-Risalah</h1>
                    <p style="color: white;">RA Ar-Risalah menyediakan berbagai kelas yang dirancang untuk mengembangkan potensi anak sejak dini, melalui pendekatan pembelajaran yang menyenangkan, islami, dan penuh kasih sayang.</p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="img/classes-4.jpg" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href="">Language & Speaking</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                        <div class="ms-3">
                                            <h6 class="text-primary mb-1">Jhon Doe</h6>
                                            <small>Teacher</small>
                                        </div>
                                    </div>
                                    <span class="bg-primary text-white rounded-pill py-2 px-3" href="">$99</span>
                                </div>
                                <div class="row g-1">
                                    <div class="col-4">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age:</h6>
                                            <small>3-5 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Time:</h6>
                                            <small>9-10 AM</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Capacity:</h6>
                                            <small>30 Kids</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="img/classes-5.jpg" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href="">Religion & History</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                        <div class="ms-3">
                                            <h6 class="text-primary mb-1">Jhon Doe</h6>
                                            <small>Teacher</small>
                                        </div>
                                    </div>
                                    <span class="bg-primary text-white rounded-pill py-2 px-3" href="">$99</span>
                                </div>
                                <div class="row g-1">
                                    <div class="col-4">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age:</h6>
                                            <small>3-5 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Time:</h6>
                                            <small>9-10 AM</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Capacity:</h6>
                                            <small>30 Kids</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="img/classes-6.jpg" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href="">General Knowledge</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 45px; height: 45px;">
                                        <div class="ms-3">
                                            <h6 class="text-primary mb-1">Jhon Doe</h6>
                                            <small>Teacher</small>
                                        </div>
                                    </div>
                                    <span class="bg-primary text-white rounded-pill py-2 px-3" href="">$99</span>
                                </div>
                                <div class="row g-1">
                                    <div class="col-4">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age:</h6>
                                            <small>3-5 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Time:</h6>
                                            <small>9-10 AM</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Capacity:</h6>
                                            <small>30 Kids</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Classes End -->
                <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Guru & Tenaga Kependidikan</h1>
                    <p style="color: white;">RA Ar-Risalah memiliki tenaga pendidik dan kependidikan yang berdedikasi tinggi dalam membimbing, mendidik, dan menciptakan lingkungan belajar yang aman, nyaman, serta menyenangkan bagi anak-anak usia dini.</p>
                </div>
                <div class="row g-4">
                    @foreach($dataGuru as $guru)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                        <div class="team-item position-relative">
                            <div class="team-img">
                                <img src="{{ asset('uploads/foto_guru/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                            </div>
                            <div class="team-text small-text">
                                <h3>{{ $guru->nama }}</h3>
                                <p>{{ $guru->mapel }}</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->



        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Get In Touch</h3>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
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
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>