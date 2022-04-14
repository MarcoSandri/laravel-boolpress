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
    public function index(Request $request) //solo l'index accessibile da front
    {
        //Prendo tutti i post e associo le categorie al codice riportato nel post
        $posts = Post::with(['category'])->get();

        $posts = Post::paginate(3);

        $posts->each(function($post) {
            if($post->cover) {
                $post->cover = url('storage/'.$post->cover);
            } else {
                $post->cover = url('img/fallback_img.jpg');
            }
        });

        //Response crea una risposta
        //json ritorna un file json con i dati immessi
        return response()->json(
            [
                'data' => $posts,
                'success' => true
            ]
        );
    }

    public function show($slug)
    {

        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();

        if($post->cover) {
            $post->cover = url('storage/' . $post->cover);
        } else {
            $post->cover = url('img/fallback_img.jpg');
        }

        if ($post) {
            return response()->json(
                [
                    'data' => $post,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'data' => 'Nessun risultato',
                    'success' => false

                ]
            );
        }

    }

}