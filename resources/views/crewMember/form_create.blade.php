@extends('adminlte::page')

@section('title', 'Langileak')

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
                    <a href="{{ route('langileak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Langile Berria
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

                <form action="{{ route('langileak.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="rol">Rol-a<span class="text-danger">*</span></label>
                        <select class="form-control @error('rol') border-danger @enderror" id="rol" name="rol">
                            <option value="Marinela">Marinela</option>
                            <option value="Erizaina">Erizaina</option>
                            <option value="Mekanikoa">Mekanikoa</option>
                            <option value="Makinen arduraduna">Makinen arduraduna</option>
                            <option value="Zubiko ofiziala">Zubiko ofiziala</option>
                            <option value="Kapitaina">Kapitaina</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Langile Berria Gehitu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection