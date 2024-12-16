@extends('plantilla')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Actualizar y Eliminar Canciones</h2>

        <!-- Popup de errores -->
        @if(session('error'))
            <script>
                window.onload = function () {
                    alert("{{ session('error') }}"); // Muestra el mensaje de error en un popup
                }
            </script>
        @endif

        @if(session('success'))
            <script>
                window.onload = function () {
                    alert("{{ session('success') }}"); // Muestra el mensaje de éxito en un popup
                }
            </script>
        @endif

        <!-- Tabla para editar y eliminar las canciones -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Canción</th>
                    <th>Grupo</th>
                    <th>Estilo</th>
                    <th>Puntuación</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($songs as $song)
                    <tr>
                        <td>{{ $song->id }}</td>
                        <td>
                            <form method="POST" action="{{ route('songs.update', $song->id) }}">
                                @csrf
                                @method('POST')
                                <input 
                                    type="text" 
                                    name="titulo" 
                                    class="form-control" 
                                    value="{{ $song->titulo }}" 
                                    placeholder="Título">
                        </td>
                        <td>
                                <input 
                                    type="text" 
                                    name="grupo" 
                                    class="form-control" 
                                    value="{{ $song->grupo }}" 
                                    placeholder="Grupo">
                        </td>
                        <td>
                                <input 
                                    type="text" 
                                    name="estilo" 
                                    class="form-control" 
                                    value="{{ $song->estilo }}" 
                                    placeholder="Estilo">
                        </td>
                        <td>
                                <input 
                                    type="number" 
                                    step="0.1" 
                                    name="puntuacion" 
                                    class="form-control" 
                                    value="{{ $song->puntuacion }}" 
                                    placeholder="Puntuación">
                        </td>
                        <td>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('songs.delete', $song->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
