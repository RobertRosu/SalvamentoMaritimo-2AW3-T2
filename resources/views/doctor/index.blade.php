@extends('adminlte::page')

@section('title', 'Medikuak')

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

    <section class="table-container mt-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('medikuak.create')
                    <a href="{{ route('medikuak.create') }}" class="btn btn-success">Mediku berria sortu</a>
                @endcan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
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
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $doctor->email }}</td>
                                <td>{{ $doctor->rol }}</td>
                                <td class="d-none d-md-table-cell">{{ $doctor->start_date }}</td>
                                <td>{{ $doctor->stop_date }}</td>
                                <td class="d-none d-md-table-cell">{{ $doctor->status }}</td>
                                <td>{{ $doctor->reason }}</td>
                                <td>
                                    <a href="{{ route('medikuak.show', ['medikuak' => $doctor->id]) }}" class="btn" title="Xehetasunak">
                                        <i class="fas fa-list-alt text-secondary"></i>
                                    </a>
                                    @can('medikuak.edit')
                                        <a href="{{ route('medikuak.edit', $doctor->id) }}" class="btn" title="Aldatu">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    @endcan
                                    @can('medikuak.destroy')
                                        <form action="{{ route('medikuak.destroy', $doctor->id) }}" method="POST" style="display: inline;">
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
                                <td colspan="9" class="text-center py-4">
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