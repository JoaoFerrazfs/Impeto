@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')



<div style="margin-top: 50px;" class="container d-flex ">
    @foreach ($supplierOrder as $key=> $value)

  @foreach ($value as $newKey => $newValue)

  @if ($newValue['products']['status'] == "Novo" )
    <div class="card mt-3 mx-3" style="width: 18rem;">
       
        <div class="card-body">
            <form action="/pedidos/visualizar" method="post">
                @csrf
                <p class="card-text">Produto: {{$newValue['products']['name']}} </p>
                <p class="card-text">Número do Pedido: {{$newValue['products']['numberOrder']}} </p>
                <p class="card-text">Data do Pedido: {{$newValue['date']->format('d/m/y')}} </p>              
                <p class="card-text">Previsão de Entrega: {{$newValue['date']->format('d/m/y')}} </p>
                <input type="hidden" name="idOrder" value="{{$newValue['products']['idOrder']}}">
                <input type="hidden" name="idProduct" value="{{$newValue['products']['id']}}">
                <button type="submit" class="btn btn-primary">Visualizar Pedido </a>
            </form>
        </div>



    </div>
    @elseif ($value[$key]['status'] == "Em atendimento" )
    div class="card mt-3 mx-3" style="width: 18rem;">

    <div class="card-body">
        <form action="/pedidos/visualizar" method="post">
            @csrf
            <p class="card-text">Produto: {{$value['name']}} </p>
            <p class="card-text">Número do Pedido: {{$value['numberOrder']}} </p>
            <p class="card-text">Data do Pedido: {{$value['date']->format('d/m/y')}} </p>
            <p class="card-text">Previsão de Entrega: {{$value['date']->format('d/m/y')}} </p>
            <input type="hidden" name="idOrder" value="{{$value['idOrder']}}">
            <input type="hidden" name="idProduct" value="{{$value['id']}}">
            <button type="submit" class="btn btn-primary">Visualizar Pedido </a>
        </form>
    </div>
</div>
@else
div class="card mt-3 mx-3" style="width: 18rem;">

<div class="card-body">
    <form action="/pedidos/visualizar" method="post">
        @csrf
        <p class="card-text">Produto: {{$value['name']}} </p>
        <p class="card-text">Número do Pedido: {{$value['numberOrder']}} </p>
        <p class="card-text">Data do Pedido: {{$value['date']->format('d/m/y')}} </p>
        <p class="card-text">Previsão de Entrega: {{$value['date']->format('d/m/y')}} </p>
        <input type="hidden" name="idOrder" value="{{$value['idOrder']}}">
        <input type="hidden" name="idProduct" value="{{$value['id']}}">

        <button type="submit" class="btn btn-primary">Visualizar Pedido </a>
    </form>
</div>
@endif
</div>
 
  @endforeach
   

@endforeach

</div>

@stop