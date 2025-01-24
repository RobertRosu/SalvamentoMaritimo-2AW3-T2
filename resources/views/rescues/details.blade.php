@extends('adminlte::page')

@section('title', 'Erreskateak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop

@section('content')

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

<div class="form-group">
    <h3 for="origen">Erreskatearen ID</h3>
    <h5>{{ $rescue->id }}</h5>
</div>

<div class="form-group">
    <h3 for="origen">Bidaia</h3>
    <a href="{{ route('bidaiak.show' , ['bidaiak' => $travel->id]) }}">#{{ $travel->id }} - {{ $travel->origen }} ⇒ {{ $travel->destino }}</a>
</div>


<div class="form-group">
    <h3>Erreskatearen hordua</h3>
    <h5>{{ $rescue->start_time }} ⇒ {{ $rescue->end_time }}</h5>
</div>

<div class="form-group">
    <h3>Erreskatatuak</h3>
    <ul>
        @foreach( $rescuedPerson as $rp )
        <li><a href="{{ route('erreskatatuak.show' , ['erreskatatuak' => $rp->id]) }}">{{ $rp->name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection