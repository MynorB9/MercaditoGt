<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>TIENDA CHINITO - {{$venta->id}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family:  Arial,sans-serif; ;
        font-size: 14px;
        line-height: 20px;
        max-height: 100%;
        width: 100%;
        max-width: 100%;
    }
    .field {
        font-size: 15px;
    }
    .text-data{
        font-size: 14px;
    }
    @page {
        margin-top: 0.5cm;
        margin-bottom: 2cm;
        margin-left: 2cm;
        margin-right: 1cm;
    }

    .separador {
        border-bottom: #3f9ae5;
        border-bottom-width: thick;
    }
    .layer1{
        margin-top: 10px;
    }
    .layer2{
        margin-top: 20px;
    }
    .bg-azul{
        background: #483d8b;
        height:3px;
    }
    #watermark {
        position: fixed;
        bottom:   10cm;
        opacity: 0.3;
        left:     3cm;
        width:    12cm;
        height:   8cm;
        z-index:  -1000;
    }
    footer {
        position: fixed;
        bottom: -115px;
        left: 0px;
        right: 0px;
        height: 450px;
    }
    #type {
        position: fixed;
        top: 3.7cm;
        left: 15.7cm;
    }
</style>
<body>
<div id="watermark">
    <img src="https://i.imgur.com/03Cdbkx.jpg" height="100%" width="100%" />
</div>

<div class="row">
    <div class="col-xs-2">
        <img src="https://i.imgur.com/03Cdbkx.jpg" style="height: 80px; width: 100%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
    </div>
    <div class="col-xs-9">
        <p>
            <b>VENTAS</b><br>
            <b>PEQUEÑO CONTRIBUYENTE</b><br>
            <b>VENTAS EL CHINITO</b><br>
        </p>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-xs-8">
        <b style="font-size: 18px">CLIENTE: {{$venta->cliente->nombres}} {{$venta->cliente->apellidos}}</b> <br>
        <b style="font-size: 18px">NIT: {{$venta->cliente->nit}}</b><br>
        <b style="font-size: 18px">DIRECCION: @if(empty($venta->cliente->direcion)) CIUDAD @else {{$venta->cliente->direcion}} @endif</b>
        <br>
        <b style="font-size: 18px">FECHA: {{$venta->created_at}}</b>
    </div>
</div>
<div class="bg-azul"></div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio U</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($venta->detalle as $item)
        <tr>
            <th>{{$item->id}}</th>
            <th>{{$item->producto->nombre}}</th>
            <th>{{$item->cantidad}}</th>
            <th>Q{{number_format($item->producto->precio,2)}}</th>
            <th>Q{{number_format($item->cantidad * $item->producto->precio,2)}}</th>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="row">
    <div class="bg-azul"></div>
    @if(!empty($venta->canjeo->cupon->valor))
        <h4>Cupon Canjeado: {{$venta->canjeo->cupon->uid}}</h4>
        <h4>Valor Cupon: Q{{number_format($venta->canjeo->cupon->valor,2)}}</h4>
        <h4>Subtotal: Q{{number_format($venta->total + $venta->canjeo->cupon->valor,2)}}</h4><br>
    @else
        <h4>Subtotal: Q{{number_format($venta->total,2)}}</h4>
    @endif
    <div class="bg-azul"></div>
    <h4>Total VENTA: Q{{number_format($venta->total,2)}}</h4>
</div>
</body>
</html>
