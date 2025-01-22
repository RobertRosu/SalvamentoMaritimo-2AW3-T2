@extends('adminlte::page')

@section('title', 'Medikuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('medikuak.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
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

    <div class="form-group">
        <label for="name">Izena<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email-a<span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $doctor->email }}" required>
    </div>

    <div class="form-group">
        <label for="stop_date">Amaiera data<span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="stop_date" name="stop_date" value="{{ \Carbon\Carbon::parse($doctor->stop_date)->toDateString() }}" required>
    </div>

    <div class="form-group">
        <label for="status">Egoera<span class="text-danger">*</span></label>
        <select class="form-control" id="status" name="status">
            <option value="Aktibo" {{$doctor->status == 'Aktibo' ? 'selected' : ''}}>Aktibo</option>
            <option value="Inaktibo" {{$doctor->status == 'Inaktibo' ? 'selected' : ''}}>Inaktibo</option>
            <option value="Bajan" {{$doctor->status == 'Bajan' ? 'selected' : ''}}>Bajan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="reason">Arrazoia</label>
        <input type="text" class="form-control" id="reason" name="reason" value="{{ $doctor->reason }}">
    </div>

    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
    <a href="{{ route('medikuak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection