@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div style="margin-top: 50px;" class="container">
    <h1 class="badge bg-secondary ">Seu carrinho de Compras</h1>
    <th>
        <form method="POST" action="/carrinho/excluir/carrinho" enctype="multipart/form-data">@csrf
            <button type="submit" class="btn btn-outline-light">Excluir carrinho</button>
        </form>
    </th>


    <table class=" table table-hover table-dark table-borderless ">
        <thead>
            <tr>
                <th scope="col">Quantidade</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Disponibilidade</th>
                <th scope="col">Foto</th>
                <th scope="col">Valor Total: R${{$amount}}</th>


            </tr>
        </thead>

        <tbody>


            @foreach ($cart as $key=> $carts)
            <tr>
                <form method="POST" action="/carrinho/modifica/quantidade" enctype="multipart/form-data">
                    @csrf
                    <td>
                        <input type="number" name="amount" min="1" max="{{$carts['inventory']}}" value="{{$carts['quantity']}}">
                        <input type="hidden" name="key" value="{{$key}}">

                    </td>
                </form>
                <td>{{$carts['cod']}}</td>
                <td>{{$carts['name']}}</td>
                <td>{{$carts['price']}}</td>
                <td><img src="/img/products/{{$carts['image']}}" style="width: 100px;" class="img-fluid " alt="$carts['image']"></td>
                </td>




                <td>
                    <form method="POST" action="/carrinho/excluir/item" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="key" value="{{$key}}">
                        <input type="hidden" name="cod" value="{{$carts['cod']}}">

                        <button type="submit" class="btn btn-outline-light">Excluir item</button>
                    </form>
                </td>

        </tbody>






        @endforeach

    </table>

    <a href="/" class="btn btn-outline-light">Continuar Comprando</a>



    <div class="text-center alert alert-light " style="margin-top: 50px; border-radius: 60px;">
        <h2 style="color: black;">Para efetuar o pedido você deve fazer acessar sua conta</h2>
        <a href="/pedido" class="btn btn-outline-dark">Fechar Pedido</a>
    </div>




</div>

@stop