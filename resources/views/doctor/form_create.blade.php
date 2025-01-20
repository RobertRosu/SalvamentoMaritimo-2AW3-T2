@extends('adminlte::page')

@section('title', 'Medikuak')

@if (!$errors->any())
@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@endif

@section('content')
<!-- Formulario de edición -->
<form action="{{ route('medikuak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="name">Izena</label>
        <input type="text" class="form-control" id="name" name="name" >
        @error('name')
            <p class="bg-danger">{{$message}}</p>
        @enderror
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="email">Email-a</label>
        <input type="email" class="form-control" id="email" name="email" >
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="stop_date">Amaiera data</label>
        <input type="date" class="form-control" id="stop_date" name="stop_date" >
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection