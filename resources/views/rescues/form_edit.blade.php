@extends('adminlte::page')

@section('title', 'Erreskateak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('erreskateak.update', $rescue->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="travel_id">ID travel</label>
        <select name="travel_id" id="travel_id" class="form-control" required>
            @foreach($travels as $travel)
                <option value="{{$travel->id}}" {{$travel->id == $rescue->travel_id ? 'selected' : ''}}>{{$travel->id}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="numero_rescatados">Erreskatatuen kopurua</label>
        <input type="number" min="1" value="{{ $rescue->numero_rescatados }}" class="form-control" id="numero_rescatados" name="numero_rescatados" required>
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="start_time">Hasiera ordua</label>
        <input type="time" value="{{ $rescue->start_time }}" class="form-control" id="start_time" name="start_time" required>
    </div>

    <div class="form-group">
        <label for="end_time">Amaiera ordua</label>
        <input type="time" value="{{ $rescue->end_time }}" class="form-control" id="end_time" name="end_time" required>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection