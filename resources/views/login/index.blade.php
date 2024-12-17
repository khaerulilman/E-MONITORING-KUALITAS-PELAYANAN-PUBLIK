<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/png" href="https://emonkuyanlik.sumutprov.go.id/images/logo/logo_icon.ico">
    <link href="../css/bootstrap.mincf3c.css?v=1670558969" rel="stylesheet">
    <link type="text/css"
        href="http://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&amp;display=swap"
        rel="stylesheet">
    <link href="../admin/temp_assets/fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../css/mystyle_landingc677.css?v=1671852700" rel="stylesheet">
    <link href="../css/luno-style7f26.css?v=1670568591" rel="stylesheet">
    <link href="../css/swiper.min7f26.css?v=1670568591" rel="stylesheet">
    <link href="../css/background7f26.css?v=1670568591" rel="stylesheet">
    <link href="../form_assets/css/custom48bd.css?v=1672209157" rel="stylesheet">
</head>

<body id="layout-1" data-luno="theme-blue">
    <!-- end main-content -->
    <div class="wrapper">
        <!-- Sign In version 1 -->
        <!-- start: page body -->
        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-0">

                    <div class="col-lg-6 col-12 d-none d-lg-flex justify-content-center align-items-center">
                        <div style="max-width: 35rem;">
                            <div class="mb-4">
                                <img src="https://emonkuyanlik.sumutprov.go.id/images/logo/logo_login.svg"
                                    alt="">
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900">E-MONITORING KUALITAS PELAYANAN PUBLIK</h2>
                            </div>
                            <!-- List Checked -->
                            <ul class="list-unstyled mb-5">
                                <li class="mb-4">
                                    <span class="color-600 d-block"><strong>E-MonkuYanlik</strong> Versi 1.1.1</span>
                                    <span class="color-600">Aplikasi Monitoring Kualitas Pelayanan Publik
                                        Elektronik</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center needs-validation">
                        <div class="card card-login-pegawai shadow-sm w-100 p-4 p-md-5"
                            style="max-width: 32rem;height:100vh">
                            <div class="container-form m-auto">
                                <div class="title-login text-center mb-4">
                                    <h2>SELAMAT DATANG</h2>
                                    <h6>DI HALAMAN LOGIN PENGELOLA</h6>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <div class="form-group field-loginform-username required">
                                            <label for="email">Email</label>
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                aria-required="true" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group field-loginform-password required">
                                            <label for="password">Password</label>
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" aria-required="true">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 d-grid"
                                        style="grid-auto-flow: column;grid-column-gap:0.5rem;">
                                        <button type="submit"
                                            class="default-btn btn-padding btn-login-pegawai">Masuk</button>
                                        <a class="default-btn btn-padding btn-kembali-pegawai text-center"
                                            href="/">Home</a>
                                    </div>
                                    {{-- <div style="color:#999;margin:1em 0">
                    Belum Membuat Akun Pegawai? <a href="/register">Buat Akun</a>
                  </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
</body>

</html>
