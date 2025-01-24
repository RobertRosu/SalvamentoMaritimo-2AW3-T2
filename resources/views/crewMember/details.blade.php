@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')

<div class="form-group">
    <label for="name">Izena</label>
    <input readonly type="text" class="form-control" id="name" name="name" value="{{ $crewMember->name }}">
</div>

<div class="form-group">
    <label for="email">Email-a</label>
    <input readonly type="email" class="form-control" id="email" name="email" value="{{ $crewMember->email }}">
</div>

<div class="form-group">
    <label for="rol">Rola</label>
    <input readonly type="text" class="form-control" id="rol" value="{{$crewMember->rol}}">
</div>

<div class="form-group">
    <label for="start_date">Hasiera data</label>
    <input readonly type="date" class="form-control" id="start_date" value="{{$crewMember->start_date}}">
</div>

<div class="form-group">
    <label for="status">Egoera</label>
    <input readonly type="text" class="form-control" id="status" value="{{$crewMember->status}}">
</div>

<div class="form-group">
    <label for="stop_date">Amaiera data</label>
    <input readonly type="date" class="form-control" id="stop_date" value="{{$crewMember->stop_date}}">
</div>

<div class="form-group">
    <label for="reason">Arrazoia</label>
    <input readonly type="text" class="form-control" id="reason" value="{{$crewMember->reason}}">
</div>

<div class="form-group">
    <label for="travels">Egindako bidaiak</label>
    @if($travels->isEmpty())
        <div class="alert alert-info mt-3">
        <i class="bi bi-info-circle mr-2"></i>
            Ez dago bidairik
        </div>
        @else
            <ul>
                @foreach($travels as $travel)
                    <a href="{{ route('bidaiak.show', $travel->id) }}">
                        {{ $travel->origen }} - {{ $travel->destino }}
                    </a><br>
                @endforeach
            </ul>
        @endif
    </ul>
</div>

<a href="{{ route('bidaiak.index') }}" type="button" class="ml-2 btn btn-danger">Atzera</a>
</form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection