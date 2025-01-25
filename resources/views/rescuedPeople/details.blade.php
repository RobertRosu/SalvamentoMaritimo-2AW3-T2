@extends('adminlte::page')

@section('title', 'Erreskatatuak')

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
                    <a href="{{ route('erreskatatuak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Erreskatatuaren Xehetasunak
                </h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Argazkia:</h6>
                            @if ($rescuedPerson->photo_src)
                                <img src="{{ asset('storage/images/' . $rescuedPerson->photo_src) }}" alt="{{ $rescuedPerson->name }}" width="200">
                            @else
                                <p>Ez dago argazkirik.</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Izena:</h6>
                            <p>{{ $rescuedPerson->name }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Herrialdea:</h6>
                            <p>{{ $rescuedPerson->country }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Generoa:</h6>
                            <p>{{ $rescuedPerson->genre }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Jaiotze Data:</h6>
                            <p>{{ \Carbon\Carbon::parse($rescuedPerson->birth_date)->toDateString() }}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Diagnostikoa:</h6>
                            <p>{{ $rescuedPerson->diagnostic }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Mediku arduraduna:</h6>
                            <a href="{{ route('medikuak.show', ['medikuak' => $doctor->id]) }}">#{{ $rescuedPerson->doctor_id }} - {{ $doctor->name }} <i class="fas fa-link"></i></a>
                        </div>

                        <div class="mb-3">
                            <h6 class="font-weight-bold">Erreskatea:</h6>
                            <a href="{{ route('erreskateak.show', ['erreskateak' => $rescue->id]) }}">#{{ $rescue->id }} <i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection