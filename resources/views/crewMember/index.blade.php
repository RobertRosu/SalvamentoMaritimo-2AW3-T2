@extends('adminlte::page')

@section('title', 'Langileak')

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
<section id="langileak" class="taula">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Izena</th>
                                <th class="d-none d-md-table-cell">E-mail</th>
                                <th>Rol-a</th>
                                <th class="d-none d-md-table-cell">Hasiera-data</th>
                                <th>Egoera</th>
                                
                                <!-- Rolaren baimenen arabera botoiak ezkutatu -->
                                @can('langileak.create')
                                <th><a href="{{ route('langileak.create') }}" type="submit" class="btn btn-info">Erregistro berria sortu</a></th>
                                @endcan



                            </tr>
                        </thead>
                        <tbody id="emaitzaLangileak">
                            <!-- ILARAK HEMEN AGERTUKO DIRA -->


                            @forelse ($crew_members as $crew_member)
                            <tr>
                                <td>{{$crew_member->id}}</td>
                                <td>{{$crew_member->name}}</td>
                                <td>{{$crew_member->email}}</td>
                                <td>{{$crew_member->rol}}</td>
                                <td>{{$crew_member->start_date}}</td>
                                <td>{{$crew_member->status}}</td>

                                <!-- Rolaren baimenen arabera botoiak ezkutatu -->
                                <td>
                                <a href="{{ route('langileak.show', ['langileak' => $crew_member->id]) }}" class="btn btn-secondary">Xehetasunak</a>

                                @can('langileak.destroy')

                                <a href="{{ route('langileak.edit', ['langileak' => $crew_member->id]) }}" class="btn btn-primary">Aldatu</a>

                                    <form action="{{ route('langileak.destroy', ['langileak' => $crew_member->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Ezabatu</button>
                                    </form>
                                    @endcan

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