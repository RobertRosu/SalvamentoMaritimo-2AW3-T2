@extends('adminlte::page')

@section('title', 'Medikuak')

@section('preloader')
    <div class="text-center">
        <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
        <h4 class="mt-4 text-dark">Kargatzen...</h4>
    </div>
@stop

@section('content')
    <div class="container pt-3">
        <div class="card w-75 mx-auto">
            <div class="card-header bg-dark text-white pl-2">
                <h5 class="mb-0">
                    <a href="{{ route('medikuak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Medikuaren Xehetasunak
                </h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <h6 class="font-weight-bold">Arazoak</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Izena:</h6>
                        <p>{{ $doctor->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Email-a:</h6>
                        <p>{{ $doctor->email }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Egoera:</h6>
                        <p>{{ $doctor->status }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Amaiera data:</h6>
                        <p>{{ \Carbon\Carbon::parse($doctor->stop_date)->toDateString() }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Arrazoia:</h6>
                        <p>{{ $doctor->reason }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Parte hartutako bidaiak:</h6>
                        @if($travels->isEmpty())
                            <div class="alert alert-info mt-2">
                                <i class="bi bi-info-circle mr-2"></i> Ez dago bidairik
                            </div>
                        @else
                            <ul class="list-unstyled">
                                @foreach($travels as $travel)
                                    <li>
                                        <a href="{{ route('bidaiak.show', ['bidaiak' => $travel->id]) }}">
                                            {{ $travel->start_date }} - {{ $travel->origen }} ⇒ {{ $travel->destino }} <i class="fas fa-link"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection