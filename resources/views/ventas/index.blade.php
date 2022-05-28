<x-app-layout>
    <div class="row justify-content-between border-b-orange-500">
        <div class="col-md-4">
            <h2>Ventas</h2>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Total</th>
            <th scope="col">Cajero</th>
            <th scope="col">Fecha</th>
            <th scope="col">Recibo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventas as $venta)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$venta->cliente->nombres}} {{$venta->cliente->apellidos}}</td>
                <td>Q{{number_format($venta->total,2)}}</td>
                <td>{{$venta->cajero->name}}</td>
                <td>{{$venta->created_at}}</td>
                <td><a class="btn btn-info" href="{{route('ver.recibo', encrypt($venta->id))}}" target="_blank">Descargar PDF</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Cupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input x-model="producto.descripcion" type="text" name="descripcion" class="form-control" placeholder="Descripcion" aria-label="Descripcion">
                        </div>
                        <div class="col-md-12">
                            <input x-model="producto.monto" type="text" name="monto" class="form-control" placeholder="Monto" aria-label="Monto">
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
                    monto: '',
                    descripcion: '',
                },

                registrarProducto(){
                    axios
                        .post('{{route('registrar.tarjeta')}}', this.producto)
                        .then(response => {
                            swal.fire(
                                'Tarjeta Generada!',
                                'La tarjeta de regalo fue generada y lista para usarse.!',
                                'success'
                            )
                            setTimeout(function (){
                                location.reload()

                            },2000);
                        })
                        .catch(error => {
                            swal.fire(
                                'Error!',
                                'La tarjeta no pudo generarse.!',
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
