@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div style="margin-top: 50px;" class="container">
<h1 class="badge bg-secondary ">Seu carrinho de Compras</h1>
    <table class=" table table-hover table-dark table-borderless ">
        <thead>
            <tr>               
                <th scope="col">Quantidade</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Disponibilidade</th>
                <th scope="col">Foto</th>
                         
            </tr>
        </thead>
        <tbody >
            @foreach ($cart as $cart)
            <tr>                         
                <td>5</td>
                <td>{{$cart['cod']}}</td>
                <td>{{$cart['name']}}</td>
                <td>{{$cart['price']}}</td>
                <td><img src="/img/products/{{$cart['image']}}" class="img-fluid " alt="$cart['image']"></td></td>
                
               
            </tr>
           
            @endforeach
        </tbody>
    </table>

    <a href="/" class="btn btn-outline-light">Continuar Comprando</a>

</div>

@stop