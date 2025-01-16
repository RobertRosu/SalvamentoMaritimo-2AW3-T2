@extends('adminlte::page')

@section('title', 'Bidaiak')

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Kargatzen...</h4>
@stop

@section('content')
<section id="bidaiak" class="taula">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Irteera</th>
                                <th class="d-none d-md-table-cell">Helmuga</th>
                                <th>Data</th>
                                <th><a href="{{ route('bidaiak.create') }}" type="button" class="btn btn-info">Erregistro berria sortu</a></th>



                            </tr>
                        </thead>
                        <tbody id="emaitzaBidaiak">
                            <!-- ILARAK HEMEN AGERTUKO DIRA -->


                            @forelse ($travels as $travel)
                            <tr>
                                <td>{{$travel->id}}</td>
                                <td>{{$travel->origen}}</td>
                                <td>{{$travel->destino}}</td>
                                <td>{{$travel->start_date}}</td>
                                <td>
                                <a href="{{ route('bidaiak.show', ['bidaiak' => $travel->id]) }}" class="btn btn-secondary">Xehetasunak</a>

                                <a href="{{ route('bidaiak.edit', $travel) }}" class="btn btn-primary">Aldatu</a>

                                    <form action="{{ route('bidaiak.destroy', ['bidaiak' => $travel->id]) }}" method="POST" style="display: inline;">
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