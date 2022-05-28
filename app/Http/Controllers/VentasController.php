<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class VentasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $ventas = Ventas::all();
        return view('ventas.index', compact('ventas'));
    }

    public function pdf($id){
        $id = decrypt($id);
        $venta = Ventas::with('cajero','cliente','detalle', 'detalle.producto','canjeo.cupon')->where('ventas.id', $id)->first();
        $view = view('pdf.invoice', compact('venta'));
        PDF::setOptions(['isRemoteEnabled' => true]);

        return PDF::loadHTML($view)
            ->setPaper('letter')
            ->stream('FACTURA-TIENDA-CHINITO-'.$venta->id.'.pdf');
    }
}
