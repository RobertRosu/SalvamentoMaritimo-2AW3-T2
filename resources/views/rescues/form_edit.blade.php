@extends('adminlte::page')

@section('title', 'Erreskateak')

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
                    <a href="{{ route('erreskateak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Erreskatea aldatu
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

                <form action="{{ route('erreskateak.update', $rescue->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="travel_id">ID travel</label>
                            <select name="travel_id" id="travel_id" class="form-control @error('travel_id') border-danger @enderror">
                                @foreach($travels as $travel)
                                    <option value="{{ $travel->id }}" {{ $travel->id == $rescue->travel_id ? 'selected' : '' }}>{{ $travel->id }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group col-6">
                            <label for="numero_rescatados">Erreskatatuen kopurua</label>
                            <input type="number" min="1" value="{{ $rescue->numero_rescatados }}" class="form-control @error('numero_rescatados') border-danger @enderror" id="numero_rescatados" name="numero_rescatados">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="start_time">Hasiera ordua</label>
                            <input type="time" value="{{ $rescue->start_time }}" class="form-control @error('start_time') border-danger @enderror" id="start_time" name="start_time">
                        </div>
    
                        <div class="form-group col-6">
                            <label for="end_time">Amaiera ordua</label>
                            <input type="time" value="{{ $rescue->end_time }}" class="form-control @error('end_time') border-danger @enderror" id="end_time" name="end_time">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection