<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;

class routeController extends Controller
{
    //Funnción Home
    function home(request $request)
    {

        $genres = Song::select('estilo')->distinct()->get(); //Obtenemos los diferentes generos de musica que hay en la BBDD''

        $songs = Song::query(); //Preparamos la query

        if ($request->has('genres') && is_array($request->genres)) {
            // Filtra por los géneros seleccionados
            $songs = $songs->whereIn('estilo', $request->genres);
        }

        $songs = $songs->orderBy('puntuacion', 'desc')->get(); //Obtenemos los datos de la query y los ordenamos



        return view('home', compact('songs', 'genres'));
    }

    function contact()
    {
        return view(view: 'contact'); //Contact
    }

    //Función de las estadisticas
    public function stats()
    {
        // Total de canciones
        $totalSongs = Song::count();

        // Generar estadísticas por género
        $genreStats = Song::selectRaw('estilo, COUNT(*) as total, AVG(puntuacion) as avg_rating')
            ->groupBy('estilo')
            ->get()
            ->map(function ($stat) {
                return [
                    'estilo' => $stat->estilo,
                    'total' => $stat->total,
                    'avg_rating' => round($stat->avg_rating, 2),
                ];
            });

        // Pasar las variables a la vista
        return view('stats', compact('totalSongs', 'genreStats'));
    }



}