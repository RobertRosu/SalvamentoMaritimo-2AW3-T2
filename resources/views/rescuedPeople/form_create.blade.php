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

                <!-- Izena -->
                <div class="form-group">
                    <label for="name">Izena</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Herrialdea -->
                <div class="form-group">
                    <label for="country">Herrialdea</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>

                <!-- Generoa -->
                <div class="form-group">
                    <label for="genre">Generoa</label>
                    <input type="text" class="form-control" id="genre" name="genre" required>
                </div>

                <!-- Jaiotze Data -->
                <div class="form-group">
                    <label for="birth_date">Jaiotze Data</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date"  required>
                </div>

                <!-- Diagnostikoa -->
                <div class="form-group">
                    <label for="diagnostic">Diagnostikoa</label>
                    <input type="text" class="form-control" id="diagnostic" name="diagnostic"  required>
                </div>



        </div>

        <!-- Eskuineko zutabea -->
        <div class="col-md-6">


        <!-- Rescue ID -->
        <div class="form-group">
            <label for="rescue_id">Rescue ID</label>
            <select class="form-control" id="rescue_id" name="rescue_id" required>
                <option value="">Aukeratu erreskatearen ID-a</option>
                @foreach($rescues as $rescue)
                    <option value="{{ $rescue->id }}">{{ $rescue->id }}</option>
                @endforeach
            </select>
        </div>

        <!-- Doctor ID -->
        <div class="form-group">
            <label for="doctor_id">Doctor ID</label>
            <select class="form-control" id="doctor_id" name="doctor_id" required>
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