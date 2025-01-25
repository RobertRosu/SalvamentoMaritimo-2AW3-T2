@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <div class="text-center">
        <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
        <h4 class="mt-4 text-dark">Kargatzen...</h4>
    </div>
@stop

@section('content')
    <div class="container pt-3">
        <div class="card w-75 mx-auto">
            <div class="card-header bg-dark text-white pl-2">
                <h5 class="mb-0">
                    <a href="{{ route('bidaiak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Bidaia Berria
                </h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <h6 class="font-weight-bold">Arazoak</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bidaiak.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Bidaia Berria Gehitu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection