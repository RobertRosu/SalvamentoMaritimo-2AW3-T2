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
                    &nbsp;&nbsp;Medikua aldatu
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

                <form action="{{ route('medikuak.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Izena<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name', $doctor->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email-a<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email" value="{{ old('email', $doctor->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="stop_date">Amaiera data<span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('stop_date') border-danger @enderror" id="stop_date" name="stop_date" value="{{ old('stop_date', \Carbon\Carbon::parse($doctor->stop_date)->toDateString()) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Egoera<span class="text-danger">*</span></label>
                        <select class="form-control @error('status') border-danger @enderror" id="status" name="status">
                            <option value="Aktibo" {{ old('status', $doctor->status) == 'Aktibo' ? 'selected' : '' }}>Aktibo</option>
                            <option value="Inaktibo" {{ old('status', $doctor->status) == 'Inaktibo' ? 'selected' : '' }}>Inaktibo</option>
                            <option value="Bajan" {{ old('status', $doctor->status) == 'Bajan' ? 'selected' : '' }}>Bajan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reason">Arrazoia</label>
                        <input type="text" class="form-control @error('reason') border-danger @enderror" id="reason" name="reason" value="{{ old('reason', $doctor->reason) }}">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection