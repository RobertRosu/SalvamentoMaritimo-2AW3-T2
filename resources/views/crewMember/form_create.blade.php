@extends('adminlte::page')

@section('title', 'Langileak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<!-- Formulario de edición -->
<form action="{{ route('langileak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <!-- Campo Nombre -->
    <div class="form-group">
        <label for="name">Izena</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

   <!-- Campo Email -->
   <div class="form-group">
        <label for="email">Email-a</label>
        <input type="email" class="form-control" id="email" name="email" required>
   </div>

   <!-- Campo Estado -->
    <div class="form-group">
        <label for="rol">Rol-a</label>
        <select class="form-control" id="rol" name="rol" required>
            <option value="Marinela">Marinela</option>
            <option value="Erizaina">Erizaina</option>
            <option value="Mekanikoa">Mekanikoa</option>
            <option value="Makinen arduraduna">Makinen arduraduna</option>
            <option value="Zubiko ofiziala">Zubiko ofiziala</option>
            <option value="Kapitaina">Kapitaina</option>
        </select>
    </div>

    <!-- Botón para enviar el formulario y guardar los cambios -->
    <button type="submit" class="btn btn-primary">Erregistro berria sortu</button>
    <a href="{{ route('langileak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection