@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop
@section('content')

<div class="form-group">
    <label for="origen">Irteera</label>
    <input readonly type="text" class="form-control" id="origen" name="origen" value="{{ $travel->origen }}">
</div>

<div class="form-group">
    <label for="destino">Helmuga</label>
    <input readonly type="text" class="form-control" id="destino" name="destino" value="{{ $travel->destino }}">
</div>

<div class="form-group">
    <label for="start_date">Hasiera data</label>
    <input readonly type="text" class="form-control" id="start_date" value="{{$travel->start_date}}">
</div>

<div class="form-group">
    <label for="description">Deskribapena</label>
    <textarea readonly type="text" class="form-control" id="description">{{$travel->description}}</textarea>
</div>

<div class="form-group">
    <label for="doctor_id">Doktorea</label><br>
    <a href="{{ route('medikuak.show' , ['medikuak' => $doctor->id]) }}">{{$doctor->name}}</a>
</div>

<div class="form-group">
    <label for="kapitaina_id">Kapitaina</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $captain->id]) }}">{{$captain->name}}</a>
</div>

<div class="form-group">
    <label for="makinen_arduraduna_id">Makinen arduraduna</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $machine_manager->id]) }}">{{$machine_manager->name}}</a>
</div>

<div class="form-group">
    <label for="mekanikoa_id">Mekanikoa</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $mechanic->id]) }}">{{$mechanic->name}}</a>
</div>

<div class="form-group">
    <label for="zubiko_ofiziala_id">Zubiko ofiziala</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $bridge_officer->id]) }}">{{$bridge_officer->name}}</a>
</div>

<div class="form-group">
    <label for="marinela_1_id">Marinela 1</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $sailor_1->id]) }}">{{$sailor_1->name}}</a>
</div>

<div class="form-group">
    <label for="marinela_2_id">Marinela 2</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $sailor_2->id]) }}">{{$sailor_2->name}}</a>
</div>

<div class="form-group">
    <label for="marinela_3_id">Marinela 3</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $sailor_3->id]) }}">{{$sailor_3->name}}</a>
</div>

<div class="form-group">
    <label for="erizaina_id">Erizaina</label><br>
    <a href="{{ route('langileak.show' , ['langileak' => $nurse->id]) }}">{{$nurse->name}}</a>
</div>
<a href="{{ route('bidaiak.index') }}" type="button" class="btn btn-danger">Atzera</a>
</form>

@endsection