@extends('adminlte::page')

@section('title', 'Erreskatatuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<div class="container">
    <div class="row">
        <!-- Ezkerreko kolumna: Editable formularioa -->
        <div class="col-md-6">
            <form action="{{ route('erreskatatuak.store') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Izena -->
                <div class="form-group">
                    <label for="name">Izena<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{old('name')}}">
                </div>

                <!-- Herrialdea -->
                <div class="form-group">
                    <label for="country">Herrialdea<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('country') border-danger @enderror" id="country" name="country" value="{{old('country')}}">
                </div>

                <!-- Generoa -->
                <div class="form-group">
                    <label for="genre">Generoa<span class="text-danger">*</span></label>
                    <select name="genre" id="genre" class="form-control" value="{{old('genre')}}">
                        <option value="Gizona">Gizona</option>
                        <option value="Emakumea">Emakumea</option>
                        <option value="Beste bat">Beste bat</option>
                    </select>
                </div>

                <!-- Jaiotze Data -->
                <div class="form-group">
                    <label for="birth_date">Jaiotze Data<span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('birth_date') border-danger @enderror" id="birth_date" name="birth_date" value="{{old('birth_date')}}">
                </div>

                <!-- Diagnostikoa -->
                <div class="form-group">
                    <label for="diagnostic">Diagnostikoa</label>
                    <input type="text" class="form-control @error('diagnostic') border-danger @enderror" id="diagnostic" name="diagnostic" value="{{old('diagnostic')}}">
                </div>



        </div>

        <!-- Eskuineko zutabea -->
        <div class="col-md-6">

        <!-- Argazkia -->
        <div class="form-group">
            <label for="diagnostic">Argazkia</label><br>
            <input type="file" id="photo_src" name="photo_src">
        </div>

        <!-- Rescue ID -->
        <div class="form-group">
            <label for="rescue_id">Rescue ID<span class="text-danger">*</span></label>
            <select class="form-control @error('rescue_id') border-danger @enderror" id="rescue_id" name="rescue_id" value="{{old('rescue_id')}}">
                <option value="">Aukeratu erreskatearen ID-a</option>
                @foreach($rescues as $rescue)
                    <option value="{{ $rescue->id }}">{{ $rescue->id }}</option>
                @endforeach
            </select>
        </div>

        <!-- Doctor ID -->
        <div class="form-group">
            <label for="doctor_id">Doctor ID<span class="text-danger">*</span></label>
            <select class="form-control @error('doctor_id') border-danger @enderror" id="doctor_id" name="doctor_id" value="{{old('doctor_id')}}">
                <option value="">Aukeratu medikuaren ID-a</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->id }} - {{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        </div>
                        <!-- Aldaketa gordetzeko botoia -->
                        <button type="submit" class="btn btn-primary">Erregistro berria gorde</button>
                        <a href="{{ route('erreskatatuak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
            </form>
    </div>
</div>

@endsection