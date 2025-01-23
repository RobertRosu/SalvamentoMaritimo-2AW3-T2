@extends('adminlte::page')

@section('title', 'Erreskatatuak')

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

<section id="erreskatatuak" class="taula">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Izena</th>
                                <th class="d-none d-md-table-cell">Herrialdea</th>
                                <th>Sexua</th>
                                <th class="d-none d-md-table-cell">Jaiotze-data</th>
                                <th>Diagnostikoa</th>
                                <th><a href="{{ route('erreskatatuak.create') }}" type="button" class="btn btn-info">Erregistro berria sortu</a></th>



                            </tr>
                        </thead>
                        <tbody id="emaitzaErreskatatuak">
                            <!-- ILARAK HEMEN AGERTUKO DIRA -->


                            @forelse ($rescued_people as $rescued_person)
                            <tr>
                                <td>{{$rescued_person->id}}</td>
                                <td>{{$rescued_person->name}}</td>
                                <td>{{$rescued_person->country}}</td>
                                <td>{{$rescued_person->genre}}</td>
                                <td>{{$rescued_person->birth_date}}</td>
                                <td>{{$rescued_person->diagnostic}}</td>
                                <td>
                                <a href="{{ route('erreskatatuak.edit', ['erreskatatuak' => $rescued_person->id]) }}" class="btn btn-primary">Aldatu</a>
                                    <!-- <form action="{{ route('erreskatatuak.update', ['erreskatatuak' => $rescued_person->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Aldatu</button>
                                    </form> -->

                                    <form action="{{ route('erreskatatuak.destroy', ['erreskatatuak' => $rescued_person->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Ezabatu</button>
                                    </form>
                                </td>

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