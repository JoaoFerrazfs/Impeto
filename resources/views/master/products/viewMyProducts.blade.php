@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')

<div style="margin-top: 50px;" class="container">
    <table class="table table-hover table-dark table-borderless ">
        <thead>
            <tr>
                <th scope="col">Empresa</th>
                <th scope="col">Fornecedor</th>
                <th scope="col">Preço</th>
                <th scope="col">Disponibilidade</th>
                <th scope="col">Tipo</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($products as $product )
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->supplier}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->availability}}</td>
                <td>{{$product->order}}</td>
                <td><a href="editarProdutos/{{$product->_id}}" class="btn btn-outline-light">Visualizar</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@stop
