@extends('adminlte::page')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop


@section('content')
<div style="position: relative;">
    <iframe src="http://192.168.24.130:8080" style="width: 100%; height: calc(100vh - 63px); min-height: 300px; border: none; z-index: 1;"></iframe>
    <div style="position:absolute; width: 80px; height: 74px; background-color: #0d1b2a; top: 0; right: 0; z-index: 2;"><div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5><strong>{{ __('Saioa hasita') }}</strong></h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ongi etorri administrazio gunera!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection