@extends('adminlte::page')

@section('title', 'Erreskatatuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('medikuak.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="name">Izena</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
    </div>

    <!-- Campo País -->
    <div class="form-group">
        <label for="country">Herrialdea</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ $doctor->country }}" required>
    </div>

    <!-- Campo Género -->
    <div class="form-group">
        <label for="genre">Sexua</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ $doctor->genre }}" required>
    </div>

    <!-- Campo Fecha de nacimiento -->
    <div class="form-group">
        <label for="birth_date">Jaiotze-data</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($doctor->birth_date)->toDateString() }}" required>
        </div>

    <!-- Campo Diagnóstico -->
    <div class="form-group">
        <label for="diagnostic">Diagnostikoa</label>
        <input type="text" class="form-control" id="diagnostic" name="diagnostic" value="{{ $doctor->diagnostic }}" required>
    </div>

    <!-- Campo Foto -->
    <div class="form-group">
        <label for="photo_src">Argazkia</label>
        <input type="file" class="form-control-file" id="photo_src" name="photo_src">
        @if ($doctor->photo_src)
            <img src="{{ asset('storage/' . $doctor->photo_src) }}" alt="Foto actual" width="100">
        @endif
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection