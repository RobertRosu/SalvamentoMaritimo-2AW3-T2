@extends('adminlte::page')

@section('title', 'Medikuak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop

@section('content')
<section class="taula">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Izena</th>
                                <th class="d-none d-md-table-cell">Email</th>
                                <th>Rola</th>
                                <th class="d-none d-md-table-cell">Hasiera data</th>
                                <th>Amaiera data</th>
                                <th class="d-none d-md-table-cell">Egoera</th>
                                <th>Arrazoia</th>
                                <th><button type="button" class="btn btn-info">Erregistro berria sortu</button></th>



                            </tr>
                        </thead>
                        <tbody>
                            <!-- ILARAK HEMEN AGERTUKO DIRA -->


                            @forelse ($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->rol}}</td>
                                <td>{{$doctor->start_date}}</td>
                                <td>{{$doctor->stop_date}}</td>
                                <td>{{$doctor->status}}</td>
                                <td>{{$doctor->reason}}</td>
                                <td>
                                <a href="{{ route('medikuak.edit', $doctor->id) }}" class="btn btn-primary">Aldatu</a>
                                    <!-- <form action="{{ route('erreskatatuak.update', ['erreskatatuak' => $doctor->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Aldatu</button>
                                    </form> -->

                                    <form action="{{ route('medikuak.destroy', $doctor->id) }}" method="POST" style="display: inline;">
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