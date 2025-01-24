@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('bidaiak.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="origen">Irteera<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('origen') border-danger @enderror" id="origen" name="origen">
    </div>

    <div class="form-group">
        <label for="destino">Helmuga<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('destino') border-danger @enderror" id="destino" name="destino">
    </div>

    <div class="form-group">
        <label for="description">Deskripzioa<span class="text-danger">*</span></label>
        <textarea class="form-control @error('description') border-danger @enderror" id="description" name="description"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Erregistro berria sortu</button>
    <a href="{{ route('bidaiak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection