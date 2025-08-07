@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="container-xxl py-5 page-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">Pendaftaran</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">PPDB</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Form Pendaftaran RA -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-5">
            <h2 class="mb-4 text-center">Formulir Pendaftaran RA Ar-Risalah</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Pendaftaran --}}
            <form method="POST" action="{{ route('pendaftaran.store') }}" id="formPendaftaran">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required>
                            <label for="nama_lengkap">Nama Lengkap Anak</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK Anak" required>
                            <label for="nik">NIK Anak</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" required>
                            <label for="tempat_lahir">Tempat Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" required>
                            <label for="alamat">Alamat Lengkap</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Nama Ayah" required>
                            <label for="nama_ayah">Nama Ayah</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Nama Ibu" required>
                            <label for="nama_ibu">Nama Ibu</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="tel" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor HP" required>
                            <label for="no_hp">Nomor HP Orang Tua/Wali</label>
                        </div>
                    </div>
                </div>
                 {{-- Tombol Lanjut AI --}}
                    <div class="col-12 mt-4" id="wrapperLanjutAI" style="display: none;">
                        <button type="button" class="btn btn-warning w-100 py-3" data-bs-toggle="modal" data-bs-target="#modalFormAI">
                            Lanjut Menjawab Pertanyaan AI
                        </button>
                    </div>

                    <!-- Modal AI Popup -->
                    <div class="modal fade" id="modalFormAI" tabindex="-1" aria-labelledby="modalFormAILabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content p-4 position-relative">
                                
                                <div class="d-flex align-items-start mb-4">
                                     
                                    <div class="me-3">
                                        <!-- Maskot AI -->
                                        <div id="aiAvatar" style="width: 100px; height: 100px;">
                                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
                                                <defs>
                                                    <!-- Gradien untuk kepala -->
                                                    <radialGradient id="headGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                                                        <stop offset="0%" style="stop-color:#b2ebf2; stop-opacity:1" />
                                                        <stop offset="100%" style="stop-color:#e0f7fa; stop-opacity:1" />
                                                    </radialGradient>
                                                    <!-- Gradien untuk mata -->
                                                    <radialGradient id="eyeGradient" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
                                                        <stop offset="0%" style="stop-color:#81d4fa; stop-opacity:1" />
                                                        <stop offset="100%" style="stop-color:#0288d1; stop-opacity:1" />
                                                    </radialGradient>
                                                    <!-- Bayangan untuk kepala -->
                                                    <filter id="headShadow" x="-20%" y="-20%" width="140%" height="140%">
                                                        <feGaussianBlur in="SourceAlpha" stdDeviation="3" />
                                                        <feOffset dx="0" dy="3" result="offsetblur" />
                                                        <feFlood flood-color="rgba(0,0,0,0.5)" />
                                                        <feComposite in2="offsetblur" operator="in" />
                                                        <feMerge>
                                                            <feMergeNode />
                                                            <feMergeNode in="SourceGraphic" />
                                                        </feMerge>
                                                    </filter>
                                                    <!-- Bayangan untuk mulut -->
                                                    <filter id="mouthShadow" x="-20%" y="-20%" width="140%" height="140%">
                                                        <feGaussianBlur in="SourceAlpha" stdDeviation="2" />
                                                        <feOffset dx="0" dy="2" result="offsetblur" />
                                                        <feFlood flood-color="rgba(0,0,0,0.5)" />
                                                        <feComposite in2="offsetblur" operator="in" />
                                                        <feMerge>
                                                            <feMergeNode />
                                                            <feMergeNode in="SourceGraphic" />
                                                        </feMerge>
                                                    </filter>
                                                    <!-- Bayangan untuk mata -->
                                                    <filter id="eyeShadow" x="-20%" y="-20%" width="140%" height="140%">
                                                        <feGaussianBlur in="SourceAlpha" stdDeviation="1" />
                                                        <feOffset dx="0" dy="1" result="offsetblur" />
                                                        <feFlood flood-color="rgba(0,0,0,0.5)" />
                                                        <feComposite in2="offsetblur" operator="in" />
                                                        <feMerge>
                                                            <feMergeNode />
                                                            <feMergeNode in="SourceGraphic" />
                                                        </feMerge>
                                                    </filter>
                                                </defs>

                                                <!-- Kepala dengan Bayangan -->
                                                <circle cx="100" cy="100" r="70" fill="url(#headGradient)" stroke="#0288d1" stroke-width="4" class="head" filter="url(#headShadow)" />
                                                <!-- Mata -->
                                                <circle class="ai-eye" cx="75" cy="85" r="10" fill="url(#eyeGradient)" filter="url(#eyeShadow)" />
                                                <circle class="ai-eye" cx="125" cy="85" r="10" fill="url(#eyeGradient)" filter="url(#eyeShadow)" />
                                                <!-- Alis -->
                                                <path d="M70 75 Q75 70 80 75" stroke="#0288d1" stroke-width="3" fill="none" />
                                                <path d="M120 75 Q125 70 130 75" stroke="#0288d1" stroke-width="3" fill="none" />
                                                <!-- Mulut Ceria dengan Bayangan -->
                                                <path id="aiMouth" d="M70 130 Q100 140 130 130" stroke="#0288d1" stroke-width="4" fill="none" class="mouth" filter="url(#mouthShadow)" />
                                            </svg>

                                            <style>
                                                .head {
                                                    animation: head-bob 1s infinite alternate;
                                                }

                                                .ai-eye {
                                                    animation: eye-blink 3s infinite;
                                                }

                                                .mouth {
                                                    animation: mouth-open-close 0.5s infinite alternate;
                                                }

                                                @keyframes head-bob {
                                                    0% { transform: translateY(0); }
                                                    100% { transform: translateY(-5px); }
                                                }

                                                @keyframes eye-blink {
                                                    0%, 100% { r: 10; }
                                                    50% { r: 5; }
                                                }

                                                @keyframes mouth-open-close {
                                                    0% { d: path("M70 130 Q100 140 130 130"); } /* Mulut tertutup */
                                                    25% { d: path("M70 135 Q100 150 130 135"); } /* Mulut terbuka sedikit */
                                                    50% { d: path("M70 140 Q100 160 130 140"); } /* Mulut terbuka lebih lebar */
                                                    75% { d: path("M70 135 Q100 150 130 135"); } /* Mulut terbuka sedikit */
                                                    100% { d: path("M70 130 Q100 140 130 130"); } /* Kembali ke mulut tertutup */
                                                }
                                            </style>

                                        </div>
                                    </div>
                                    <div class="bg-white p-3 rounded shadow position-relative w-100">
                                        <div id="aiTypingText" class="text-dark" style="min-height: 60px; font-size: 16px;"></div>
                                        <div id="inputContainer" class="mt-3"></div>
                                        <div id="btnNextContainer" class="mt-3 text-end" style="display: none;">
                                            <button type="button" class="btn btn-primary" id="btnNextQuestion">Selanjutnya</button>
                                        </div>
                                        <span class="position-absolute top-100 start-0 translate-middle-x mt-1"
                                            style="width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-top: 10px solid white;"></span>
                                    </div>
                                </div>

                                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

                                <form id="aiForm" method="POST" action="{{ route('pendaftaran.store') }}">
                                    @csrf
                                    <input type="hidden" name="pertanyaan_ai_1" id="hiddenAnswer1">
                                    <input type="hidden" name="pertanyaan_ai_2" id="hiddenAnswer2">
                                    <input type="hidden" name="pertanyaan_ai_3" id="hiddenAnswer3">
                                    <input type="hidden" name="pertanyaan_ai_4" id="hiddenAnswer4">
                                    <div class="text-end" id="submitContainer" style="display: none;">
                                        <button type="submit" class="btn btn-success">Kirim Semua Jawaban</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

           
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Data pertanyaan dan animasi
    const questions = [
        {
            text: "Hallo Selamat datang apakah anda ingin lanjut ?",
            type: "yesno"
        },
        {
            text: "Sudah bisa menyebut nama?",
            type: "yesno"
        },
        {
            text: "Sudah bisa berhitung 1–10?",
            type: "yesno"
        },
        {
            text: "Sudah bisa memegang pensil?",
            type: "yesno"
        }
    ];
    
    let currentQuestion = 0;
    const answers = {};
    
    // Animasi maskot
    function animateAvatar(expression) {
        const avatar = document.getElementById('aiAvatar');
        const mouth = document.querySelector('#aiMouth');
        const eyes = document.querySelectorAll('.ai-eye');
        
        if (expression === 'talking') {
            avatar.style.transform = 'translateY(-5px)';
            mouth.setAttribute('d', 'M70 115 Q100 130 130 115');
            eyes.forEach(eye => {
                eye.style.transform = 'scaleY(0.8)';
            });
        } else {
            // Default/neutral
            avatar.style.transform = 'translateY(0)';
            mouth.setAttribute('d', 'M70 115 Q100 115 130 115');
            eyes.forEach(eye => {
                eye.style.transform = 'scaleY(1)';
            });
        }
    }
    
    // Animasi mengetik
 let isTyping = false;

function typeText(text, element, callback) {
    if (isTyping) return; // Cegah animasi dobel
    isTyping = true;

    let i = 0;
    element.textContent = '';
    animateAvatar('talking');

    function typing() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            let delay = 35;

            const char = text.charAt(i);
            if (char === '.' || char === '!' || char === '?') delay = 300;

            i++;
            setTimeout(typing, delay);
        } else {
            animateAvatar('neutral');
            isTyping = false; // Reset state
            if (callback) callback();
        }
    }

    typing();
}

    
    // Tampilkan pertanyaan saat modal dibuka
    const modal = document.getElementById('modalFormAI');
    modal.addEventListener('show.bs.modal', function() {
        currentQuestion = 0;
        showQuestion(currentQuestion);
    });
    
    // Fungsi untuk menampilkan pertanyaan
    function showQuestion(index) {
        const question = questions[index];
        const aiTypingText = document.getElementById('aiTypingText');
        const inputContainer = document.getElementById('inputContainer');
        const btnNext = document.getElementById('btnNextContainer');
        
        // Reset state
        btnNext.style.display = 'none';
        inputContainer.innerHTML = '';
        
        // Animasi maskot dan pertanyaan
        animateAvatar('talking');
        typeText(question.text, aiTypingText, function() {
            // Tampilkan input field untuk jawaban "Ya" atau "Tidak"
            inputContainer.innerHTML = `
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answerYes" value="Ya">
                    <label class="form-check-label" for="answerYes">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" id="answerNo" value="Tidak">
                    <label class="form-check-label" for="answerNo">Tidak</label>
                </div>
            `;
            // Tampilkan tombol selanjutnya
            btnNext.style.display = 'block';
        });
    }
    
    // Handle tombol selanjutnya
    document.getElementById('btnNextQuestion').addEventListener('click', function() {
        const selectedAnswer = document.querySelector('input[name="answer"]:checked');
        if (!selectedAnswer) {
            alert('Silakan pilih jawaban terlebih dahulu');
            return;
        }
        
        // Simpan jawaban
        answers[`pertanyaan_${currentQuestion+1}`] = selectedAnswer.value;
        
        // Set hidden input
        document.getElementById(`hiddenAnswer${currentQuestion+1}`).value = selectedAnswer.value;
        
        // Lanjut ke pertanyaan berikutnya atau selesaikan
        currentQuestion++;
        if (currentQuestion < questions.length) {
            showQuestion(currentQuestion);
        } else {
            // Selesai semua pertanyaan
            const aiTypingText = document.getElementById('aiTypingText');
            typeText("Terima kasih atas jawaban Anda! Klik tombol di bawah untuk mengirim.", aiTypingText, function() {
                document.getElementById('submitContainer').style.display = 'block';
                document.getElementById('btnNextContainer').style.display = 'none';
                document.getElementById('inputContainer').style.display = 'none';
                animateAvatar('neutral');
            });
        }
    });
    
    // Validasi form utama untuk tombol lanjut AI
    const requiredFields = document.querySelectorAll('#formPendaftaran [required]');
    const wrapperLanjutAI = document.getElementById('wrapperLanjutAI');
    
    function checkFormComplete() {
        let isComplete = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) isComplete = false;
        });
        wrapperLanjutAI.style.display = isComplete ? 'block' : 'none';
    }
    
    requiredFields.forEach(field => {
        field.addEventListener('input', checkFormComplete);
        field.addEventListener('change', checkFormComplete);
    });
});
</script>
@endpush
