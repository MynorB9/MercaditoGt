<x-app-layout>
    <div class="row justify-content-between border-b-orange-500">
        <div class="col-md-4">
            <h2>GENERAR VENTA</h2>
        </div>
    </div>
    <div class="container shadow-sm rounded p-3 mb-3">
        <div class="row">
            <div class="col-md-4">
                <select x-model="producto" name="" id="" class="form-select" required>
                    <option value="" hidden selected>Seleccione un producto</option>
                    @foreach($productos as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" x-model='cantidad' class="form-control" placeholder="Cantidad">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" x-on:click="agregarProducto">Registrar</button>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Costo U</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <template x-for="item in listado">
            <tr>
                <td x-text="item.producto"></td>
                <td x-text="item.costou"></td>
                <td x-text="item.cantidad"></td>
                <td x-text="item.total"></td>
            </tr>
        </template>
        </tbody>
    </table>
    <div class="row d-flex">
        <div class="col-md-4">
            <h1>Total: Q<span x-text="total"></span></h1>
        </div>
        <div class="col-md-4 align-content-end">
            <button type="button" id="registrar_producto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar Venta</button>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input x-model="cliente.nit" type="text" name="nit" maxlength="20" class="form-control" placeholder="NIT" aria-label="NIT">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <input x-model="cliente.nombre" type="text" name="nombre" maxlength="40" class="form-control" placeholder="Nombre" aria-label="Nombre">
                        </div>
                        <div class="col-md-6">
                            <input x-model="cliente.apellido" type="text" name="apellido" maxlength="40" class="form-control" placeholder="Apellido" aria-label="Apellido">
                        </div>
                        <div class="col-md-12">
                            <input x-model="cliente.direccion" type="text" maxlength="40" name="direccion" class="form-control" placeholder="Direccion" aria-label="Direccion">
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <label for="">Si Tiene un cupon ingreselo aqui.</label>
                            <input x-model="cupon" type="text" name="cupon" maxlength="40" class="form-control" placeholder="Cupon" aria-label="Cupon">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="registrarVenta">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('greetingState', () => ({
                producto: [],
                cantidad: null,
                listado: [],
                total: null,
                cliente : {
                    nit: '',
                    nombre: '',
                    apellido: '',
                    direccion: '',
                },
                cupon : '',

                agregarProducto(){
                    this.buscarProducto()
                },
                registrarVenta(){
                    axios
                        .post('{{route('store.registrar_venta')}}', {'listado' : this.listado, 'cliente': this.cliente, 'total': this.total, 'cupon': this.cupon})
                        .then(response => {
                            swal.fire(
                                'Venta Registrada',
                                'La venta se registro con exito',
                                'success'
                            )
                            setTimeout(function(){
                                location.reload();
                            },1000)
                        })
                        .catch(error => {
                            swal.fire(
                                'Error!',
                                'Ocurrio un error.!',
                                'error'
                            )

                        })
                        .finally(() => {

                        })
                },
                buscarProducto(){
                    axios
                        .post('{{route('find.buscar_producto')}}', {'id' : this.producto})
                        .then(response => {
                            let productoEncontrado = {
                                'id': response.data.id,
                                'producto': response.data.nombre,
                                'costou' : response.data.precio,
                                'cantidad': this.cantidad,
                                'total': (response.data.precio * this.cantidad)
                            }
                            this.listado.push(productoEncontrado);
                            this.total = this.total + productoEncontrado.total
                            productoEncontrado = null;
                            this.producto = []
                            this.cantidad = null
                        })
                        .catch(error => {
                            swal.fire(
                                'Error!',
                                'Ocurrio un error.!',
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
