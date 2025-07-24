@extends('layouts.app')
@section('title','Profil')


@section('content')

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
    </div>
</div>
<!-- Biografi RA Ar-Risalah End -->


@endsection