<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Song;
use PhpParser\Node\Expr\ArrayItem;

class PostController extends Controller
{
    //Función de index
    public function index()
    {
        return view('welcome');
    }
    //Vista add
    public function add()
    {
        return view('add');
    }

    //Función para guardar los datos obtenidos en el Add
    public function store(Request $request)
    {
        //Validatos para validar los datos introducidos
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|min:1|max:255',
            'grupo' => 'required|string|min:1|max:255',
            'estilo' => 'required|string|min:1|max:255',
            'puntuacion' => 'required|numeric|min:1|max:10',
        ]);

        // Comprobar si la validación ha fallado
        if ($validator->fails()) {
            // Redirigir de vuelta con los errores de validación
            return redirect()->back()->with('error', 'Error de validacion ' . $validator->errors());
        }




        $songs = Song::all();

        foreach ($songs as $song) {
            // Convertir tanto el título y grupo del song como el del request a minúsculas
            if (strtolower($song->titulo) == strtolower($request->titulo) && strtolower($song->grupo) == strtolower($request->grupo)) {
                return redirect()->route('home')->with('error', 'La canción que intentas añadir ya existe en la base de datos');
            }
        }

        //Creamos la cancion
        Song::create([
            'titulo' => $request['titulo'],
            'grupo' => $request['grupo'],
            'estilo' => $request['estilo'],
            'puntuacion' => $request['puntuacion'],
        ]);


        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Canción agregada exitosamente!');

    }
    //Función vista update
    public function viewupdate()
    {
        $songs = Song::orderBy('puntuacion', 'desc')->get();
        return view('update', compact('songs'));
    }
    //Funcion para aplicar los cambios obtenidos en la vista del update
    public function update(Request $request, string $id)
    {
        // Buscar la canción por ID
        $song = Song::find($id);



        if (!$song) {
            return redirect()->back()->with('error', 'La canción no existe.');
        }

        // Validación
        $validator = Validator::make($request->all(), [
            'titulo' => 'nullable|string|max:255',
            'grupo' => 'nullable|string|max:255',
            'estilo' => 'nullable|string|max:255',
            'puntuacion' => 'nullable|numeric|min:1|max:10',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Error de validacion ' . $validator->errors());
        }

        // Actualizar solo los campos enviados
        $updated = false;

        if ($request->has('titulo') && $request->titulo !== $song->titulo) {
            $song->titulo = $request->titulo;
            $updated = true;
        }
        if ($request->has('grupo') && $request->grupo !== $song->grupo) {
            $song->grupo = $request->grupo;
            $updated = true;
        }
        if ($request->has('estilo') && $request->estilo !== $song->estilo) {
            $song->estilo = $request->estilo;
            $updated = true;
        }
        if ($request->has('puntuacion') && $request->puntuacion != $song->puntuacion) {
            $song->puntuacion = $request->puntuacion;
            $updated = true;
        }

        // Si no hubo cambios
        if (!$updated) {
            return redirect()->back()->with('error', 'No se detectaron cambios en los datos.');
        }

        // Guardar los cambios
        $song->save();

        return redirect()->route('home')->with('success', 'La canción se ha actualizado correctamente.');
    }
    //Funcion delete
    public function destroy(string $id)
    {
        // Buscar la canción por ID
        $song = Song::find($id);
        if (!$song) {
            return redirect()->route('home')->with('error', 'La canción no existe.');
        }

        // Eliminar la canción
        $song->delete();

        return redirect()->route('home')->with('success', 'La canción se ha eliminado correctamente.');
    }




}