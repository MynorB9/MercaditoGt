<?php

namespace App\Http\Controllers;

use App\Models\Tarjetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TarjetasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $tarjetas = Tarjetas::with('estatus','usuario')->get();
        return view('tarjetas.todos', compact('tarjetas'));
    }

    public function store(Request $request){
        $tarjeta = new Tarjetas;

        $tarjeta->uid = Str::uuid();
        $tarjeta->descripcion = $request->descripcion;
        $tarjeta->valor = $request->monto;
        $tarjeta->created_by = Auth::user()->id;
        $tarjeta->estatus_tarjetas_id = 1; //Generada
        $tarjeta->save();


        return response()->json([
            'status' => 'OK',
            'code' => 200
        ]);

    }
}
