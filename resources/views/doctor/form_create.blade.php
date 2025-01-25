@extends('adminlte::page')

@section('title', 'Medikuak')

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
                    <a href="{{ route('medikuak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Mediku Berria
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

                <form action="{{ route('medikuak.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Mediku Berria Gehitu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
