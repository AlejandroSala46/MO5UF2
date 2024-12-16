@extends('plantilla')

@section('content')
    <div class="container">
        <h1 class="text-center">Lista de Canciones</h1>

        <!-- Filtro por géneros -->
        <div class="row">
            <div class="col-md-4">
                <h3>Filtrar por Géneros</h3>
                <form id="filter-form" method="GET" action="{{ route('home') }}">
                    <div class="form-group">
                        @if($genres) 
                            <div class="checkbox-group">
                                @foreach($genres as $genre)
                                    <!-- Aseguramos que $genre no sea null -->
                                    <label class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->estilo }}" 
                                               @if(in_array($genre->estilo, request()->get('genres', []))) checked @endif>
                                        {{ $genre->estilo }}
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                </form>
            </div>

            <!-- Lista de Canciones -->
            <div class="col-md-8">
                @if($songs->isNotEmpty())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Grupo</th>
                                <th>Estilo</th>
                                <th>Puntuación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($songs as $song)
                                <tr>
                                    <td>{{ $song->id }}</td>
                                    <td>{{ $song->titulo }}</td>
                                    <td>{{ $song->grupo }}</td>
                                    <td>{{ $song->estilo }}</td>
                                    <td>{{ $song->puntuacion }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No hay canciones disponibles.</p>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Estilo para los checkboxes en línea */
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
        }

        /* Estilo para los checkboxes */
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
        }

        /* Estilo para la tabla */
        table {
            width: 100%;
            border-collapse: collapse; /* Asegura que las celdas tengan bordes compartidos */
        }

        table, th, td {
            border: 1px solid black;  /* Bordes de la tabla y celdas */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        
    </style>
    @if(session('error'))
        <script>
            window.onload = function() {
                alert("{{ session('error') }}"); // Muestra el mensaje de error en un popup
            }
        </script>
    @elseif(session('success'))
        <script>
            window.onload = function() {
                alert("{{ session('success') }}"); // Muestra el mensaje de error en un popup
            }
        </script>
    @endif
@endsection
