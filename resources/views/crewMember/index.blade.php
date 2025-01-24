@extends('adminlte::page')

@section('title', 'Langileak')

@section('preloader')
    <div class="text-center">
        <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
        <h4 class="mt-4 text-dark">Kargatzen...</h4>
    </div>
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

    <section id="langileak" class="table-container mt-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('langileak.create')
                    <a href="{{ route('langileak.create') }}" class="btn btn-success">Langile berria sortu</a>
                @endcan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Izena</th>
                            <th class="d-none d-md-table-cell">E-mail</th>
                            <th>Rol-a</th>
                            <th class="d-none d-md-table-cell">Hasiera-data</th>
                            <th>Egoera</th>
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody id="emaitzaLangileak">
                        @forelse ($crew_members as $crew_member)
                            <tr>
                                <td>{{ $crew_member->id }}</td>
                                <td>{{ $crew_member->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $crew_member->email }}</td>
                                <td>{{ $crew_member->rol }}</td>
                                <td class="d-none d-md-table-cell">{{ $crew_member->start_date }}</td>
                                <td>{{ $crew_member->status }}</td>
                                <td>
                                    <!-- Botón de detalles con icono -->
                                    <a href="{{ route('langileak.show', ['langileak' => $crew_member->id]) }}" class="btn" title="Xehetasunak">
                                        <i class="fas fa-list-alt text-secondary"></i>
                                    </a>
                                
                                    <!-- Botón de editar con icono -->
                                    @can('langileak.edit')
                                        <a href="{{ route('langileak.edit', ['langileak' => $crew_member->id]) }}" class="btn" title="Aldatu">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    @endcan
                                
                                    <!-- Botón de eliminar con icono -->
                                    @can('langileak.destroy')
                                        <form action="{{ route('langileak.destroy', ['langileak' => $crew_member->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" onclick="return confirm('Ezabatu nahi duzu?');" title="Ezabatu">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="alert alert-warning mb-0">{{ __("Ez dago erregistrorik.") }}</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
