@extends('plantilla')

@section('content')
    <div class="container">
        <h1 class="text-center">Estadísticas Generales</h1>

        <!-- Mostrar el total de canciones -->
        @if($totalSongs > 0)
            <p class="text-center">Total de Canciones: <strong>{{ $totalSongs }}</strong></p>

            <!-- Tabla de estadísticas por género -->
            <h2 class="text-center mt-4">Estadísticas por Género</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Género</th>
                        <th>Total de Canciones</th>
                        <th>Puntuación Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genreStats as $stat)
                        <tr>
                            <td>{{ $stat['estilo'] }}</td>
                            <td>{{ $stat['total'] }}</td>
                            <td>{{ $stat['avg_rating'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <!-- Mostrar mensaje si no hay canciones -->
            <div class="alert alert-warning text-center mt-4">
                No hay canciones en la base de datos para mostrar estadísticas.
            </div>
        @endif
    </div>
@endsection
