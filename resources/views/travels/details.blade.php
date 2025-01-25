@extends('adminlte::page')

@section('title', 'Bidaiak')

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
                    <a href="{{ route('bidaiak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Bidaiaren Xehetasunak
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <h6 class="font-weight-bold">Irteera:</h6>
                        <p>{{ $travel->origen }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="font-weight-bold">Helmuga:</h6>
                        <p>{{ $travel->destino }}</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="font-weight-bold">Hasiera data:</h6>
                        <p>{{ $travel->start_date }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Deskribapena:</h6>
                        <p>{{ $travel->description }}</p>
                    </div>
                </div><hr>
                <h3>Tripulazioa</h3><br>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Kapitaina:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $captain->id]) }}">{{ $captain->name }} <i class="fas fa-link"></i></a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Mekanikoa:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $mechanic->id]) }}">{{ $mechanic->name }} <i class="fas fa-link"></i></a>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Zubiko ofiziala:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $bridge_officer->id]) }}">{{ $bridge_officer->name }} <i class="fas fa-link"></i></a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Marinela 1:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $sailor_1->id]) }}">{{ $sailor_1->name }} <i class="fas fa-link"></i></a>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Makinen arduraduna:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $machine_manager->id]) }}">{{ $machine_manager->name }} <i class="fas fa-link"></i></a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Marinela 2:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $sailor_2->id]) }}">{{ $sailor_2->name }} <i class="fas fa-link"></i></a>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Doktorea:</h6>
                        <a href="{{ route('medikuak.show', ['medikuak' => $doctor->id]) }}">{{ $doctor->name }} <i class="fas fa-link"></i></a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Marinela 3:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $sailor_3->id]) }}">{{ $sailor_3->name }} <i class="fas fa-link"></i></a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Erizaina:</h6>
                        <a href="{{ route('langileak.show', ['langileak' => $nurse->id]) }}">{{ $nurse->name }} <i class="fas fa-link"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection