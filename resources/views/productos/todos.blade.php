<x-app-layout>
    <div class="row justify-content-between border-b-orange-500">
        <div class="col-md-4">
            <h2>Productos</h2>
        </div>
        <div class="col-md-4">
            <button type="button" id="registrar_producto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar</button>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Ultimo Ingreso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcion}}</td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $productos->links() }}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input x-model="producto.nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" aria-label="Nombre">
                        </div>
                        <div class="col-md-6">
                            <input x-model="producto.descripcion" type="text" name="descripcion" class="form-control" placeholder="Descripcion" aria-label="Descripcion">
                        </div>
                        <div class="col-md-6">
                            <input x-model="producto.precio" type="text" name="precio" class="form-control" placeholder="Precio" aria-label="precio">
                        </div>
                        <div class="col-md-6">
                            <input x-model="producto.stock" type="text" name="stock" class="form-control" placeholder="Stock" aria-label="Stock">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="registrarProducto">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('greetingState', () => ({
                producto: {
                    nombre: '',
                    descripcion: '',
                    precio: '',
                    stock: '',
                },

                registrarProducto(){
                    axios
                        .post('{{route('guardar.productos')}}', this.producto)
                        .then(response => {
                            swal.fire(
                                'Producto registrado!',
                                'El producto fue registrado con exito.!',
                                'success'
                            )
                            setTimeout(function (){
                                location.reload()

                            },2000);
                        })
                        .catch(error => {
                            swal.fire(
                                'Error!',
                                'El producto no fue registrado con exito.!',
                                'error'
                            )

                        })
                        .finally(() => {

                        })
                }
            }));
        });
    </script>
</x-app-layout>
