@extends('adminlte::page')

@section('title', 'Medikuak')

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

    <!-- Campo Email -->
    <div class="form-group">
        <label for="email">Email-a</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $doctor->email }}" required>
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="stop_date">Amaiera data</label>
        <input type="date" class="form-control" id="stop_date" name="stop_date" value="{{ \Carbon\Carbon::parse($doctor->stop_date)->toDateString() }}" required>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="status">Egoera</label>
        <select class="form-control" id="status" name="status">
            <option value="Aktibo" {{$doctor->status == 'Aktibo' ? 'selected' : ''}}>Aktibo</option>
            <option value="Inaktibo" {{$doctor->status == 'Inaktibo' ? 'selected' : ''}}>Inaktibo</option>
            <option value="Bajan" {{$doctor->status == 'Bajan' ? 'selected' : ''}}>Bajan</option>
        </select>
    </div>

    <!-- Campo Razon -->
    <div class="form-group">
        <label for="reason">Arrazoia</label>
        <input type="text" class="form-control" id="reason" name="reason" value="{{ $doctor->reason }}">
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection