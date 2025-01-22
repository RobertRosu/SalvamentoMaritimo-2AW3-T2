@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('bidaiak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="origen">Irteera</label>
        <input type="text" class="form-control" id="origen" name="origen" required>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="destino">Helmuga</label>
        <input type="text" class="form-control" id="destino" name="destino" required>
    </div>

    <!-- Campo Email -->
    <div class="form-group">
        <label for="description">Deskripzioa</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Erregistro berria sortu</button>
    <a href="{{ route('bidaiak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection