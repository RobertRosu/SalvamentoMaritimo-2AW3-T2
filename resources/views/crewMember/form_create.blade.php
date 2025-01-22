@extends('adminlte::page')

@section('title', 'Langileak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('langileak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

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

    <div class="form-group">
        <label for="name">Izena<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

   <div class="form-group">
        <label for="email">Email-a<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" name="email">
   </div>

    <div class="form-group">
        <label for="rol">Rol-a<span class="text-danger">*</span></label>
        <select class="form-control" id="rol" name="rol">
            <option value="Marinela">Marinela</option>
            <option value="Erizaina">Erizaina</option>
            <option value="Mekanikoa">Mekanikoa</option>
            <option value="Makinen arduraduna">Makinen arduraduna</option>
            <option value="Zubiko ofiziala">Zubiko ofiziala</option>
            <option value="Kapitaina">Kapitaina</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Erregistro berria sortu</button>
    <a href="{{ route('langileak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection