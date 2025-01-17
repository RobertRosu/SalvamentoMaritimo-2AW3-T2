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

    @foreach($crew as $crew_data)
    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="{{ $crew_data['col'] }}">ID {{ str_replace(['_id', '_'], " ", $crew_data['col']) }}</label>
        <select name="{{ $crew_data['col'] }}" id="{{ $crew_data['col'] }}" class="form-control">
            <option value="{{$crew_data['current']->id}}" selected>{{$crew_data['current']->id}} - {{$crew_data['current']->name}}</option>
            @foreach($crew_data['list'] as $member)
                <option value="{{$member->id}}">{{$member->id}} - {{$member->name}}</option>
            @endforeach
        </select>
    </div>
    @endforeach

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection