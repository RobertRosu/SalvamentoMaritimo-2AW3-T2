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

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <h2>Arazoak</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="travel_id">ID travel</label>
        <select name="travel_id" id="travel_id" class="form-control @error('travel_id') border-danger @enderror">
            @foreach($travels as $travel)
                <option value="{{$travel->id}}" {{$travel->id == $rescue->travel_id ? 'selected' : ''}}>{{$travel->id}}</option>
            @endforeach
        </select>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="numero_rescatados">Erreskatatuen kopurua</label>
        <input type="number" min="1" value="{{ $rescue->numero_rescatados }}" class="form-control @error('numero_rescatados') border-danger @enderror" id="numero_rescatados" name="numero_rescatados">
    </div>

    <!-- Campo Fecha de fin -->
    <div class="form-group">
        <label for="start_time">Hasiera ordua</label>
        <input type="time" value="{{ $rescue->start_time }}" class="form-control @error('start_time') border-danger @enderror" id="start_time" name="start_time">
    </div>

    <div class="form-group">
        <label for="end_time">Amaiera ordua</label>
        <input type="time" value="{{ $rescue->end_time }}" class="form-control @error('end_time') border-danger @enderror" id="end_time" name="end_time">
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
    <a href="{{ route('erreskateak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection