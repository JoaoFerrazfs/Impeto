@extends('layouts.managerMain')
@section('title', 'Impeto')
@section('content')


    <div>

        <div class="container mt-5  d-flex justify-content-center  ">



            <div class="ms-5 d-flex ">
                <div class="card " style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Pedido 3565</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <p class="text-center">Status de Pagamento </br> <b class=""> Pendente </b>
                            <li class="list-group-item">Data do pedido: <b>27/03/2022</b></li>
                            <li class="list-group-item">Previsão de Entrega: <b>27/03/2022</b></li>

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
                                        <h5 class="modal-title" id="exampleModalLabel">Pedido 456</h5>
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




                                                    <tr>
                                                        <td>1</td>
                                                        <td>Pizza</td>
                                                        <td>Pizza</td>
                                                    </tr>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Pizza</td>
                                                        <td>Pizza</td>
                                                    </tr>

                                                </tbody>

                                            </table>

                                            <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                style="--bs-bg-opacity: .5;">
                                                <h6 class="">Valor Total: </h6>
                                                <div class="me-5">
                                                    <h6 class="ms-3 position-absolute top-50 end-0 translate-middle-y"> R$ 59,90
                                                        <i class="bi bi-cash ms-3 me-3 "></i> </h6>

                                                </div>

                                            </div>

                                            <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                style="--bs-bg-opacity: .5;">
                                                <h6 class="">Metodo de Pagamento: </h6>
                                                <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y ">Dinheiro
                                                    <i class="bi bi-currency-dollar ms-3 me-3 "></i>
                                                </h6>
                                            </div>

                                            <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                style="--bs-bg-opacity: .5;">
                                                <h6 class="">Status de Pagamento: </h6>
                                                <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y">Pendente
                                                    <i class="bi bi-hourglass-split ms-3 me-3 "></i>
                                                </h6>
                                            </div>

                                            <div class=" position-relative border border-3 mt-2 bg-info p-2 rounded d-flex align-middle  "
                                                style="--bs-bg-opacity: .5;">
                                                <h6 class="">Previsão de Entrega:                                               
                                                </h6>
                                                <h6 class="ms-5 position-absolute top-50 end-0 translate-middle-y">01/04/2022
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




    </div>



@stop
