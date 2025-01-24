@extends('adminlte::page')

@section('title', 'Bidaiak')

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

    <section id="bidaiak" class="table-container mt-4 pt-3">
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('bidaiak.create')
                    <a href="{{ route('bidaiak.create') }}" class="btn btn-success">Bidai berria sortu</a>
                @endcan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Irteera</th>
                            <th class="d-none d-md-table-cell">Helmuga</th>
                            <th>Data</th>
                            <th>Ekintzak</th>
                        </tr>
                    </thead>
                    <tbody id="emaitzaBidaiak">
                        @forelse ($travels as $travel)
                            <tr>
                                <td>{{ $travel->id }}</td>
                                <td>{{ $travel->origen }}</td>
                                <td class="d-none d-md-table-cell">{{ $travel->destino }}</td>
                                <td>{{ $travel->start_date }}</td>
                                <td>
                                    <a href="{{ route('bidaiak.show', ['bidaiak' => $travel->id]) }}" class="btn" title="Xehetasunak">
                                        <i class="fas fa-list-alt text-secondary"></i>
                                    </a>
                                    @can('bidaiak.edit')
                                        <a href="{{ route('bidaiak.edit', $travel) }}" class="btn" title="Aldatu">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>
                                    @endcan
                                    @can('bidaiak.destroy')
                                        <form action="{{ route('bidaiak.destroy', ['bidaiak' => $travel->id]) }}" method="POST" style="display: inline;">
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
                                <td colspan="5" class="text-center py-4">
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
