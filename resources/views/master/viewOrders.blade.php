@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div style="margin-top: 50px;" class="container d-flex ">
    @foreach ($orders as $value)

    @if ($value['products'][0]['status'] == "Novo" )
    <div class="card mt-3 mx-3" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title">Cliente {{$value['delivery']['name']}} </h5>
            <p class="card-text">Número do Pedido: {{$value['budgetNumber']}} </p>
            <p class="card-text">Data do Pedido: {{$value['updated_at']->format('d/m/y')}} </p>
            <p class="card-text">Previsão de Entrega: 25/12/2021 </p>

            <a href="#" class="btn btn-primary">Visualizar Pedido </a>
        </div>
    </div>
    @elseif ($value['products']['status'] == "Em atendimento" )
    div class="card mt-3 mx-3" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title">Cliente {{$value['delivery']['name']}} </h5>
            <p class="card-text">Número do Pedido: {{$value['budgetNumber']}} </p>
            <p class="card-text">Data do Pedido: {{$value['updated_at']->format('d/m/y')}} </p>
            <p class="card-text">Previsão de Entrega: 25/12/2021 </p>

            <a href="#" class="btn btn-primary">Visualizar Pedido </a>
        </div>
    </div>
    @else
    div class="card mt-3 mx-3" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title">Cliente {{$value['delivery']['name']}} </h5>
            <p class="card-text">Número do Pedido: {{$value['budgetNumber']}} </p>
            <p class="card-text">Data do Pedido: {{$value['updated_at']->format('d/m/y')}} </p>
            <p class="card-text">Previsão de Entrega: 25/12/2021 </p>

            <a href="#" class="btn btn-primary">Visualizar Pedido </a>
        </div>
    @endif
    </div>


    @endforeach

</div>

@stop