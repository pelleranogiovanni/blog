<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactosController extends Controller
{
    public function index(){

        // $contactos = Contacto::all();

        $contactos = Contacto::where('nombre','Franco')->get();

        return view('contactos.index',compact('contactos'));

    }
}
