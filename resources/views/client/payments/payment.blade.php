@extends('layouts.managerMain')
@section('title', 'Impeto')
@section('content')


    <div>

        @foreach ($result as $value)
            <div class="container mt-5  d-flex justify-content-center  ">



                <div class="ms-5 d-flex ">
                    <div class="card " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Pedido {{ $value->number }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <p class="text-center">Status de Pagamento </br> <b class="">
                                    {{ $value->statusPayment }} </b>
                                <li class="list-group-item">Data do pedido:
                                    <b>{{ date('d/m/Y', strtotime($value->created_at)) }}</b></li>
                                <li class="list-group-item">Previsão de Entrega:
                                    <b>{{ date('d/m/Y', strtotime($value->created_at)) }}</b></li>

                        </ul>
                        <div class="card-body d-flex justify-content-center ">
                            <button type="button " class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Visualizar
                            </button>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pedido {{ $value->number }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <div>
                                                <table class="table table-borderless table-hover">

                                                    <thead>
                                                        <p>Produtos</p>
                                                        <tr>

                                                            <th>Item</th>
                                                            <th>Descrição</th>
                                                            <th>Preço</th>

                                                        </tr>

                                                    </thead>
                                                    
                                             
                                                    <tbody class="table-hover">

                                                        @foreach ($value['products'] as $key=> $products)
                                                            <tr>
                                                                <td>{{$key}}</td>
                                                                <td>{{$products['name']}}</td>
                                                                <td>{{$products['price']}}</td>
                                                            </tr>

                                                            

                                                            
                                                        @endforeach




                                                    </tbody>

                                                </table>

                                                <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                    style="--bs-bg-opacity: .5;">
                                                    <h6 class="">Valor Total: </h6>
                                                    <div class="me-5">
                                                        <h6 class="ms-3 position-absolute top-50 end-0 translate-middle-y">
                                                            R$ {{$value['value']}}
                                                            <i class="bi bi-cash ms-3 me-3 "></i>
                                                        </h6>

                                                    </div>

                                                </div>

                                                <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                    style="--bs-bg-opacity: .5;">
                                                    <h6 class="">Metodo de Pagamento: </h6>
                                                    <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y ">
                                                        Dinheiro
                                                        <i class="bi bi-currency-dollar ms-3 me-3 "></i>
                                                    </h6>
                                                </div>

                                                <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                    style="--bs-bg-opacity: .5;">
                                                    <h6 class="">Status de Pagamento: </h6>
                                                    <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y">
                                                        {{ $value->statusPayment }}
                                                        <i class="bi bi-hourglass-split ms-3 me-3 "></i>
                                                    </h6>
                                                </div>

                                                <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                    style="--bs-bg-opacity: .5;">
                                                    <h6 class="">Previsão de Entrega:
                                                    </h6>
                                                    <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y">
                                                        {{ date('d/m/Y', strtotime($value->created_at)) }}
                                                        <i class="bi bi-truck ms-3 me-3"></i>
                                                    </h6>
                                                </div>






                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>




            </div>
        @endforeach




    </div>



@stop
