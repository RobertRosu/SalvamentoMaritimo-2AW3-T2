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

    <style>
        /* Aseguramos que todo el viewport sea accesible */
        html, body {
            height: 100%; /* Elimina restricciones de altura */
            margin: 0;   /* Elimina márgenes */
        }

        #bidaiak {
            display: flex;
            flex-direction: column;
            height: calc(100vh - 57px); /* Ocupa toda la pantalla */
        }

        .card {
            display: flex;
            flex-direction: column;
            flex: 1; /* Asegura que ocupe el espacio restante */
            overflow: hidden; /* Evita scroll en el contenedor */
        }

        .row {
            display: flex;
            flex: 1; /* Ocupa el resto del espacio del contenedor */
            overflow: hidden; /* Asegura que las columnas no se desplacen juntas */
        }

        .col-xl-8, .col-xl-4 {
            height: 100%; /* Cada columna ocupa el 100% del espacio */
            overflow-y: auto; /* Habilita scroll independiente */
        }

        .col-8 {
            flex: 2; /* Columna más grande */
        }

        .col-4 {
            flex: 1; /* Columna más pequeña */
        }
    </style>

    <section id="bidaiak" class="table-container mt-4 pt-3">
        <div class="card">
            <!-- Header -->
            <div class="card-header bg-dark text-white d-flex justify-content-end align-items-center">
                @can('bidaiak.create')
                    <a href="{{ route('bidaiak.create') }}" class="btn btn-success">Bidai berria sortu</a>
                @endcan
            </div>

            <!-- Contenido -->
            <div class="row">
                <!-- Tabla -->
                <div class="col-12 col-xl-8">
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
                                                <a href="{{ route('bidaiak.edit', $travel->id) }}" class="btn" title="Aldatu">
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

                <!-- Timeline -->
                <div class="col-12 col-xl-4 d-none d-lg-block">
                    <h3 class="mt-3">Denbora-lerroa</h3><hr>
                    <div class="timeline mt-4">
                        <div class="time-label">
                          <span class="bg-green">Orain</span>
                        </div>
                        @forelse ($travels->sortByDesc('start_date') as $travel)
                            <div>
                                <i class="fas fa-clock bg-navy"></i>
                                <div class="timeline-item shadow">
                                    <span class="time"><i class="fas fa-clock"></i> {{ $travel->start_date }}</span>
                                    <h3 class="timeline-header">{{ $travel->origen }} ⇒ {{ $travel->destino }}</h3>
                                    <div class="timeline-body">
                                        {{ $travel->description }}
                                    </div>
                                    <div class="timeline-footer d-flex justify-content-end">
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
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <div>
                            <i class="far fa-arrow-alt-circle-up bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
