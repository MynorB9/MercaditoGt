<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $clientes = Clientes::paginate(15);
        return view('clientes.todos', compact('clientes'));
    }

    public function store(Request $request){
        $cliente = Clientes::where('nit', $request->nit)->first();
        if(!$cliente){
            $cliente = new Clientes;
            $cliente->nombres = $request->nombres;
            $cliente->apellidos = $request->apellidos;
            $cliente->nit = $request->nit;
            $cliente->correo = $request->correo;
            $cliente->telefono = $request->telefono;
            $cliente->save();
            return response()->json([
               'status' => 'OK',
               'code' => 200,
               'msg' => 'Cliente registrado'
            ]);
        }else{
            return response()->json([
                'status' => 'ERR',
                'code' => 400,
                'msg' => 'Este cliente ya esta registrado'
            ]);
        }

    }
}
