@extends('adminlte::page')

@section('title', 'Erreskatatuak')

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

    <section id="erreskatatuak" class="table-container mt-4 pt-3">
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('erreskatatuak.create')
                    <a href="{{ route('erreskatatuak.create') }}" class="btn btn-success">Erreskatatu berria sortu</a>
                @endcan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Izena</th>
                            <th class="d-none d-md-table-cell">Herrialdea</th>
                            <th>Sexua</th>
                            <th class="d-none d-md-table-cell">Jaiotze-data</th>
                            <th>Diagnostikoa</th>
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody id="emaitzaErreskatatuak">
                        @forelse ($rescued_people as $rescued_person)
                            <tr>
                                <td>{{ $rescued_person->id }}</td>
                                <td>{{ $rescued_person->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $rescued_person->country }}</td>
                                <td>{{ $rescued_person->genre }}</td>
                                <td class="d-none d-md-table-cell">{{ $rescued_person->birth_date }}</td>
                                <td>{{ $rescued_person->diagnostic }}</td>
                                <td>
                                    <a href="{{ route('erreskatatuak.show', ['erreskatatuak' => $rescued_person->id]) }}" class="btn" title="Xehetasunak">
                                        <i class="fas fa-list-alt text-secondary"></i>
                                    </a>
                                    @can('erreskatatuak.edit')
                                        <a href="{{ route('erreskatatuak.edit', ['erreskatatuak' => $rescued_person->id]) }}" class="btn" title="Aldatu">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    @endcan
                                    @can('erreskatatuak.destroy')
                                        <form action="{{ route('erreskatatuak.destroy', ['erreskatatuak' => $rescued_person->id]) }}" method="POST" style="display: inline;">
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
