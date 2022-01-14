@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<div class="container mt-5">



    <fieldset class="border p-2 container">
        <legend style="color: white;" class="w-auto">Dados Pessoais</legend>


        <div class="col-md-10 container d-flex p-2 align-self-center ">
            <div class="input-group input-group-sm mb-3 mx-3 ">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nome Completo</span>
                <input type="text" name="name" value="{{$deliveryOrder['name']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

            <div class="input-group input-group-sm mb-3 mx-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Telefone</span>
                <input type="text" name="phoneNumber" value="{{$deliveryOrder['phoneNumber']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

        </div>
        <div class="col-md-10 container d-flex p-2 align-self-center ">

            <div class="input-group input-group-sm mb-3 mx-3 ">
                <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
                <input type="text" name="CEP" value="{{$deliveryOrder['CEP']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm " disabled style="background-color: white;">
            </div>

            <div class="input-group input-group-sm mb-3 mx-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Estado</span>
                <input type="text" name="state" value="{{$deliveryOrder['state']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

            <div class="input-group input-group-sm mb-3 mx-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cidade</span>
                <input type="text" name="city" value="{{$deliveryOrder['city']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

            <div class="input-group input-group-sm mb-3 mx-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Rua</span>
                <input type="text" name="street" value="{{$deliveryOrder['street']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

            <div class="input-group input-group-sm mb-3 mx-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nº</span>
                <input type="text" name="number" value="{{$deliveryOrder['number']}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled style="background-color: white;">
            </div>

        </div>
    </fieldset>

    <fieldset class="border p-2 mt-5 ">
        <legend style="color: white;" class="w-auto">Produtos</legend>
        <table class="table-light table ">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">COD</th>
                    <th scope="col">Nome</th>
                    <th scope="col">image</th>
                    <th scope="col">Quantidade</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="align-middle">{{$productOrder['cod']}}</td>
                    <td class="align-middle">{{$productOrder['name']}}</td>
                    <td class="align-middle"><img src="/img/products/{{$productOrder['image']}}" class="img-thumbnail" alt="{{$productOrder['name']}}" style="max-width: 200px;"></td>
                    <td class="align-middle">{{$productOrder['quantity']}}</td>
                </tr>
        </table>
        </tbody>
    </fieldset>
    <form action="/pedidos/atualizar" method="POST">
        @csrf
    
    <fieldset class="border p-2 mt-5 ">
        <legend style="color: white;" class="w-auto">Atendimento</legend>

       


            <div class="alert alert-light" role="alert">
                <h2 class="align-middle"> Status do atendimento </h2>
                <div class="input-group mb-3">
                  
                    <select name="status" class="form-select" id="inputGroupSelect01">
                        @if( $productOrder['status'] == "Novo")
                        <option value="{{$productOrder['status']}}" selected>{{$productOrder['status']}}</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Fechado">Fechado</option>
                        @elseif($productOrder['status'] == "Em andamento" )
                        <option value="{{$productOrder['status']}}" selected>{{$productOrder['status']}}</option>
                        <option value="Novo">Novo</option>
                        <option value="Fechado">Fechado</option>
                        @elseif($productOrder['status'] == "Fechado" )
                        <option value="{{$productOrder['status']}}" selected>{{$productOrder['status']}}</option>
                        <option value="Novo">Novo</option>
                        <option value="Em andamento">Em andamento</option>
                        @endif
                    </select>

                    <input type="hidden" value="{{$idOrder}}" name="id">

                    
                </div>


            </div>

    </fieldset>



    <div class="position-relative mt-5">
        <div class="position-absolute top-50 start-0">
            <a href="/pedidos/{{ auth()->user()->supplier}}" class="btn btn-outline-info">Voltar</a>
        </div>

        <div class="position-absolute top-50 end-0">
            <button type="submit" class="btn btn-outline-success">Confirmar Alteração</button>
        </div>

    </div>

    </form>

</div>





@endsection