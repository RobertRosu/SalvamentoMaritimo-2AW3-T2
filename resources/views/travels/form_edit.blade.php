@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')
<form action="{{ route('bidaiak.update', $travel->id) }}" method="POST" enctype="multipart/form-data">
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
        <label for="origen">Irteera<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('origen') border-danger @enderror" id="origen" name="origen" value="{{ $travel->origen }}">
    </div>

    <div class="form-group">
        <label for="destino">Helmuga<span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('destino') border-danger @enderror" id="destino" name="destino" value="{{ $travel->destino }}">
    </div>

    <div class="form-group">
        <label for="description">Deskripzioa<span class="text-danger">*</span></label>
        <textarea class="form-control @error('description') border-danger @enderror" id="description" name="description">{{ $travel->description }}</textarea>
    </div>

    @foreach($crew as $crew_data)
    <div class="form-group">
        <label for="{{ $crew_data['col'] }}">ID {{ str_replace(['_id', '_'], " ", $crew_data['col']) }}<span class="text-danger">*</span></label>
        <select name="{{ $crew_data['col'] }}" id="{{ $crew_data['col'] }}" class="form-control">
            <option value="{{$crew_data['current']->id}}" selected>{{$crew_data['current']->id}} - {{$crew_data['current']->name}}</option>
            @foreach($crew_data['list'] as $member)
                <option value="{{$member->id}}">{{$member->id}} - {{$member->name}}</option>
            @endforeach
        </select>
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Aldaketak gorde</button>
    <a href="{{ route('bidaiak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>

@endsection