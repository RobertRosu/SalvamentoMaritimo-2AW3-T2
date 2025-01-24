@extends('adminlte::page')

@section('title', 'Erreskatatuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <!-- Ezkerreko kolumna: Editable formularioa -->
        <div class="col-md-6">
            <form action="" method="POST" enctype="multipart/form-data">
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
                    <label for="name">Izena</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $rescuedPerson->name }}" readonly>
                </div>

                <!-- Herrialdea -->
                <div class="form-group">
                    <label for="country">Herrialdea</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ $rescuedPerson->country }}" readonly>
                </div>

                <!-- Generoa -->
                <div class="form-group">
                    <label for="genre">Generoa</label>
                    <select name="genre" id="genre" class="form-control" readonly>
                        <option value="Gizona" {{$rescuedPerson->genre == 'Gizona' ? 'selected' : ''}}>Gizona</option>
                        <option value="Emakumea" {{$rescuedPerson->genre == 'Emakumea' ? 'selected' : ''}}>Emakumea</option>
                        <option value="Beste bat" {{$rescuedPerson->genre == 'Beste bat' ? 'selected' : ''}}>Beste bat</option>
                    </select>
                </div>

                <!-- Jaiotze Data -->
                <div class="form-group">
                    <label for="birth_date">Jaiotze Data</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($rescuedPerson->birth_date)->toDateString() }}" readonly>
                </div>

                <!-- Diagnostikoa -->
                <div class="form-group">
                    <label for="diagnostic">Diagnostikoa</label>
                    <input type="text" class="form-control" id="diagnostic" name="diagnostic" value="{{ $rescuedPerson->diagnostic }}" readonly>
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


            <!-- Rescue ID (Ez aldagarria) -->
            <div class="form-group">
                <label for="rescue_id">Rescue ID</label>
                <input type="text" class="form-control" id="rescue_id" name="rescue_id" value="{{ $rescuedPerson->rescue_id }}" readonly>
            </div>

            <!-- Doctor ID (Ez aldagarria) -->
            <div class="form-group">
                <label for="doctor_id">Doctor ID</label>
                <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ $rescuedPerson->doctor_id }}" readonly>
            </div>
            <div class="form-group">
                <h3>Mediku arduraduna:</h3>
                <a href="{{ route('medikuak.show' , ['medikuak' => $doctor->id]) }}">{{$doctor->name}}</a>
            </div>
            <div class="form-group">
                <h3>Erreskatea:</h3>
                <a href="{{ route('erreskateak.show' , ['erreskateak' => $rescue->id]) }}">#{{$rescue->id}}</a>
            </div>
        </div>
                        <!-- Aldaketa gordetzeko botoia -->
                        <a href="{{ route('erreskatatuak.index') }}" type="button" class="btn btn-danger">Atzera</a>
            </form>
    </div>
</div>

@endsection