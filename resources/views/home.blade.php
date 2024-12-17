@extends('layouts/main')

@section('container')
    <style>
        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            margin-top: 20px;
            margin-right: -10%;
            margin-left: -10%;
        }

        footer .container {
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ddd;
        }

        /* Social Media Links */
        .social-media {
            margin-top: 50px;
        }

        .social-media a {
            display: inline-block;
            margin-right: 10px;
        }

        .social-media img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .social-media img:hover {
            transform: scale(1.1);
        }
    </style>

    <!-- Start Preloader Area -->
    <div class="main-content" style="margin-top: 130px;">
        <div class="container mb-5" id="home">
            <div class="row justify-content-center text-center text-dark">
                <div class="col-xl-7 col-lg-10 col-12">
                    <img src="images/logo/logo.svg" alt="">
                    <h2 class="mb-5 mt-4">E-MONITORING KUALITAS PELAYANAN PUBLIK</h2>
                </div>
            </div>
            <div class="row row-cols-md-3 g-4">
                <div class="col-md-6">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <div class="p-4">
                                <img src="images/landing/survey_masyarakat.svg" alt="img" width="220px"
                                    height="160px">
                                <h6 class="mt-4">SURVEI KEPUASAN MASYARAKAT</h6>
                            </div>
                            <div class="form-group mb-4 px-4 d-grid gap-2">
                                <a href="/formulir" class="btn btn-warning btn-block btn-masuk">Survei Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <!-- TO DO LIST: MENGARAHKAN KE PAGE HASIL ADUAN MASYARAKAT -->
                            <!-- P.S. jangan lupa ubah tag a href nya ke page hasil aduan masyarakat, hapus apabila sudah -->
                            <div class="p-4">
                                <img src="images/landing/indeks.svg" alt="img" width="220px" height="160px">
                                <h6 class="mt-4">INDEKS PELAYANAN PUBLIK</h6>
                            </div>
                            <div class="form-group mb-3 px-4 d-grid gap-2">
                                <a href="/login" class="btn btn-warning btn-block btn-masuk">Lanjutkan</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <!-- TO DO LIST: MENGARAHKAN KE PAGE DASHBOARD USER PEGAWAI -->
                            <!-- P.S. jangan lupa ubah tag a href ke page hasil aduan masyarakat, hapus apabila sudah -->
                            <div class="p-4">
                                <img src="images/landing/inovasi.svg" alt="img" width="220px" height="160px">
                                <h6 class="mt-4">TANGGAP SIAGAP</h6>
                            </div>
                            <div class="form-group mb-3 px-4 d-grid gap-2">
                                <a href="/inovasi" class="btn btn-warning btn-block btn-masuk">Lihat Tanggapan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>

            <div class="container mb-5" id="about">
                <div class="row justify-content-center text-center text-dark">
                <div class="col-xl-7 col-lg-10 col-12">
                    <h2 class="mb-5">ABOUT</h2>
                </div>
                </div>
                <div class="row row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card text-center h-100">
                            <div class="card-body" style="display:flex; flex-direction:column; justify-content:space-between">
                                <div class="p-3 mb-2">
                                    <p>Didirikan pada tahun 2024, E-MONITORING KUALITAS PELAYANAN PUBLIK bertujuan untuk membuka
                                        akses bagi masyarakat dalam memberikan umpan balik tentang layanan publik. Sejak itu,
                                        kami telah berupaya meningkatkan transparansi dan efisiensi dalam layanan publik melalui
                                        kolaborasi dengan pemerintah dan masyarakat.</p>
                                </div>
                                <div class="form-group pt-3 d-grid gap-2">
                                    <p class="btn-warning btn-block btn-masuk mt-4" style="padding: 10px;">Sejarah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center h-100">
                            <div class="card-body" style="display:flex; flex-direction:column; justify-content:space-between">
                                <div class="p-3 mb-2">
                                    <p><strong>Misi:</strong> Memberikan akses mudah bagi masyarakat untuk memberikan umpan
                                        balik tentang layanan publik, mendorong inovasi dalam layanan publik, dan meningkatkan
                                        akuntabilitas pemerintah.</p>
                                    <p><strong>Visi:</strong> Menjadi pemimpin dalam memantau dan meningkatkan kualitas layanan
                                        publik secara transparan dan efisien.</p>
                                </div>
                                <div class="form-group d-grid gap-2">
                                    <p class="btn-warning btn-block btn-masuk mt-4" style="padding: 10px;">Misi dan Visi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center h-100">
                            <div class="card-body" style="display:flex; flex-direction:column; justify-content:space-between">
                                <div class="p-4" >
                                    <div>
                                    <p>Kami menghargai setiap pertanyaan dan umpan balik dari Anda. Silakan gunakan informasi
                                        kontak di bawah ini untuk menghubungi kami. Kami siap membantu Anda dengan segala
                                        kebutuhan Anda.</p>
                                        <div class="social-media">
                                        <a href="https://facebook.com" target="_blank">
                                            <img src="images/media/facebook.jpg" alt="Facebook">
                                        </a>
                                        <a href="https://twitter.com" target="_blank">
                                            <img src="images/media/x.jpg" alt="Twitter">
                                        </a>
                                        <a href="https://instagram.com" target="_blank">
                                            <img src="images/media/instagram.jpg" alt="Instagram">
                                        </a>
                                    </div>    
                                    </div>                                                     
                                </div>
                                <div class="form-group pt-5 d-grid gap-2">
                                    <p class="btn-warning btn-block btn-masuk" style="padding: 10px;">Hubungi Kami</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    <div class="footer text-black text-center py-3 mt-auto"><p>© 2024 E-MonkuYanlik | Design &Develop by Kelompok 5</p>
    </div>
   

  
@endsection
