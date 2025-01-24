@extends('adminlte::page')

@section('title', 'Medikuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('medikuak.store') }}" method="POST" enctype="multipart/form-data">
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
        <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name">
    </div>

    <div class="form-group">
        <label for="email">Email-a<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="stop_date">Amaiera data<span class="text-danger">*</span></label>
        <input type="date" class="form-control @error('stop_date') border-danger @enderror" id="stop_date" name="stop_date">
    </div>

    <button type="submit" class="btn btn-primary">Erregistro berria sortu</button>
    <a href="{{ route('medikuak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection