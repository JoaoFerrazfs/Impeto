@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')



<section class="container productRegister">
    <h1>Cadastro de Produto</h1>
    <form method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Produto</span>
            <input type="name" class="form-control" id="name">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Fornecedor</span>
            <input type="text" class="form-control" name="_id_supplier" id="_id_supplier">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço</span>
            <input type="text" class="form-control" name="price" id="price">
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Disponivel</label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Somente Encomenda</label>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Adicione uma foto</label>
            <input class="form-control" type="file" id="formFile">
        </div>


        <button type="Realizar Cadastro" class="btn btn-outline-light">Submit</button>
    </form>




</section>


@stop