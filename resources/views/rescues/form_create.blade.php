@extends('adminlte::page')

@section('title', 'Erreskateak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('erreskateak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="travel_id">ID travel</label>
        <select name="travel_id" id="travel_id" class="form-control" required>
            <option value="0" selected>-- Bidaia id bat aukeratu --</option>
            @foreach($travels as $travel)
                <option value="{{$travel->id}}">{{$travel->id}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="numero_rescatados">Erreskatatuen kopurua</label>
        <input type="number" min="1" value="1" class="form-control" id="numero_rescatados" name="numero_rescatados" required>
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="start_time">Hasiera ordua</label>
        <input type="time" class="form-control" id="start_time" name="start_time" required>
    </div>

    <div class="form-group">
        <label for="end_time">Amaiera ordua</label>
        <input type="time" class="form-control" id="end_time" name="end_time" required>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
</form>

@endsection