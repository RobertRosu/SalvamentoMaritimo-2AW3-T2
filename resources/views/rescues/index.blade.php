@extends('adminlte::page')

@section('title', 'Erreskateak')

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

    <section id="erreskateak" class="table-container mt-4 pt-3">
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('erreskateak.create')
                    <a href="{{ route('erreskateak.create') }}" class="btn btn-success">Erreskate berria sortu</a>
                @endcan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Bidaia(ID)</th>
                            <th class="d-none d-md-table-cell">Erreskatatu kopurua</th>
                            <th>Hasiera</th>
                            <th>Amaiera</th>
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody id="emaitzaErreskateak">
                        @forelse ($rescues as $rescue)
                            <tr>
                                <td>{{ $rescue->id }}</td>
                                <td>{{ $rescue->travel_id }}</td>
                                <td class="d-none d-md-table-cell">{{ $rescue->numero_rescatados }}</td>
                                <td>{{ $rescue->start_time }}</td>
                                <td>{{ $rescue->end_time }}</td>
                                <td>
                                    <a href="{{ route('erreskateak.show', ['erreskateak' => $rescue->id]) }}" class="btn" title="Xehetasunak">
                                        <i class="fas fa-list-alt text-secondary"></i>
                                    </a>
                                    @can('erreskateak.edit')
                                        <a href="{{ route('erreskateak.edit', $rescue->id) }}" class="btn" title="Aldatu">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    @endcan
                                    @can('erreskateak.destroy')
                                        <form action="{{ route('erreskateak.destroy', ['erreskateak' => $rescue->id]) }}" method="POST" style="display: inline;">
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
                                <td colspan="6" class="text-center py-4">
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
