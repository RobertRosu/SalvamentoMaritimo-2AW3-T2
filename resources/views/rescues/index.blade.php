@extends('adminlte::page')

@section('title', 'Erreskateak')

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

<section id="erreskateak" class="taula">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Bidaia(ID)</th>
                                <th class="d-none d-md-table-cell">Erreskatatu kopurua</th>
                                <th>Hasiera</th>
                                <th>Amaiera</th>
                                <!-- Rolaren baimenen arabera botoiak ezkutatu -->
                                @can('erreskateak.create')
                                <th><a href="{{route('erreskateak.create')}}" class="btn btn-info">Erregistro berria sortu</a></th>
                                @endcan


                            </tr>
                        </thead>
                        <tbody id="emaitzaErreskateak">
                            <!-- ILARAK HEMEN AGERTUKO DIRA -->


                            @forelse ($rescues as $rescue)
                            <tr>
                                <td>{{$rescue->id}}</td>
                                <td>{{$rescue->travel_id}}</td>
                                <td>{{$rescue->numero_rescatados}}</td>
                                <td>{{$rescue->start_time}}</td>
                                <td>{{$rescue->end_time}}</td>
                                <!-- Rolaren baimenen arabera botoiak ezkutatu -->
                                @can('erreskateak.destroy')
                                <td>
                                <a href="{{ route('erreskateak.edit', $rescue->id) }}" class="btn btn-primary">Aldatu</a>

                                    <form action="{{ route('erreskateak.destroy', ['erreskateak' => $rescue->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Ezabatu</button>
                                    </form>
                                </td>
                                @endcan

                            </tr>
                            @empty
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            {{ __("No hay registros.") }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </section>

@endsection