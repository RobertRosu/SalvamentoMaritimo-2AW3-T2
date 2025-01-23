@extends('adminlte::page')

@section('title', 'Langileak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('langileak.update', $crewMember->id) }}" method="POST" enctype="multipart/form-data">
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
        <input type="text" class="form-control" id="name" name="name" value="{{ $crewMember->name }}">
    </div>

    <div class="form-group">
        <label for="email">Email-a<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $crewMember->email }}">
    </div>

    <div class="form-group">
        <label for="rol">Rol-a<span class="text-danger">*</span></label>
        <select class="form-control" id="rol" name="rol">
            <option value="Marinela" {{$crewMember->rol == 'Marinela' ? 'selected' : ''}}>Marinela</option>
            <option value="Erizaina" {{$crewMember->rol == 'Erizaina' ? 'selected' : ''}}>Erizaina</option>
            <option value="Mekanikoa" {{$crewMember->rol == 'Mekanikoa' ? 'selected' : ''}}>Mekanikoa</option>
            <option value="Makinen arduraduna" {{$crewMember->rol == 'Makinen arduraduna' ? 'selected' : ''}}>Makinen arduraduna</option>
            <option value="Zubiko ofiziala" {{$crewMember->rol == 'Zubiko ofiziala' ? 'selected' : ''}}>Zubiko ofiziala</option>
            <option value="Kapitaina" {{$crewMember->rol == 'Kapitaina' ? 'selected' : ''}}>Kapitaina</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Egoera<span class="text-danger">*</span></label>
        <select class="form-control" id="status" name="status">
            <option value="Aktibo" {{$crewMember->status == 'Aktibo' ? 'selected' : ''}}>Aktibo</option>
            <option value="Inaktibo" {{$crewMember->status == 'Inaktibo' ? 'selected' : ''}}>Inaktibo</option>
            <option value="Bajan" {{$crewMember->status == 'Bajan' ? 'selected' : ''}}>Bajan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="reason">Arrazoia</label>
        <input type="text" class="form-control" id="reason" name="reason" value="{{ old('reason', $crewMember->reason ?? '') }}">
    </div>

    <div class="form-group">
        <label for="stop_date">Amaiera data</label>
        <input type="date" class="form-control" id="stop_date" name="stop_date" value="{{ \Carbon\Carbon::parse($crewMember->stop_date)->toDateString() }}">
    </div>

    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
    <a href="{{ route('langileak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection