<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- <link href="./css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/esschool.css">

    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css">

    <link rel="shortcut icon" type="image/jpg" href="/favicon.png" />

    <title>esschool.id</title>
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog es-modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="registration" action="proses.php">
                                <h5>Ayo bergabung dan jadilah juara!</h5>
                                <!-- <p>
                  Sudah Punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#login" style="color: #DE0075;">Masuk</a>
                </p> -->
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Lengkap Kamu" aria-describedby="basic-addon3" required>
                                </div>
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email Kamu" aria-describedby="basic-addon3" required>
                                </div>
                                <label for="phone" class="form-label">Nomor Handphone</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan Nomor Handphone Kamu" aria-describedby="basic-addon3" pattern="[0-9]{9,}" required title="Min 9 Character (Number)">
                                </div>
                                <label for="school" class="form-label">Asal Sekolah</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="school" id="school" placeholder="Masukan Asal Sekolah Kamu" aria-describedby="basic-addon3" required>
                                </div>
                                <label for="class" class="form-label">Kelas</label>
                                <div class="input-group mb-3">
                                    <select name="class" id="class" class="form-control" required>
                                        <option selected disabled hidden value="">Pilih Kelas</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <select name="major" id="major" class="form-control" required>
                                        <option selected disabled hidden value="">Pilih Jurusan</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                        <option value="Bahasa">Bahasa</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <label for="package" class="form-label">Pilih Paket</label>
                                <div class="input-group mb-3">
                                    <select name="package" id="package" class="form-control" required>
                                        <option selected disabled hidden value="">Pilih Paket</option>
                                        <option value="Esstream">Esstream</option>
                                        <option value="Esspecial">Esspecial</option>
                                        <option value="Essclusive">Essclusive</option>
                                        <option value="Essolitary ">Essolitary</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">

                                        Dengan membuat akun esschool.id, anda telah menyetujui Syarat
                                        dan Ketentuan yang berlaku
                                    </label>
                                </div>
                                <div class="submit-btn">
                                    <button form="registration" type="submit" class="btn btn-primary es-submit">Daftar
                                        Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog es-modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>
                            <h5>Selamat datang kembali</h5>
                            <p>
                                Belum Punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#register" style="color: #DE0075;">Daftar</a>
                            </p>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Email/Nomor Handphone" aria-describedby="basic-addon3">
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Password" aria-describedby="basic-addon3">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Biarkan saya tetap masuk
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="justify-content: center !important; ">
                        <button type="button" class="btn btn-primary" style="background-color: #FFD350 !important; color: black;border-radius: 10px">Masuk</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="konsultasiModal" tabindex="-1" role="dialog" aria-labelledby="konsultasiModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered es-modal es-feature-modal" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container">
                            <div class="es-card-img d-flex flex-column">
                                <img class="mx-auto" src="img/konsultasi.png" alt="">
                                <h3>Konsultasi</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto neque tempora, ullam, voluptates fugit voluptatibus sunt delectus obcaecati et voluptas repellendus ipsum recusandae voluptatum asperiores, aliquid quam? Dolorum,
                                    delectus iusto.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar es-navbar navbar-expand-md navbar-light">
            <div class="container">
                <a href="" class="navbar-brand es-logo">
                    <img src="img/esschool.png" width="200px" height="auto">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/welcome">Paket Belajar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#program">Program</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#testimoni">Testimoni</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#feature">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#artikel">Artikel</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#karir">Karir</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <button type="button" class="nav-link btn es-btn es-btn-primary btn-primary" data-bs-toggle="modal" data-bs-target="#register">
                                Gabung
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Banner Gabung Sekarang -->

    <div class="es-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5 pb-5 d-flex align-items-center">
                    <div class="d-flex flex-column es-banner-text">
                        <h1>Belajar Bareng <span style="font-weight: bold">esschool.id</span></h1>
                        <p>Partner belajar serumu yang menyesuaikan gaya belajar dan karaktermu.</p>
                        <div>
                            <button type="button" class="btn es-btn btn-md es-btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#register">
                                <span>Gabung Sekarang</span>
                                <img src="img/icon-navigation-arrow_forward_24px.svg" alt="">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="es-banner-img">
                        <img src="img/output-onlinepngtools.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kenapa Pilih esschool -->

    <div class="es-reason" id="reason">
        <div class="container">
            <h1 class="es-text-danger pb-5">Kenapa memilih esschool.id?</h1>
            <div class="row pt-5 pb-5 bg-1">
                <div class="col-md-4 z-1">
                    <div class="es-banner-img">
                        <img src="img/reason-1.png" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Gaya Belajar Sesuai Karaktermu</h3>
                    <p>Esscarrior, kamu bisa mendapatkan layanan dengan gaya belajar yang sesuai dengan kepribadianmu. Karena pengajar kami akan berinteraksi dengan kamu secara individual. Kamu juga bisa mengetahui karaktermu melalui tes dan konsultasi kepribadian.</p>
                </div>
            </div>

            <div class="row pt-5 pb-5">
                <div class="col-md-8">
                    <h3>Merdeka Belajar Sesuai Keinginanmu</h3>
                    <p>Esscarrior, kamu bisa bebas memilih kapan dan di mana kamu mau belajar. Selain itu kamu juga bebas menentukan apa yang ingin kamu pelajari. Memahami konsep, mengaplikasikan materi, serta menguji pemahaman kamu dengan ribuan soal dan
                        pembahasan.
                    </p>
                </div>
                <div class="col-md-4 z-1">
                    <div class="es-banner-img">
                        <img src="img/reason-2.png" alt="">
                    </div>
                </div>
            </div>

            <div class="row pt-5 pb-5 bg-2">
                <div class="col-md-4">
                    <div class="es-banner-img">
                        <img src="img/reason-3.png" alt="">
                    </div>
                </div>
                <div class="col-md-8 z-1">
                    <h3>Pendamping Belajar Sesuai Kebutuhanmu</h3>
                    <p>Esscarrior, kamu akan belajar bersama pengajar profesional lulusan dari perguruan tinggi ternama dan memiliki pengalaman mengajar sesuai bidangnya. Kamu juga bisa memberitahu kepada kami, pengajar seperti apa yang kamu inginkan.</p>
                </div>
            </div>

            <div class="row pt-5 pb-5">
                <div class="col-md-8">
                    <h3>Komunitas Belajar Sesuai Kenyamananmu</h3>
                    <p>Esscarrior, kamu akan mendapatkan teman nongkrong dan diskusi pada round table eksklusif yang bisa kamu akses kapan pun dan di mana pun. Selain itu kamu juga bisa berdiskusi secara interaktif dengan pengajar kami dan bermain mini game
                        yang menyenangkan.</p>
                </div>
                <div class="col-md-4 z-1">
                    <div class="es-banner-img">
                        <img src="img/reason-4.png" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-6">
        <div class="es-half-bg">
            <div class="container">
                <div class="es-feature bg-4" id="feature" name="feature">
                    <h1 class="es-title pb-5">Kamu dapet apa aja di esschool.id?</h1>

                    <div class="es-feature-slider">

                        <div class="col-md-4">
                            <div class="card border-0 es-card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="es-card-img d-flex flex-column">
                                            <img class="mx-auto" src="img/konsultasi.png" alt="">
                                            <h3>Konsultasi</h3>
                                        </div>
                                        <!-- <a href="#" class="card-link es-link" data-bs-toggle="modal" data-bs-target="#konsultasiModal" tabindex="0">
                                            <span>Lihat Detail</span>
                                            <img src="img/arrow-danger.svg" alt="">
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 es-card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="es-card-img d-flex flex-column">
                                            <img class="mx-auto" src="img/live-class.png" alt="">
                                            <h3>Live Class</h3>
                                        </div>
                                        <!-- <a href="#" class="card-link es-link" data-bs-toggle="modal" data-bs-target="#konsultasiModal" tabindex="0">
                                            <span>Lihat Detail</span>
                                            <img src="img/arrow-danger.svg" alt="">
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-0 es-card mb-3">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="es-card-img d-flex flex-column">
                                            <img class="mx-auto" src="img/document.png" alt="">
                                            <h3>Soal & Video</h3>
                                        </div>
                                        <!-- <a href="#" class="card-link es-link" data-bs-toggle="modal" data-bs-target="#konsultasiModal" tabindex="0">
                                            <span>Lihat Detail</span>
                                            <img src="img/arrow-danger.svg" alt="">
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="es-package bg-5" id="package" name="package">-->
                <!--    <h1 class="es-title pb-5">Pilihan Paket KELAS SERU</h1>-->

                <!--    <div class="es-package-slider">-->
                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esstream<br>1 Bulan</h2>-->
                <!--                    <h1>Rp200.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            20x live Classes-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esstream<br>6 Bulan</h2>-->
                <!--                    <h1>Rp1.020.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            120x live Classes-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            10x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essoftskills (Webinar Pelatihan Manajemen Diri, Manajemen Waktu, dll)-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esstream<br>12 Bulan</h2>-->
                <!--                    <h1>Rp1.680.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            240x live Classes-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            20x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essoftskills (Webinar Pelatihan Manajemen Diri, Manajemen Waktu, dll)-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esspecial<br>1 Bulan</h2>-->
                <!--                    <h1>Rp500.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            4x Private Classes (Maks 3 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bebas pilih waktu dan pelajaran-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Konsultasi pembelajaran via chat di luar jadwal-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esspecial<br>3 Bulan</h2>-->
                <!--                    <h1>Rp1.275.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            12x Private Classes (Maks 3 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            4x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bebas pilih waktu dan pelajaran-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Konsultasi pembelajaran via chat di luar jadwal-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Esspecial<br>6 Bulan</h2>-->
                <!--                    <h1>Rp2.100.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            24x Private Classes (Maks 3 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            10x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bebas pilih waktu dan pelajaran-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Konsultasi pembelajaran via chat di luar jadwal-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                        <!-- <div class="card border-0 es-card">
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Essclusive IPA - 12 Bulan</h2>-->
                <!--                    <h1>Rp12.600.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            336x Exclusive Classes (Maks 15 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            20x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Kuis dan pembahasan persiapan PTS dan PAS-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Buku Rangkuman Visual-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essoftskills (Webinar tentang Manajemen Diri, Manajemen waktu, Public Speaking, dll)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Konsultasi pembelajaran via chat di luar jadwal-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Psikologi (Tes kepribadian, tes gaya belajar, dan tes minat bakat disertai hasil analisa psikolog)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bimbingan Metode Belajar yg cocok dengan pengajar khusus untuk kamu-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Grup diskusi orang tua dan pengajar-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div> -->-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Essclusive UTBK<br>6 Bulan</h2>-->
                <!--                    <h1>Rp25.200.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            672x Exclusive Classes (Maks 10 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            40x Try Out UTBK-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Kuis dan pembahasan persiapan PTS dan PAS-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Buku Rangkuman Visual-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essoftskills (Webinar tentang Manajemen Diri, Manajemen waktu, Public Speaking, dll)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Konsultasi pembelajaran via chat di luar jadwal-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Psikologi (Tes kepribadian, tes gaya belajar, dan tes minat bakat disertai hasil analisa psikolog)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bimbingan Metode Belajar yg cocok dengan pengajar khusus untuk kamu-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Grup diskusi orang tua dan pengajar-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Bimbingan Karir (termasuk strategi pembelajaran, diskusi beasiswa, dan pengarahan untuk kuliah ke Luar Negeri)-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="card border-0 es-card">-->
                <!--            <div class="card-body m-2">-->
                <!--                <div class="container">-->
                <!--                    <h2>Paket Essolitary<br>Bimbingan Privat</h2>-->
                <!--                    <h1>Rp500.000</h1>-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            4x Pertemuan (Maks 1 orang)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Waktu Pembelajaran Fleksibel-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essessment (Tes Pemetaan Dasar dan konsultasi pembelajaran)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essession (Diskusi dengan teman dan pengajar mengenai pelajaran maupun hobi)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Essyclopedia (Kumpulan Video Pembelajaran, Soal dan Pembahasan, dan Visual Modul)-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            Flash Card (kartu rangkuman per sub bab)-->
                <!--                        </li>-->
                <!--                    </ul>-->

                <!--                    <a href="#" class="btn rounded-pill es-btn es-btn-primary" data-bs-toggle="modal" data-bs-target="#register">-->
                <!--                        Gabung Sekarang-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="es-mentor" id="mentor" name="mentor">
                    <h1 class="es-title pb-5">Belajar bersama teacher terbaik</h1>
                    <div class="es-mentor-slider">
                        <div class="card border-0 es-card">
                            <img src="img/Grace Primayanti.jpeg" class="card-img-top" alt="...">
                            <div class="es-mentor-title">
                                <h2>Grace Primayanti</h2>
                                <p>Teacher Matematika</p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <!-- <ul class="es-list-mentor"> -->
                                    <ul>
                                        <li>
                                            Sarjana Ganda Pendidikan Matematika Corban University, USA
                                        </li>
                                        <li>
                                            S1 Pendidikan Matematika Pelita Harapan University Tangerang
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 es-card">
                            <img src="img/Sri Wahyuni.jpeg" class="card-img-top" alt="...">
                            <div class="es-mentor-title">
                                <h2>Sri Wahyuni</h2>
                                <p>Teacher Fisika</p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <!-- <ul class="es-list-mentor"> -->
                                    <ul>
                                        <li>
                                            Awardee LPDP S2 Pendidikan Fisika UPI
                                        </li>
                                        <li>
                                            S1 Pendidikan Matematika UNNES
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="card border-0 es-card">
                            <img src="img/Rectangle.png" class="card-img-top" alt="...">
                            <div class="es-mentor-title">
                                <h2>Ghaly Aditya</h2>
                                <p>Teacher Matematika</p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <ul>
                                        <li>
                                            Lulusan Termuda Teknik Informatika ITS (19 Tahun)
                                        </li>
                                        <li>
                                            Tiga Kali Program Akselerasi (SD, SMP, SMA)
                                        </li>
                                        <li>
                                            Co-Founder esschool.id
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="es-video">
            <div class="container">
                <h1 class="es-text-danger pb-5">Video pembelajaran yang seru</h1>
                <div class="es-video-slider">
                    <!-- <div class="card border-0 es-cards" style="background-image: url(img/user-bg.jpeg);"> -->
                    <div class="es-play">
                        <iframe width="630" height="355" src="https://www.youtube.com/embed/6Ge_ezzlo6g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                    <!-- </div> -->

                    <!-- <div class="card border-0 es-cards" style="background-image: url(img/user-bg.jpeg);"> -->
                    <!-- <div class="es-play">
                        <iframe width="630" height="355" src="https://www.youtube.com/embed/ng_11O1ubiA"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="es-testimoni" id="testimoni">
        <div class="container">
            <h1 class="es-text-danger pb-5">Kata mereka yang pernah belajar di esschool.id</h1>
            <div class="es-testimoni-slider">
                <div class="card border-0 es-card pb-3 es-card-p">
                    <div class="card-body">
                        <div class="container">
                            <div class="es-user">
                                <div class="es-user-img">
                                    <img src="img/user.png" alt="">
                                </div>

                                <div class="es-user-info">
                                    <h4>Indah</h4>
                                    <h5>ITS</h5>
                                </div>
                            </div>

                            <div class="es-testimoni-text">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, iure eaque quaerat officia hic necessitatibus dignissimos magnam? Nisi a molestias iusto architecto deserunt possimus perferendis, voluptas quis accusantium obcaecati sequi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 es-card pb-3 es-card-p">
                    <div class="card-body">
                        <div class="container">
                            <div class="es-user">
                                <div class="es-user-img">
                                    <img src="img/user.png" alt="">
                                </div>

                                <div class="es-user-info">
                                    <h4>Agus</h4>
                                    <h5>IPB</h5>
                                </div>
                            </div>

                            <div class="es-testimoni-text">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, iure eaque quaerat officia hic necessitatibus dignissimos magnam? Nisi a molestias iusto architecto deserunt possimus perferendis, voluptas quis accusantium obcaecati sequi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 es-card pb-3 es-card-p">
                    <div class="card-body">
                        <div class="container">
                            <div class="es-user">
                                <div class="es-user-img">
                                    <img src="img/user.png" alt="">
                                </div>

                                <div class="es-user-info">
                                    <h4>Agus</h4>
                                    <h5>ITB</h5>
                                </div>
                            </div>

                            <div class="es-testimoni-text">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, iure eaque quaerat officia hic necessitatibus dignissimos magnam? Nisi a molestias iusto architecto deserunt possimus perferendis, voluptas quis accusantium obcaecati sequi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="es-faq" id="faq">
        <div class="container">
            <h1 class="es-text-danger pb-5">Paling sering ditanya</h1>

            <div class="d-flex flex-column">
                <a data-bs-toggle="collapse" href="#faq1" role="button" aria-expanded="false" aria-controls="faq1" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Apa itu esschool.id?
                                </p>

                                <div class="collapse" id="faq1">
                                    <p>
                                        Bimbingan belajar untuk tingkat SMA/SMK/sederajat yang disesuaikan dengan gaya belajar dan karakter siswa.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq2" role="button" aria-expanded="false" aria-controls="faq2" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Siapa saja yang bisa menjadi murid di esschool.id?
                                </p>

                                <div class="collapse" id="faq2">
                                    <p>
                                        Saat ini materi yang kami berikan adalah materi pejaran SMA-SAINTEK jadi buat kamu yang memerlukan pemahaman disekolah dan ingin melanjutkan ke perguruan tinggi saintek bisa menjadi murid esschool.id
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq3" role="button" aria-expanded="false" aria-controls="faq3" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Apakah siswa SMK bisa mendaftar di esschool.id?
                                </p>

                                <div class="collapse" id="faq3">
                                    <p>
                                        Saat ini materi-materi SMK dan IPS sedang dalam tahap pengembangan. Bagi siswa yang berencana melanjutkan ke jenjang Universitas, bisa memanfaatkan fitur esspecial atau essolitary untuk mendapatkan bimbingan privat mata pelajaran tertentu dari guru-guru
                                        terbaik.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq4" role="button" aria-expanded="false" aria-controls="faq4" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Apakah Mahasiswa bisa mendaftar di esschool.id?
                                </p>

                                <div class="collapse" id="faq4">
                                    <p>
                                        Materi-materi yang tersedia di esschool.id saat ini ialah SMA-SAINTEK dan persiapan UTBK. Bagi mahasiswa dan umum bisa mendalami materi tertentu dengan bimbingan privat dari paket especial atau essolitary.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq5" role="button" aria-expanded="false" aria-controls="faq5" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Program apa saja yang ada di esschool.id ?
                                </p>

                                <div class="collapse" id="faq5">
                                    <ul>
                                        <li>
                                            Esstream
                                            <p>Program live streaming class dimana siswa akan belajar tatap muka secara online dengan Essensei (tutor) via airmeet. Bentuk pengajaran satu arah dan pertanyaan diajukan lewat chat.</p>
                                        </li>
                                        <li>
                                            Esspecial
                                            <p>Program kelas privat yang diisi maksimal 3 orang. Siswa akan belajar dengan Essensei melalui Private Live Group dan dapat berkonsultasi via chat.
                                            </p>
                                        </li>
                                        <li>
                                            Essclusive
                                            <p>Program Eksklusif UTBK 12 SMA dengan kapasitas 10 orang siswa, serta Eksklusif kelas 10 & 11 IPA yang diisi maksimal 15 orang siswa. Hanya di program Essclusive siswa akan mendapatkan tes gaya belajar yang sesuai
                                                hingga konsultasi karir masa depan yang tepat</p>
                                        </li>
                                        <li>
                                            Essolitary
                                            <p>Program privat 1 Essensei akan mengajar hanya 1 siswa aja.</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq6" role="button" aria-expanded="false" aria-controls="faq6" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana cara mendaftar di esschool.id?
                                </p>

                                <div class="collapse" id="faq6">
                                    <ul>
                                        <li>
                                            Melalui Website
                                            <ol>
                                                <li>
                                                    Klik “Gabung Sekarang”
                                                </li>
                                                <li>
                                                    Isi Form pendaftaran dengan lengkap
                                                </li>
                                                <li>
                                                    Klik “Daftar Sekarang”
                                                </li>
                                                <li>
                                                    Tim esschool akan menghubungi kamu
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            Melalui Chat Admin
                                            <p>Hubungi nomor Admin WA di : +62 813 8267 3264 untuk melakukan pendaftaran
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq7" role="button" aria-expanded="false" aria-controls="faq7" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana jika merubah Paket ditengah jalan?
                                </p>

                                <div class="collapse" id="faq7">
                                    <p>
                                        Sisa Paket yg sudah di pesan akan dikonversi ke jumlah dana yg akan diperlukan untuk paket lainnya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq8" role="button" aria-expanded="false" aria-controls="faq8" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana jika Pengajar tidak cocok untuk saya?
                                </p>

                                <div class="collapse" id="faq8">
                                    <p>
                                        Pengajar kami akan menyesuaikan kebutuhan kamu akan tetapi untuk program esspecial dan esslolitary, kamu dapat menyampaikan ketidakcocokan dengan pengajar dan akan kami berikan pengajar yg lebih cocok buat kamu.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq9" role="button" aria-expanded="false" aria-controls="faq9" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana cara mengetahui promo terbaru dari esschool.id?
                                </p>

                                <div class="collapse" id="faq9">
                                    <p>
                                        Kamu bisa mengunjungi media sosial esschool.id (Instagram, Twitter, Facebook Official esschool.id) atau membuka website kami di esschool.id
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq10" role="button" aria-expanded="false" aria-controls="faq10" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana cara menghubungi layanan pelanggan esschool.id?
                                </p>

                                <div class="collapse" id="faq10">
                                    <p>
                                        Kamu bisa menghubungi Esschool melalui:
                                        <ul>
                                            <li>
                                                Whatsapp: +62 813 8267 3264
                                            </li>
                                            <li>
                                                Email: info@esschool.id
                                            </li>
                                            <li>
                                                Facebook: Esschool Indonesia
                                            </li>
                                            <li>
                                                Instagram: @esschool.id
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq11" role="button" aria-expanded="false" aria-controls="faq11" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Apa itu Rekan esschool.id?
                                </p>

                                <div class="collapse" id="faq11">
                                    <p>
                                        Program Rekan esschool.id memungkinkan kamu mendapatkan keuntungan berupa uang tunai dengan mengajak teman kamu membeli paket langganan esschool.id menggunakan kode referral milikmu.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a data-bs-toggle="collapse" href="#faq12" role="button" aria-expanded="false" aria-controls="faq12" class="es-collapse collapsed">
                    <div class="card border-0 es-card">
                        <div class="card-body">
                            <div class="container">
                                <p>
                                    Bagaimana cara mendaftar sebagai Rekan esschool.id?
                                </p>

                                <div class="collapse" id="faq12">
                                    <ol>
                                        <li>
                                            Daftarkan diri melalui Form Pendaftaran Rekan pada link ----
                                        </li>
                                        <li>
                                            Konfirmasi status Rekan esschoo.id akan dihubungi oleh tim kami dalam waktu 3x24 jam sejak pendaftaran jika data berhasil diverifikasi.
                                        </li>
                                        <li>
                                            Komisi yang dikirimkan sebelumnya akan dipotong pajak 2,5%, pengiriman komisi akan dilakukan dalam waktu 14 hari kemudian.
                                        </li>
                                        <li>
                                            Pendaftar dianjurkan untuk mengisi kembali formulir jika tidak mendapatkan konfirmasi dalam 3x24 jam (pastikan kode referral, nomor telepon, & nomor rekening yang dimasukkan benar).
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="es-ready">
        <div class="container">
            <div class="card border-0 es-card">
                <div class="card-body es-container d-md-flex align-items-center justify-content-md-between">
                    <span>
                        Siap menggapai mimpimu?
                    </span>

                    <button type="button" class="btn es-btn btn-md es-btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#register">
                        <span>Gabung Sekarang</span>
                        <img src="img/icon-navigation-arrow_forward_24px.svg" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="es-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="container">
                        <h1>
                            esschool.id
                        </h1>
                        <p>
                            Jl. Desa Tangkil RT 06/RW 01 No. 123 Kel.Cinagara,<br>Caringin, Kab. Bogor, Jawa Barat, 16730
                            <br> (+62)251 8563251 | office@essodev.com
                        </p>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="container">
                        <ul>
                            <li>
                                <h4>
                                    esschool.id
                                </h4>
                            </li>
                            <li>
                                <a href="#feature">Fitur</a>
                            </li>
                            <li>
                                <a href="#package">Paket Belajar</a>
                            </li>
                            <li>
                                <a href="#testimoni">Testimoni</a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/esschool/jobs/" target="_blank">Karir</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="container">
                        <ul>
                            <li>
                                <h4>
                                    Kontak Kami
                                </h4>
                            </li>
                            <li>
                                <a href="https://wa.me/6281382673264?text=Halo%20esschool.id!" target="_blank">
                                    <img src="img/whatsapp.png" alt="">
                                    <p>
                                        WhatsApp
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@esschool.id" target="_blank">
                                    <img src="img/email.png" alt="">
                                    <p>
                                        info@esschool.id
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="container">
                        <ul>
                            <li>
                                <h4>
                                    Ikuti Kami
                            </li>
                            <li>
                                <a href="https://www.facebook.com/esschoolindonesia" target="_blank">
                                    <img src="img/facebook.png" alt="">
                                    <p>
                                        Facebook
                                    </p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/esschool.id/" target="_blank">
                                    <img src="img/instagram.png" alt="">
                                    <p>
                                        Instagram
                                    </p>
                                </a>
                            </li>
                            <!-- <li>
                    <a href="#">
                      <img src="img/twitter.png" alt="">
                      <p>
                        Twitter
                      </p>
                    </a>
                  </li> -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 mt-5 mb-5">
                    <div class="container">
                        &copy; 2021 esschool.id. All right reserved
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="ic-wa cta-waba" href="https://wa.me/6281382673264/?text=Halo esschool.id!" target="_blank" rel="noreferrer">
        <img src="img/ic-wa.svg" width="64" height="64" alt="WhatsApp" />
        <span><b>Hubungi Kami</b></span>
    </a>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate.js"></script>

    <script src="slick/slick.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // $('#registration').on('submit', function() {
            //   alert(`Terima kasih telah bergabung dengan esschool.id! Tim kami akan segera menghubungi kamu untuk proses selanjutnya.`)
            // })

            $('.es-feature-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                dots: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            })

            $('.es-package-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                dots: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            })

            $('.es-mentor-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                dots: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            })

            $('.es-video-slider').slick({
                infinite: true,
                slidesToScroll: 2,
                slidesToShow: 2,
                arrows: true,
                dots: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            })

            $('.es-testimoni-slider').slick({
                infinite: true,
                slidesToScroll: 2,
                slidesToShow: 2,
                arrows: true,
                dots: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            })
        })
    </script>
</body>

</html>
