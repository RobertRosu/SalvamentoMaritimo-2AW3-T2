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
    <label for="doctor_id">ID Doktorea</label>
    <input readonly type="text" class="form-control" id="doctor_id" value="{{$doctor->id}} - {{$doctor->name}}">
</div>

<div class="form-group">
    <label for="kapitaina_id">ID Kapitaina</label>
    <input readonly type="text" class="form-control" id="kapitaina_id" value="{{$captain->id}} - {{$captain->name}}">
</div>

<div class="form-group">
    <label for="makinen_arduraduna_id">ID Makinen arduraduna</label>
    <input readonly type="text" class="form-control" id="makinen_arduraduna_id" value="{{$machine_manager->id}} - {{$machine_manager->name}}">
</div>

<div class="form-group">
    <label for="mekanikoa_id">ID Mekanikoa</label>
    <input readonly type="text" class="form-control" id="mekanikoa_id" value="{{$mechanic->id}} - {{$mechanic->name}}">
</div>

<div class="form-group">
    <label for="zubiko_ofiziala_id">ID Zubiko ofiziala</label>
    <input readonly type="text" class="form-control" id="zubiko_ofiziala_id" value="{{$bridge_officer->id}} - {{$bridge_officer->name}}">
</div>

<div class="form-group">
    <label for="marinela_1_id">ID Marinela 1</label>
    <input readonly type="text" class="form-control" id="marinela_1_id" value="{{$sailor_1->id}} - {{$sailor_1->name}}">
</div>

<div class="form-group">
    <label for="marinela_2_id">ID Marinela 2</label>
    <input readonly type="text" class="form-control" id="marinela_2_id" value="{{$sailor_2->id}} - {{$sailor_2->name}}">
</div>

<div class="form-group">
    <label for="marinela_3_id">ID Marinela 3</label>
    <input readonly type="text" class="form-control" id="marinela_3_id" value="{{$sailor_3->id}} - {{$sailor_3->name}}">
</div>

<div class="form-group">
    <label for="erizaina_id">ID Erizaina</label>
    <input readonly type="text" class="form-control" id="erizaina_id" value="{{$nurse->id}} - {{$nurse->name}}">
</div>
</form>

@endsection