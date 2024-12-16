@extends('plantilla')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Añadir Canción</h2>

    <!-- Popup de errores -->
    @if(session('error'))
        <script>
            window.onload = function () {
                alert("{{ session('error') }}"); // Muestra el mensaje de error en un popup
            }
        </script>
    @endif


    <!-- Formulario para añadir una canción -->
    <form action="{{ route('songs.store') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Canción</th>
                    <th>Grupo</th>
                    <th>Estilo</th>
                    <th>Puntuación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="titulo" class="form-control" placeholder="Título de la canción"
                            required>
                    </td>
                    <td>
                        <input type="text" name="grupo" class="form-control" placeholder="Grupo o artista" required>
                    </td>
                    <td>
                        <input type="text" name="estilo" class="form-control" placeholder="Estilo o género" required>
                    </td>
                    <td>
                        <input type="number" step="0.1" name="puntuacion" class="form-control"
                            placeholder="Puntuación (0-10)" required>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para añadir -->
        <div class="text-end">
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>




</div>
@endsection