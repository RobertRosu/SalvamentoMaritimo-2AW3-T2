@extends('adminlte::page')

@section('title', 'Erreskatatuak')

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
                    <a href="{{ route('erreskatatuak.index') }}" class="btn btn-secondary rounded-pill">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    &nbsp;&nbsp;Erreskatatu Editatu
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('erreskatatuak.update', $rescuedPerson->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="photo">Argazkia</label><br>
                                @if ($rescuedPerson->photo_src)
                                    <img src="{{ asset('storage/app/public/images/' . old('photo', $rescuedPerson->photo_src)) }}" alt="{{ old('name', $rescuedPerson->name) }}" width="200">
                                @else
                                    <p>Ez dago argazkirik.</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="photo_src">Aukeratu argazkia</label>
                                <input class="form-control p-0 border-0" type="file" id="photo_src" name="photo_src" style="font-size: 12px;" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Izena<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name', $rescuedPerson->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="country">Herrialdea<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('country') border-danger @enderror" id="country" name="country" value="{{ old('country', $rescuedPerson->country) }}">
                            </div>

                            <div class="form-group">
                                <label for="genre">Generoa<span class="text-danger">*</span></label>
                                <select name="genre" id="genre" class="form-control @error('genre') border-danger @enderror">
                                    <option value="Gizona" {{ old('genre', $rescuedPerson->genre) == 'Gizona' ? 'selected' : '' }}>Gizona</option>
                                    <option value="Emakumea" {{ old('genre', $rescuedPerson->genre) == 'Emakumea' ? 'selected' : '' }}>Emakumea</option>
                                    <option value="Beste bat" {{ old('genre', $rescuedPerson->genre) == 'Beste bat' ? 'selected' : '' }}>Beste bat</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Jaiotze Data</label>
                                <input type="date" class="form-control @error('birth_date') border-danger @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', \Carbon\Carbon::parse($rescuedPerson->birth_date)->toDateString()) }}">
                            </div>

                            <div class="form-group">
                                <label for="diagnostic">Diagnostikoa</label>
                                <input type="text" class="form-control @error('diagnostic') border-danger @enderror" id="diagnostic" name="diagnostic" value="{{ old('diagnostic', $rescuedPerson->diagnostic) }}">
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="rescue_id">Rescue ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('rescue_id') border-danger @enderror" id="rescue_id" name="rescue_id" value="{{ $rescuedPerson->rescue_id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="doctor_id">Doctor ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('doctor_id') border-danger @enderror" id="doctor_id" name="doctor_id" value="{{ $rescuedPerson->doctor_id }}" readonly>
                            </div>
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
