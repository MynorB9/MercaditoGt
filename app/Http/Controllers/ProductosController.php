<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $productos = Productos::paginate(15);
        return view('productos.todos', compact('productos'));
    }

    public function create(){
        return view('productos.crear');
    }

    public function store(Request $request){
        $producto = new Productos;
        $producto->descripcion = $request->descripcion;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();

        return response()->json([
           'code' => 200,
           'status' => 'OK',
            'msg' => 'Producto Registrado con exito.'
        ]);
    }
}
