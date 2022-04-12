<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //solo l'index accessibile da front
    {
        //Prendo tutti i post e associo le categorie al codice riportato nel post
        $posts = Post::with(['category'])->get();

        $posts = Post::paginate(3);

        //Response crea una risposta
        //json ritorna un file json con i dati immessi
        return response()->json(
            [
                'data' => $posts,
                'success' => true
            ]
        );
    }

}