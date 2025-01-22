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

                <!-- Izena -->
                <div class="form-group">
                    <label for="name">Izena</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $rescuedPerson->name }}" required>
                </div>

                <!-- Herrialdea -->
                <div class="form-group">
                    <label for="country">Herrialdea</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ $rescuedPerson->country }}" required>
                </div>

                <!-- Generoa -->
                <div class="form-group">
                    <label for="genre">Generoa</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ $rescuedPerson->genre }}" required>
                </div>

                <!-- Jaiotze Data -->
                <div class="form-group">
                    <label for="birth_date">Jaiotze Data</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($rescuedPerson->birth_date)->toDateString() }}" required>
                </div>

                <!-- Diagnostikoa -->
                <div class="form-group">
                    <label for="diagnostic">Diagnostikoa</label>
                    <input type="text" class="form-control" id="diagnostic" name="diagnostic" value="{{ $rescuedPerson->diagnostic }}" required>
                </div>



        </div>

        <!-- Eskuineko zutabea: Irudi eta atributuak ikusteko (ezin dira aldatu) -->
        <div class="col-md-6">
<!-- argazkia -->
<div class="form-group">
    <label for="photo">Argazkia</label><br>
    @if ($rescuedPerson->photo_src)
        <img id="photo-preview" src="{{ $rescuedPerson->photo_src }}" alt="argazkia" width="200">
    @else
        <p>Ez dago argazkirik.</p>
    @endif
</div>
        <!-- Argazkia SRC (Aldatu daiteke) -->
        <div class="form-group">
            <label for="photo_src">Argazkia (URL)</label>
            <input type="text" class="form-control" id="photo_src" name="photo_src" value="{{ $rescuedPerson->photo_src }}">
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
        </div>
                        <!-- Aldaketa gordetzeko botoia -->
                        <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
                        <a href="{{ route('erreskatatuak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
            </form>
    </div>
</div>
<script>
    // Accede a los elementos de la imagen y del campo de entrada
    const photoInput = document.getElementById('photo_src');
    const photoPreview = document.getElementById('photo-preview');
    
    // Actualiza la src de la imagen cuando el usuario cambia el valor del input
    photoInput.addEventListener('input', function() {
        photoPreview.src = photoInput.value;
    });
</script>

@endsection