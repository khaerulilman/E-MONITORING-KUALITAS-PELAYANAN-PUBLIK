@extends('layouts/main')

@section('container')
    <div class="main-content d-flex flex-column" style="min-height: 100vh;">
        <div class="container mb-4 flex-grow-1">
            <div class="row justify-content-center text-center text-dark">
                <h2 class="mb-5">TANGGAP SIAGAP</h2>
            </div>

            <div class="row">
                @if(count($feedbacks) > 0)
                @foreach($feedbacks as $feedback)
                    <div class="col-md-4 mb-3">
                        <div class="border rounded border-dark">
                            <div class="list-group-item feedback-item p-3">
                     
                                <div><h3> {{$feedback->formulirResponseSaran->survey->nama_survey}}</h3></div>
                   
                                
                                <p>{{$feedback->formulirResponseSaran->saran}}</p>
                                <hr>
                                <h6>Tanggapan:</h6>
                                <p>{{ $feedback->feedback}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <h4 style="color: grey; text-align:center;">Tidak ada Feedback!!</h4>
                @endif
            </div>
        </div>
    </div>

    <footer class="footer text-black text-center py-3 mt-auto" style="margin-top: auto;">
        <p>© 2024 E-MonkuYanlik | Design & Develop by Kelompok 5</p>
    </footer>
@endsection
