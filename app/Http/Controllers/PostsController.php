<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id; //almaceno en la variable el id del user logueado

        $posts = Post::where('user_id', $id)->get(); //traigo los posts del usuario logueado con el $id
        $categorias = Categoria::all();
        return view('posts.index',compact('posts','categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {

        // Esto genera un arreglo $errors

        // $validated = $request->validate([
        //     'titulo' => 'required|unique:posts|min:6|max:20',
        //     'contenido'=>'required|min:6|max:200',
        //     'descripcion'=>'required'
        // ]);

        $validated = $request->validated();

        $name = "noimg.jpg";

        if ($request->hasFile('foto')) {
           $foto = $request->file('foto');
           $name = time().$foto->getClientOriginalName();

           $foto->move(public_path().'/img/',$name);
        }

        $post = new Post();
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->contenido = $request->contenido;
        $post->foto = '/img/'.$name;
        $post->user_id = Auth::user()->id;
        $post->save();

        $post->categorias()->attach($request->categorias);

        return redirect()->route('posts.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
