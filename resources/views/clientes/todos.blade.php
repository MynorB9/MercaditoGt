<x-app-layout>
    <h2>Clientes</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">NIT</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Primera Compra</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$cliente->nombres}} {{$cliente->apellidos}}</td>
            <td>{{$cliente->nit}}</td>
            <td>{{$cliente->correo}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}


</x-app-layout>
