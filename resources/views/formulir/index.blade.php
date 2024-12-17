<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link rel="icon" type="image/png" href="https://emonkuyanlik.sumutprov.go.id/images/logo/logo_icon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #4a148c;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container-custom {
            background-color: #6a1b9a;
            padding: 20px;
            border-radius: 8px;
        }

        .btn-custom {
            background-color: #ffeb3b;
            color: black;
        }

        .survey-list {
            list-style-type: none;
            padding: 0;
        }

        .survey-list li {
            background-color: #8e24aa;
            color: white;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .survey-list li:hover {
            background-color: #ab47bc;
        }

        .footer {
            background-color: #4a148c;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form action="{{ url('/formulir/fill_out_survey') }}" method="POST">
            @csrf
            <div class="container-custom mt-5" id="personalDataForm" style="margin-bottom: 20px;">
                <div>
                    <div style="display: flex; justify-content:space-between">
                        <h3>ISI DATA DIRI</h3>
                        <a href="/"><img src="images/logo/logo-back.webp" style="width: 40px; filter: brightness(0) invert(1);"></a>
                    </div>
                    <br>
                    <p>Setiap responden wajib mengisi data diri dan silahkan mengisi survey!</p>
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="age">Usia</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Usia" required>
                </div>
                <div class="form-group">
                    <label for="phone">No Telepon/WA</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telepon/WA" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="" disabled selected>Pilih Gender</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="education">Pendidikan Terakhir</label>
                    <select class="form-control" id="education" name="education" required>
                        <option value="" disabled selected>Pilih pendidikan terakhir</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>Sarjana</option>
                        <option>Magister</option>
                        <option>Doktor/Profesor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="job">Pekerjaan</label>
                    <select class="form-control" id="job" name="job" required>
                        <option value="" disabled selected>Pilih pekerjaan</option>
                        <option>PNS</option>
                        <option>Aparat Keamanan</option>
                        <option>Wiraswasta</option>
                        <option>Karyawan</option>
                        <option>Pelajar</option>
                    </select>
                </div>
            </div>

            <!-- form nilai -->
            @foreach($surveys as $survey)
                <div class="container-custom survey-form" id="survey{{ $survey->id }}" style="display: none; margin-bottom:20px">
                    <div>
                        <div style="display: flex; justify-content:space-between;">
                            <div>
                                <h3>Survey {{ $survey->id }}: {{ $survey->nama_survey }}</h3>
                                <p style="margin-right:30px">{{ $survey->deskripsi }}</p>
                            </div>
                            <div>
                                <button type="button" class="btn btn-custom mt-3 back-to-choose">Kembali</button>
                            </div>
                        </div>
                    </div>
                    <!-- Formulir Pertanyaan -->
                    <div class="form-group">
                    @foreach($survey->questions as $question)
                        <div class="mt-3">
                            <label>{{ $question->nama_question }}</label>
                            <div class="btn-group btn-group-toggle d-flex justify-content-between" data-toggle="buttons">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="ratings[{{ $survey->id }}][{{ $question->id }}]" value="{{ $i }}" autocomplete="off" {{ isset($validatedData['ratings'][$survey->id][$question->id]) && $validatedData['ratings'][$survey->id][$question->id] == $i ? 'checked' : '' }}>
                                        {{ $i }}
                                    </label>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        <label for="feedback_{{ $survey->id }}">Masukan atau Saran</label>
                        <textarea class="form-control" name="saran[{{ $survey->id }}]" id="feedback_{{ $survey->id }}" rows="4" placeholder="Tuliskan masukan atau saran Anda di sini">{{ isset($validatedData['saran'][$survey->id]) ? $validatedData['saran'][$survey->id] : '' }}</textarea>
                    </div>
                </div>

                </div>
            @endforeach

            <!-- form pemilihan -->
            <div class="container-custom" id="chooseSurvey">
                <h3>Pilih Survey</h3>
                <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore earum nesciunt dolorem, rerum dolorum nemo facilis dolores nam ipsum. Facere eos illum dolorum distinctio. Quasi voluptatibus obcaecati quae non similique!</span>
                <ul class="survey-list">
                    @foreach($surveys as $survey)
                        <li class="survey-option" data-survey-id="{{ $survey->id }}">{{ $survey->nama_survey }}</li>
                    @endforeach
                </ul>
            </div>

            <div style="margin-top: 20px;">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="responsibility" name="responsibility" required>
                    <label class="form-check-label" for="responsibility">
                        Saya bertanggung jawab atas jawaban yang saya berikan.
                    </label>
                </div>
                <div style="display: flex; justify-content:space-between;">
                    <div></div>
                    <button type="submit" class="btn btn-custom mt-3">Kirim</button>
                </div>
            </div>
        </form>
    </div>

    <div class="footer text-white text-center py-3 mt-4">
        <p>© 2024 E-MonkuYanlik | Design & Develop by Kelompok 5</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.survey-option').forEach(function (option) {
                option.addEventListener('click', function () {
                    showSurvey(option.dataset.surveyId);
                });
            });

            document.querySelectorAll('.back-to-choose').forEach(function (button) {
                button.addEventListener('click', function () {
                    showChooseSurvey();
                });
            });
        });

        function showSurvey(surveyId) {
            // Menyembunyikan semua survey
            document.querySelectorAll('.survey-form').forEach(function (form) {
                form.style.display = 'none';
            });

            // Menampilkan survey yang dipilih
            document.getElementById('survey' + surveyId).style.display = 'block';
            document.getElementById('chooseSurvey').style.display = 'none';
        }

        function showChooseSurvey() {
            // Menyembunyikan semua survey
            document.querySelectorAll('.survey-form').forEach(function (form) {
                form.style.display = 'none';
            });

            // Menampilkan pilihan survei
            document.getElementById('chooseSurvey').style.display = 'block';
        }
    </script>
</body>

</html>
