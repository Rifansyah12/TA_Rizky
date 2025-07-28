@extends('layouts.app')
@section('title','Profil')


@section('content')

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

.page-header {
    position: relative;
    background-image: url("{{ asset('img/kegiatan/kegiatan.jpeg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: 1;
}

.page-header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(128, 128, 128, 0.5); /* Abu-abu dengan transparansi */
    z-index: 2;
}

.page-header .container {
    position: relative;
    z-index: 3; /* Pastikan kontennya tampil di atas layer abu-abu */
}


</style>

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Profile</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Biografi RA Ar-Risalah Start -->
<!-- Biografi RA Ar-Risalah Start -->
<div class="container-xxl py-5">
    <div class="container">
        <!-- Biografi -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-3">Biografi RA Ar-Risalah</h1>
            <p style="text-align: justify;">
                RA Ar-Risalah merupakan lembaga pendidikan anak usia dini yang berfokus pada pembentukan karakter islami, penanaman akhlak mulia, serta pengembangan potensi anak secara holistik. Berdiri dengan semangat dakwah dan kepedulian terhadap pendidikan generasi muda, RA Ar-Risalah berkomitmen untuk menciptakan lingkungan belajar yang menyenangkan, aman, dan bernuansa islami.
                <br><br>
                Dalam kesehariannya, RA Ar-Risalah mengintegrasikan nilai-nilai agama Islam dalam setiap kegiatan pembelajaran. Anak-anak tidak hanya diajarkan baca tulis dan berhitung, tetapi juga diajak untuk mengenal Allah SWT, Rasulullah SAW, serta menerapkan adab dan akhlak dalam kehidupan sehari-hari.
                <br><br>
                Didukung oleh tenaga pendidik yang profesional, berpengalaman, dan penuh kasih sayang, RA Ar-Risalah terus berupaya memberikan pendidikan terbaik bagi anak-anak usia dini. Dengan fasilitas yang memadai dan program pembelajaran yang terstruktur, RA Ar-Risalah menjadi salah satu pilihan utama orang tua dalam menanamkan fondasi pendidikan sejak dini.
            </p>
        </div>

        <!-- visi misi tujuan -->
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-3">Visi</h1>
            <p style="text-align: justify;">
        “Mendidik dengan hati untuk menjadi insan cendekia, ceria dan bertaqwa”    
        </p>
        </div>
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="mb-3">Misi</h1>
            <p style="text-align: justify;">
            1.  Pembiasaan perilaku yang positif (Akhlakul KArimah penanaman kemandirain, pembinaan dan ketaqwaan serta memiliki keterampilan hidup (Life Skill), sesuai dengan tuntunan Rasulullah SAW dengan menanamkan akidah dan kebiasaan beribadah yang baik dan benar.
            <br>2.	Anak dilibatkan secara aktif baik fisik maupun mental agar anak mendapatkan berbagai macam pengalaman belajar dengan melihaat, mendengarkan secara langusng (Learning by doing) 
            <br>3.	Mengembangkan pola piker yang kreatif, inovatif dan integratif.
            <br>4.	Mencipatkan pembelajaran yang dapat merangsang pengembangan seluruh aspek kecerdasan meliputi : nilai agama dan moral, social emosi pengembangan kognitif, Bahasa, fisik dan seni.
            <br>5.	Pengembangan Bahasa agar anak mampu berkomunikasi secara aktif dan positif terhadap lingkungan dan mengarahkan pada pencapaian, kecerdasan linguistik.
           <br>6.	Perkembangan motoric halus dan motoric kasar untuk pertumbuhan kesahatan anak yang mengarahkan pada pencapaian kecenian (Body Kinestetik)
            <br>7.	Membantu anak memiliki wawasan global melalui pengenelan bahas internasional dan teknologi informasi
            <br>8.	Menjadikan anak memiliki kesiapan yang baik dalam menghadapi jenjang Pendidikan berikutnya (SD/MI) 
        </p>
        </div>

        <!-- Staf Pengurus -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h2 class="mb-4">Staf Pengurus</h2>
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item"><strong>Kepala RA:</strong> Ibu Nur Aisyah, S.Pd.I</li>
                <li class="list-group-item"><strong>Wakil Kepala:</strong> Ibu Rina Marlina, S.Pd</li>
                <li class="list-group-item"><strong>Bendahara:</strong> Ibu Siti Aminah</li>
                <li class="list-group-item"><strong>Sekretaris:</strong> Ibu Nia Kartika</li>
                <li class="list-group-item"><strong>Guru Kelas A:</strong> Ibu Fitriani, S.Pd</li>
                <li class="list-group-item"><strong>Guru Kelas B:</strong> Ibu Dewi Lestari, S.Pd</li>
                <li class="list-group-item"><strong>Petugas Kebersihan:</strong> Ibu Murni</li>
                <li class="list-group-item"><strong>Penjaga Sekolah:</strong> Bapak Slamet</li>
            </ul>
        </div>

        <!-- Struktur Organisasi -->
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.3s" style="max-width: 900px;">
            <h2 class="mb-4">Struktur Organisasi RA Ar-Risalah</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-start">
                    <thead class="table-primary">
                        <tr>
                            <th>Jabatan</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kepala RA</td>
                            <td>Ibu Nur Aisyah, S.Pd.I</td>
                        </tr>
                        <tr>
                            <td>Wakil Kepala</td>
                            <td>Ibu Rina Marlina, S.Pd</td>
                        </tr>
                        <tr>
                            <td>Sekretaris</td>
                            <td>Ibu Nia Kartika</td>
                        </tr>
                        <tr>
                            <td>Bendahara</td>
                            <td>Ibu Siti Aminah</td>
                        </tr>
                        <tr>
                            <td>Koordinator Kurikulum</td>
                            <td>Ibu Fitriani, S.Pd</td>
                        </tr>
                        <tr>
                            <td>Koordinator Kesiswaan</td>
                            <td>Ibu Dewi Lestari, S.Pd</td>
                        </tr>
                        <tr>
                            <td>Koordinator Sarana & Prasarana</td>
                            <td>Bapak Slamet</td>
                        </tr>
                        <tr>
                            <td>Petugas Kebersihan</td>
                            <td>Ibu Murni</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- guru -->
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


    </div>
</div>
<!-- Biografi RA Ar-Risalah End -->


@endsection