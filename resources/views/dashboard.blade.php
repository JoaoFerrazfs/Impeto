@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div class="container">
  @if(@session('success'))
  <p class=" alert alert-info border border-white mt-5 ">{{session('success')}}</p>
  @endif
</div>

<div class="container fuctionNavegation" style="margin-top: 50px;">

    <div class="alert alert-light text-center ">
        <h3>Gerenciador de Produtos</h3>
    </div>

    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Meus Produtos</h5>
            <a href="/meusProdutos/{{ auth()->user()->supplier}}" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>

    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Cadastrar Produto</h5>
            <a href="/cadastroProduto" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>

    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Cadastrar Prestador</h5>
            <a href="/prestador/registrar" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>

    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Visualizar Prestadores</h5>
            <a href="/prestador/visualizar" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>

</div>
<div class="container fuctionNavegation" style="margin-top: 50px;">

<div class="alert alert-light text-center ">
        <h3>Gerenciador de Pedidos</h3>
    </div>


    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Lista de Pedidos</h5>
            <a href="/pedidos/{{ auth()->user()->supplier}}" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>

    <div class="card cardStyle" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Métricas de Pedidos</h5>
            <a href="/cadastroProduto" type="submit" class="btn btn-primary btn-lg">
                <ion-icon name="library-outline"></ion-icon>
            </a>
        </div>
    </div>


</div>






@stop
