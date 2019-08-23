<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('categorias.index',compact('categorias'));
    }

    public function store(Request $request){
       $categoria = new Categoria();

       $categoria->nombre = $request->nombre;

       $categoria->save();

       return redirect()->route('categorias.index');
    }
}
