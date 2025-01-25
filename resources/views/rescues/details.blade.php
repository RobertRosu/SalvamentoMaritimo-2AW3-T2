@extends('adminlte::page')

@section('title', 'Erreskateak')

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
                    <a href="{{ route('erreskateak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Erreskatearen Xehetasunak
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

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Erreskatearen ID:</h6>
                        <p>{{ $rescue->id }}</p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Bidaia:</h6>
                        <a href="{{ route('bidaiak.show', ['bidaiak' => $travel->id]) }}">
                            #{{ $travel->id }} - {{ $travel->origen }} ⇒ {{ $travel->destino }}  <i class="fas fa-link"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Erreskatearen Ordua:</h6>
                        <p>{{ $rescue->start_time }} ⇒ {{ $rescue->end_time }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Erreskatatuak:</h6>
                        @if($rescuedPerson->isEmpty())
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle mr-2"></i> Ez dago erreskataturik
                            </div>
                        @else
                            <ul class="">
                                @foreach($rescuedPerson as $rp)
                                    <li>
                                        <a href="{{ route('erreskatatuak.show', ['erreskatatuak' => $rp->id]) }}">
                                           {{ $rp->name }} <i class="fas fa-link"></i>
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
@endsection