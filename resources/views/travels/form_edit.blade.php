@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('bidaiak.update', $travel->id) }}" method="POST" enctype="multipart/form-data">
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

    <!-- Campo Email -->
    <div class="form-group">
        <label for="description">Deskripzioa</label>
        <textarea class="form-control" id="description" name="description" required>{{ $travel->description }}</textarea>
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="doctor_id">ID Doktorea</label>
        <select name="doctor_id" id="doctor_id" class="form-control">
            @foreach($doctors as $doctor)
                <option value="{{$doctor->id}}" {{$doctor->id == $travel->doctor_id ? 'selected' : ''}}>{{$doctor->id}} - {{$doctor->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="kapitaina_id">ID Kapitaina</label>
        <select class="form-control" id="kapitaina_id" name="kapitaina_id">
            @foreach($captains as $captain)
                <option value="{{$captain->id}}" {{$captain->id == $travel->kapitaina_id ? 'selected' : ''}}>{{$captain->id}} - {{$captain->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="makinen_arduraduna_id">ID Makinen arduraduna</label>
        <select class="form-control" id="makinen_arduraduna_id" name="makinen_arduraduna_id">
            @foreach($machine_managers as $machine_manager)
                <option value="{{$machine_manager->id}}" {{$machine_manager->id == $travel->makinen_arduraduna_id ? 'selected' : ''}}>{{$machine_manager->id}} - {{$machine_manager->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="mekanikoa_id">ID Mekanikoa</label>
        <select class="form-control" id="mekanikoa_id" name="mekanikoa_id">
            @foreach($mechanics as $mechanic)
                <option value="{{$mechanic->id}}" {{$mechanic->id == $travel->mekanikoa_id ? 'selected' : ''}}>{{$mechanic->id}} - {{$mechanic->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="zubiko_ofiziala_id">ID Zubiko ofiziala</label>
        <select class="form-control" id="zubiko_ofiziala_id" name="zubiko_ofiziala_id">
            @foreach($bridge_officers as $bridge_officer)
                <option value="{{$bridge_officer->id}}" {{$bridge_officer->id == $travel->zubiko_ofiziala_id ? 'selected' : ''}}>{{$bridge_officer->id}} - {{$bridge_officer->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="marinela_1_id">ID Marinela 1</label>
        <select class="form-control" id="marinela_1_id" name="marinela_1_id">
            @foreach($sailors as $sailor)
                <option value="{{$sailor->id}}" {{$sailor->id == $travel->marinela_1_id ? 'selected' : ''}}>{{$sailor->id}} - {{$sailor->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="marinela_2_id">ID Marinela 2</label>
        <select class="form-control" id="marinela_2_id" name="marinela_2_id">
            @foreach($sailors as $sailor)
                <option value="{{$sailor->id}}" {{$sailor->id == $travel->marinela_2_id ? 'selected' : ''}}>{{$sailor->id}} - {{$sailor->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="marinela_3_id">ID Marinela 3</label>
        <select class="form-control" id="marinela_3_id" name="marinela_3_id">
            @foreach($sailors as $sailor)
                <option value="{{$sailor->id}}" {{$sailor->id == $travel->marinela_3_id ? 'selected' : ''}}>{{$sailor->id}} - {{$sailor->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Estado -->
    <div class="form-group">
        <label for="erizaina_id">ID Erizaina</label>
        <select class="form-control" id="erizaina_id" name="erizaina_id">
            @foreach($nurses as $nurse)
                <option value="{{$nurse->id}}" {{$nurse->id == $travel->erizaina_id ? 'selected' : ''}}>{{$nurse->id}} - {{$nurse->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection