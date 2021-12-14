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

    <form method="POST" action="/pedido" enctype="multipart/form-data">
        @csrf
        <table class=" table table-hover table-dark table-borderless ">
            <thead>
                <tr>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Disponibilidade</th>
                    <th scope="col">Foto</th>
                    <th></th>


                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $key=> $cart)
                <tr>
                    <td><input type="number" name="amount" min="1" max="{{$cart['inventory']}}" ></td>
                    <td>{{$cart['cod']}}</td>
                    <td>{{$cart['name']}}</td>
                    <td>{{$cart['price']}}</td>
                    <td><img src="/img/products/{{$cart['image']}}" class="img-fluid " alt="$cart['image']"></td>
                    </td>

                    <td>
                        <form method="POST" action="/carrinho/excluir/item" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="key" value="{{$key}}">
                            <input type="hidden" name="cod" value="{{$cart['cod']}}">

                            <button type="submit" class="btn btn-outline-light">Excluir item</button>
                        </form>
                    </td>


                </tr>

                @endforeach
            </tbody>
        </table>

        <a href="/" class="btn btn-outline-light">Continuar Comprando</a>
        <button type="submit" class="btn btn-outline-light">Fechar Pedido</button>

    </form>

</div>

@stop