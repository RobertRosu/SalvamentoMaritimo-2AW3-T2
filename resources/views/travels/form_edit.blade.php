@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('bidaiak.update', $travel) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="origen">Irteera</label>
        <input type="text" class="form-control" id="origen" name="origen" value="{{ $travel->origen }}" required>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="destino">Helmuga</label>
        <input type="text" class="form-control" id="destino" name="destino" value="{{ $travel->destino }}" required>
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="doctor_id">ID Doktorea</label>
        <select name="doctor_id" id="doctor_id" class="form-control">
            @foreach($doctors as $doctor)
                <option value="{{$doctor['id']}}">{{$doctor['id']}} - {{$doctor['name']}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="kapitaina_id">ID Kapitaina</label>
        <select class="form-control" id="kapitaina_id" name="kapitaina_id">
            @foreach($captains as $captain)
                <option value="{{$captain['id']}}">{{$captain['id']}} - {{$captain['name']}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="makinen_arduraduna_id">ID Makinen arduraduna</label>
        <select class="form-control" id="makinen_arduraduna_id" name="makinen_arduraduna_id">
            @foreach($machine_managers as $machine_manager)
                <option value="{{$machine_manager['id']}}">{{$machine_manager['id']}} - {{$machine_manager['name']}}</option>
            @endforeach
        </select>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection