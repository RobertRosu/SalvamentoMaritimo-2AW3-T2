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
            <form action="{{ route('erreskatatuak.update', $rescuedPerson->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ $rescuedPerson->name }}">
                </div>

                <!-- Herrialdea -->
                <div class="form-group">
                    <label for="country">Herrialdea<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('country') border-danger @enderror" id="country" name="country" value="{{ $rescuedPerson->country }}">
                </div>

                <!-- Generoa -->
                <div class="form-group">
                    <label for="genre">Generoa<span class="text-danger">*</span></label>
                    <select name="genre" id="genre" class="form-control @error('genre') border-danger @enderror">
                        <option value="Gizona" {{$rescuedPerson->genre == 'Gizona' ? 'selected' : ''}}>Gizona</option>
                        <option value="Emakumea" {{$rescuedPerson->genre == 'Emakumea' ? 'selected' : ''}}>Emakumea</option>
                        <option value="Beste bat" {{$rescuedPerson->genre == 'Beste bat' ? 'selected' : ''}}>Beste bat</option>
                    </select>
                </div>

                <!-- Jaiotze Data -->
                <div class="form-group">
                    <label for="birth_date">Jaiotze Data</label>
                    <input type="date" class="form-control @error('birth_date') border-danger @enderror" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($rescuedPerson->birth_date)->toDateString() }}">
                </div>

                <!-- Diagnostikoa -->
                <div class="form-group">
                    <label for="diagnostic">Diagnostikoa</label>
                    <input type="text" class="form-control @error('diagnostic') border-danger @enderror" id="diagnostic" name="diagnostic" value="{{ $rescuedPerson->diagnostic }}">
                </div>



            </div>

            <!-- Eskuineko zutabea: Irudi eta atributuak ikusteko (ezin dira aldatu) -->
            <div class="col-md-6">

            <!-- argazkia -->
            <div class="form-group">
                <label for="photo">Argazkia</label><br>
                @if ($rescuedPerson->photo_src)
                <img src="{{ asset('storage/images/' . $rescuedPerson->photo_src) }}" alt="{{ $rescuedPerson->name }}" width="200">
                    <!-- <img id="photo-preview" src="{{ $rescuedPerson->photo_src }}" alt="argazkia" width="200"> -->
                @else
                    <p>Ez dago argazkirik.</p>
                @endif
            </div>
            <!-- Argazkia SRC (Aldatu daiteke) -->
            <div class="form-group">
                <label for="photo_src">Argazkia</label>
                <input type="file" id="photo_src" name="photo_src">
                <!-- <input type="text" class="form-control" id="photo_src" name="photo_src" value="{{ $rescuedPerson->photo_src }}"> -->
            </div>

            <!-- Rescue ID (Ez aldagarria) -->
            <div class="form-group">
                <label for="rescue_id">Rescue ID<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('rescue_id') border-danger @enderror" id="rescue_id" name="rescue_id" value="{{ $rescuedPerson->rescue_id }}" readonly>
            </div>

            <!-- Doctor ID (Ez aldagarria) -->
            <div class="form-group">
                <label for="doctor_id">Doctor ID<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('doctor_id') border-danger @enderror" id="doctor_id" name="doctor_id" value="{{ $rescuedPerson->doctor_id }}" readonly>
            </div>
        </div>
                        <!-- Aldaketa gordetzeko botoia -->
                        <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
                        <a href="{{ route('erreskatatuak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
            </form>
    </div>
</div>

@endsection