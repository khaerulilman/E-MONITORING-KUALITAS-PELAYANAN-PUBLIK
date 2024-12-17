<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="https://emonkuyanlik.sumutprov.go.id/images/logo/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .btn-group-toggle .btn input[type="radio"] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="bg-dark text-white text-center py-3">
            <h1>Admin | E-MONKUYANLIK</h1>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showSection('dashboard')">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showSection('manage-survey')">
                                    <i class="bi bi-journal-text"></i> Manajemen Survey
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showSection('manage-user')">
                                    <i class="bi bi-people"></i> Manajemen Pengelola
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showSection('feedback')">
                                    <i class="bi bi-chat-dots"></i> Feedback
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/" onclick="logout()">
                                    <i class="bi bi-box-arrow-right"></i> Kembali
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container my-4 flex-grow-1">
            <section id="dashboard" class="content-section">
                <h2 class="pb-2 border-bottom">Dashboard</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Survey Aktif</h3>
                                <p class="card-text">{{  count($surveys)  }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Pengelola</h3>
                                <p class="card-text">{{  count($users)  }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center mb-4">
                            <div class="card-body">
                                <h3 class="card-title">Feedback</h3>
                                <p class="card-text">{{ count($surveysarans) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ Auth::user()->foto_profil ? asset('images/foto_profile/' . Auth::user()->foto_profil) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp' }}"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                            <h5 class="my-3">{{ Auth::user()->nama_lengkap }}</h5>
                            <p class="text-muted mb-4">Super Admin</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#"><button type="button" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-outline-primary ms-1 mb-1" data-bs-toggle="modal"
                                        data-bs-target="#editProfileModal">Ubah Profil</button></a>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama Lengkap</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->nama_lengkap }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <div id="passwordField" class="password-text">{{ Auth::user()->password }}</div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="togglePasswordButton"
                                            style="padding-top: 0.1rem; padding-bottom: 0.1rem;">
                                            <i class="bi bi-eye" style="font-size: 0.9rem;"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">No HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->no_telp }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nomor Pegawai</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->no_pegawai }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Alamat Rumah</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->alamat_rumah }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="manage-survey" class="content-section" style="display:none;">
                <h2 class="pb-2 border-bottom">Manajemen Survey</h2>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addSurveyModal">
                    <i class="bi bi-plus-lg"></i> Tambah Survey Baru
                </button>
                
    
                <table id="services-table" class="table table-striped table-bordered">
               
                    <thead>
                        <tr>
                            <th>Nama Survey</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    @if(count($surveys) > 0)
                    @foreach($surveys as $survey)
                        
                        <tr>
                            <td>{{ $survey->nama_survey }}</td>
                            <td>{{ $survey->deskripsi }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailSurveyModal{{ $survey->id }}">
                                    <i class="bi bi-info-circle"></i> Detail
                                </a>
                                <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSurveyModal{{ $survey->id }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $survey->id }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>

                        <!-- Delete confirmation modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $survey->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $survey->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $survey->id }}">Konfirmasi Hapus Survey</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus survey "{{ $survey->nama_survey }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form method="POST" action="{{ route('delete_survey', $survey->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                @else
                <h4 style="color: grey; text-align:center;">Tidak ada Survey Yang tersedia!!</h4>
                @endif
                    
                    </tbody>
      
                </table>
             
         
            </section>


            <section id="feedback" class="content-section container">
                <h2 class="pb-2 border-bottom">Laporan Hasil Survey</h2>
        
                <div style="font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: flex-start; margin: 0; padding-top: 20px;">
                    <div style="width: 90%; max-width: 800px;">
                        <h1 style="text-align: center; margin-bottom: 20px; font-size: 18px;">Grafik Rating Survey</h1>
                        <canvas id="surveyChart" style="border: 1px solid #ddd; border-radius: 5px;"></canvas>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    @foreach($surveys as $survey)
                    <div class="col-md-4">
                        <div class="card text-center mb-4">
                            <div class="card-body">
                                <h3 class="card-title">{{ $survey->nama_survey }}</h3>
                                <p class="card-text">Survey Tanggal {{  $survey->updated_at }}</p>
                                <p class="card-text">Total {{ $survey->getRespondentCount() }} Responden</p>
                                <a class="btn btn-info btn-sm" data-bs-toggle="modal" href="#detailLaporanSurvey{{ $survey->id }}" role="button" style="background-color: grey; border:grey" >
                                    <i class="bi bi-info-circle"></i> Laporan Survey
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                </div>

            
                @foreach($surveys as $survey)
                    <div class="modal fade" id="detailLaporanSurvey{{ $survey->id }}" tabindex="-1" aria-labelledby="detailLaporanSurvey" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailLaporanSurvey">Detail Laporan Survey</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="col-sm-9">
                                                <p class="mb-0">Responden Berdasarkan Gender</p>
                                            </div>
                                            <div class="col-sm-9">
                                                @php
                                                    $surveyDataItem = collect($surveyData)->firstWhere('nama_survey', $survey->nama_survey);
                                                @endphp
                                                <p class="text-muted mb-0">Laki-laki: {{ $surveyDataItem['male_count'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Perempuan: {{ $surveyDataItem['female_count'] ?? 0 }}</p>
                                            </div> 
                                            <hr>
                                            <div class="col-sm-9">
                                                <p class="mb-0">Responden Berdasarkan Usia</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">Usia 15-20: {{ $surveyDataItem['age_groups']['15-20'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Usia 20-30: {{ $surveyDataItem['age_groups']['20-30'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Usia 30-40: {{ $surveyDataItem['age_groups']['30-40'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Usia 40-50: {{ $surveyDataItem['age_groups']['40-50'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Usia 60-90: {{ $surveyDataItem['age_groups']['60-90'] ?? 0 }}</p>
                                            </div>
                                            <hr>
                                            <div class="col-sm-9">
                                                <p class="mb-0">Responden Berdasarkan Pendidikan Terakhir</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">SD: {{ $surveyDataItem['education_levels']['SD'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">SMP: {{ $surveyDataItem['education_levels']['SMP'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">SMA: {{ $surveyDataItem['education_levels']['SMA'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Sarjana: {{ $surveyDataItem['education_levels']['Sarjana'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Magister: {{ $surveyDataItem['education_levels']['Magister'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Doktor/Profesor: {{ $surveyDataItem['education_levels']['Doktor/Profesor'] ?? 0 }}</p>
                                            </div>
                                            <hr>
                                            <div class="col-sm-9">
                                                <p class="mb-0">Responden Berdasarkan Pekerjaan</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">Pelajar: {{ $surveyDataItem['occupation_counts']['Pelajar'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Aparat Keamanan: {{ $surveyDataItem['occupation_counts']['Aparat Keamanan'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Wiraswasta: {{ $surveyDataItem['occupation_counts']['Wiraswasta'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">Karyawan: {{ $surveyDataItem['occupation_counts']['Karyawan'] ?? 0 }}</p>
                                                <p class="text-muted mb-0">PNS: {{ $surveyDataItem['occupation_counts']['PNS'] ?? 0 }}</p>
                                            </div>
                                            <hr>                               
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <h2 class="pb-2 border-bottom">Feedback Masyarakat</h2> 
                @if(count($surveysarans) > 0)
                @foreach($surveysarans->groupBy('survey_id') as $surveyId => $surveySaransGroup)
                    <h4>{{ $surveySaransGroup->first()->survey->nama_survey }}</h4>
                    
                    <div class="row">
                        @foreach($surveySaransGroup as $surveysaran)
                            <div class="col-md-4 mb-3">
                                <div class="border rounded border-dark p-3">
                                    <div class="list-group-item feedback-item">
                                        <p class="mb-1">Feedback dari pengguna {{ $surveysaran->masyarakat_id }}</p>
                                        <a class="btn btn-info btn-sm" data-bs-toggle="modal" href="#exampleModalToggle{{ $surveysaran->id }}" role="button">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </a>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tanggapiModal{{$surveysaran->id}}">
                                            <i class="bi bi-reply"></i> Tanggapi
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModalFeedback{{ $surveysaran->id }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @else
                <h4 style="color: grey; text-align:center;">Tidak ada Response Masyarakat!!</h4>
                @endif
            </section>

            <!-- Confirm Delete Modal -->
            <!-- Confirm Delete Modal -->
            @foreach($surveysarans->groupBy('survey_id') as $surveyId => $surveySaransGroup)
                @foreach($surveySaransGroup as $surveysaran)
                    <div class="modal fade" id="confirmDeleteModalFeedback{{ $surveysaran->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalFeedbackLabel{{ $surveysaran->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Feedback</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus feedback ini?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ url('delete_formulir_response', ['id' => $surveysaran->id, 'masyarakat_id' => $surveysaran->masyarakat_id, 'survey_id' => $surveysaran->survey_id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach





            <!-- Detail Modal -->
            @foreach($surveysarans as $surveysaran )
            <div class="modal fade" id="exampleModalToggle{{ $surveysaran->id }}" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel{{ $surveysaran->id }}" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel{{ $surveysaran->id }}">Detail Data Diri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control mt-2" id="name"
                                        value="{{ $surveysaran->masyarakat->nama_lengkap }}" readonly disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="age">Usia</label>
                                    <input type="number" class="form-control mt-2" id="age"
                                        value="{{ $surveysaran->masyarakat->usia }}" readonly disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="phone">No Telepon/WA</label>
                                    <input type="tel" class="form-control mt-2" id="phone"
                                        value="{{ $surveysaran->masyarakat->no_telp }}" readonly disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="gender">Jenis Kelamin</label>
                                    <input type="text" class="form-control mt-2" id="gender"
                                        value="{{ $surveysaran->masyarakat->gender }}" readonly disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="education">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control mt-2" id="education"
                                        value="{{ $surveysaran->masyarakat->pendidikan_terakhir }}" readonly disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="job">Pekerjaan</label>
                                    <input type="text" class="form-control mt-2" id="job"
                                        value="{{ $surveysaran->masyarakat->pekerjaan }}" readonly disabled>
                                </div>
                                <br>
                                
            
                                <div>
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalToggleLabel2">Detail Survey</h5>
                                                
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <form>
                                                    <div>
                                                        <h3>Survey {{$surveysaran->survey_id}}: {{$surveysaran->survey->nama_survey}}</h3>
                                                        <p>{{ $surveysaran->survey->deskripsi}}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--  -->
                                        
                                                        @foreach($surveyresponses as $surveyresponse)
                                                        @if($surveysaran->masyarakat_id == $surveyresponse->masyarakat_id && $surveysaran->survey_id == $surveyresponse->survey_id)
                                                        <div class="mt-3">
                                                            <label>{{ $surveyresponse->question->nama_question }}</label>
                                                            <div class="btn-group btn-group-toggle d-flex justify-content-between"
                                                                data-toggle="buttons">
                                                                <label class="btn btn-secondary">
                                                                    <input type="radio" name="requirement1" value="0"
                                                                        autocomplete="off" disabled>{{$surveyresponse->rating}} 
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endforeach

                                                        
                                                       <!--  -->
                                                        <div class="mt-4">
                                                            <label for="feedback">Masukan atau Saran</label>
                                                            <textarea class="form-control" id="feedback" rows="4" placeholder="{{$surveysaran->saran}}" readonly disabled></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Lanjut</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            

             <!-- Tanggapi Modal -->
                @foreach($surveysarans as $surveysaran)
                <div class="modal fade" id="tanggapiModal{{$surveysaran->id}}" tabindex="-1" aria-labelledby="tanggapiModalLabel{{$surveysaran->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tanggapiModalLabel{{$surveysaran->id}}">Kirim Tanggapan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <form action="{{ url('/dashboard/create_feedback') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="responseText{{$surveysaran->id}}" class="form-label">{{$surveysaran->saran}}</label>
                                <textarea class="form-control" id="responseText{{$surveysaran->id}}" rows="3" placeholder="Berikan tanggapan..." name="feedback"></textarea>
                                <input type="hidden" name="survey_id" value="{{$surveysaran->id}}">
                                <input type="hidden" name="user_admin_id" value="{{Auth::user()->id}}">
                            </div>
                            <div style="display: flex; justify-content:space-between">
                                <div></div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

        </main>
        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p>© 2024 E-MonkuYanlik | Design & Develop by Kelompok 5</p>
        </footer>
    </div>

    <!-- Modal Tambah Survey -->
    <div class="modal fade" id="addSurveyModal" tabindex="-1" aria-labelledby="addSurveyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSurveyModalLabel">Tambah Survey Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambah survey baru -->
                    <form id="surveyForm" action="{{ url('/dashboard/manage_survey') }}" method="post">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_survey" class="form-label">Nama Survey</label>
                                    <input type="text" class="form-control" id="nama_survey" name="nama_survey" placeholder="Nama Survey" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Survey</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Survey" required></textarea>
                                </div>
                                <button type="button" class="btn btn-secondary mb-3" id="addQuestionButton"><i class="bi bi-plus-lg"></i> Tambah Pertanyaan</button>
                                <div id="questionsContainer"></div>
                                <input type="hidden" name="total_pertanyaan" id="total_pertanyaan" value="0"> <!-- Input untuk menyimpan total pertanyaan -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Survey -->
    @foreach($surveys as $survey)
    <div class="modal fade" id="editSurveyModal{{ $survey->id }}" tabindex="-1" aria-labelledby="editSurveyModalLabel{{ $survey->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSurveyModalLabel{{ $survey->id }}">Edit Survey</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/dashboard/edit_survey/' . $survey->id) }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $survey->id }}">
                    <div class="mb-3">
                        <label for="nama_survey" class="form-label">Nama Survey</label>
                        <input type="text" class="form-control" id="nama_survey" name="nama_survey" value="{{ $survey->nama_survey }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Survey</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $survey->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="questions">Pertanyaan</label>
                        @php
                            $hasQuestions = false;
                        @endphp
                        @foreach($questions as $question)
                            @if($survey->id == $question->survey_id)
                                @php
                                    $hasQuestions = true;
                                @endphp
                                <br>
                                <input type="text" class="form-control mt-2" name="questions[{{ $question->id }}]" value="{{ $question->nama_question }}">
                            @endif
                        @endforeach
                        @if(!$hasQuestions)
                            <div class="col-sm-8">
                                <div>There is no question</div>
                            </div>
                        @endif
                    </div>
                    <br>
                    <div style="display: flex; justify-content:space-between">
                        <div></div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>


    @endforeach

    <!-- Modal Detail Survey -->
    @foreach($surveys as $survey)
    <div class="modal fade" id="detailSurveyModal{{  $survey->id  }}" tabindex="-1" aria-labelledby="detailSurveyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailSurveyModalLabel">Detail Survey</h5>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Survey</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $survey->nama_survey }}</p>
                            </div>
                            <hr>
                            <div class="col-sm-3">
                                <p class="mb-0">Deskripsi</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $survey->deskripsi }}</p>
                            </div>
                            <hr>
                            <div class="col-sm-9">
                                <p class="mb-0">Survey Dibuat   : {{ $survey->created_at }}</p>
                                <p class="mb-0">Survey Diupdate : {{ $survey->updated_at }}</p>
                            </div>

                            <hr>
                            @php
                            $i = 1;
                            @endphp

                            @foreach($questions as $question)
                                @if($survey->id == $question->survey_id)
                                <br>
                                    <div>
                                        <p class="mb-0">Pertanyaan ke-{{ $i }}</p>
                                    </div>
                                    <div>
                                        <p class="text-muted mb-0">{{ $question->nama_question }}</p>
                                    </div>
                                    @php
                                    $i++;
                                    @endphp
                                @endif
                            @endforeach

                            @if($i == 1)
                                <div class="col-sm-12">
                                    <p class="text-muted mb-0">There is no question</p>
                                </div>
                            @endif

                            <hr>                          
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Tambah Pengelola -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Pengelola Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="userName" placeholder="Nama">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="togglePassword"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nomor HP</label>
                                    <input type="number" class="form-control" id="nomorHP"
                                        placeholder="Nomor HP">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nomor Pegawai</label>
                                    <input type="number" class="form-control" id="nomorPegawai"
                                        placeholder="Nomor Pegawai">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Alamat Rumah</label>
                                    <textarea class="form-control" id="alamatRumah" placeholder="Alamat Rumah"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                                Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pengelola -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Pengelola</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="userName" placeholder="Nama">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nomor HP</label>
                                    <input type="number" class="form-control" id="nomorHP"
                                        placeholder="Nomor HP">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Nomor Pegawai</label>
                                    <input type="number" class="form-control" id="nomorPegawai"
                                        placeholder="Nomor Pegawai">
                                </div>
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Alamat Rumah</label>
                                    <textarea class="form-control" id="alamatRumah" placeholder="Alamat Rumah"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-pencil"></i> Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Pengelola -->
    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailUserModalLabel">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="col-sm-3">
                                <p class="mb-0">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Johnatan Smith</p>
                            </div>

                            <hr>

                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">example@example.com</p>
                            </div>

                            <hr>

                            <div class="col-sm-3">
                                <p class="mb-0">No HP</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">(097) 234-5678</p>
                            </div>

                            <hr>

                            <div class="">
                                <p class="mb-0">Nomor Pegawai</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">321</p>
                            </div>

                            <hr>

                            <div class="col-sm-3">
                                <p class="mb-0">Alamat Rumah</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Ubah Data Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                            <div class="container">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ url('/dashboard/update_profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="bi bi-eye"></i></button>
                                                </div>
                                                <small class="form-text text-muted">Max 5 characters</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nomorHP" class="form-label">Nomor HP</label>
                                                <input type="number" class="form-control" id="nomorHP" name="no_telp" value="{{ Auth::user()->no_telp }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="fotoProfil" class="form-label">Foto Profil</label>
                                                <input type="file" class="form-control" id="fotoProfil" name="foto_profil">
                                                @if(Auth::user()->foto_profil)
                                                    <img src="{{ url('images/profile/'.Auth::user()->foto_profil) }}" alt="Foto Profil" width="100">
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamatRumah" class="form-label">Alamat Rumah</label>
                                                <textarea class="form-control" id="alamatRumah" name="alamat_rumah">{{ Auth::user()->alamat_rumah }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('surveyChart').getContext('2d');

            // Data for the surveys
            const surveyData = {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Average Rating',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Configuration for the chart
            const config = {
                type: 'bar',
                data: surveyData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 5
                        }
                    }
                }
            };

            // Create the chart
            new Chart(ctx, config);
        });
    </script>
    
    <script>

        // js untuk merubah page
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        $(document).ready(function() {

            showSection('dashboard');

            let questionCount = 0;

            $('#addQuestionButton').on('click', function() {
                questionCount++;
                const questionId = `question${questionCount}`;
                const questionHTML = `
                    <div class="mb-3" id="${questionId}">
                        <label class="form-label">Pertanyaan ${questionCount}</label>
                        <input type="text" class="form-control" name="pertanyaan[]" placeholder="Tulis pertanyaan"> <!-- Menggunakan nama pertanyaan[] untuk menyimpan pertanyaan -->
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-question-button" data-question-id="${questionId}"><i class="bi bi-trash"></i> Hapus Pertanyaan</button>
                    </div>`;
                $('#questionsContainer').append(questionHTML);
                $('#total_pertanyaan').val(questionCount); // Update nilai total pertanyaan
            });

            $('#questionsContainer').on('click', '.remove-question-button', function() {
                const questionId = $(this).data('question-id');
                $(`#${questionId}`).remove();
                questionCount--;
                $('#total_pertanyaan').val(questionCount); // Update nilai total pertanyaan
            });

            // js manajemen survey baru (edit survey)
            $('#editQuestionButton').on('click', function() {
                questionCount++;
                const questionId = `question${questionCount}`;
                const questionHTML = `
                        <div class="mb-3" id="${questionId}">
                            <label class="form-label">Pertanyaan ${questionCount}</label>
                            <input type="text" class="form-control" placeholder="Tulis pertanyaan">
                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-question-button" data-question-id="${questionId}"><i class="bi bi-trash"></i> Hapus Pertanyaan</button>
                        </div>`;
                $('#editquestionsContainer').append(questionHTML);
            });

            $('#editquestionsContainer').on('click', '.remove-question-button', function() {
                const questionId = $(this).data('question-id');
                $(`#${questionId}`).remove();
            });

        
            // js untuk hide password
            $(document).ready(function() {
                // Simpan nilai asli dari teks password
                var originalPassword = $('#passwordField').text();

                $('#togglePasswordButton').on('click', function() {
                    var passwordField = $('#passwordField');
                    var passwordFieldType = passwordField.attr('data-type');

                    if (passwordFieldType === 'password') {
                        // Tampilkan teks password
                        passwordField.text(originalPassword);
                        passwordField.attr('data-type', 'text');
                        $('#togglePasswordButton i').removeClass('bi-eye').addClass('bi-eye-slash');
                    } else {
                        // Sembunyikan teks password
                        passwordField.text('•••••');
                        passwordField.attr('data-type', 'password');
                        $('#togglePasswordButton i').removeClass('bi-eye-slash').addClass('bi-eye');
                    }
                });
            });
    });

    </script>


</body>

</html>

