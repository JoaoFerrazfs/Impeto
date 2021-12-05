@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')



<section class="container productRegister ">
    <h1>Cadastro de Produto</h1>
    <form method="POST" action="/validaCadastro" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Produto</span>
            <input type="text" name="name" class="form-control" id="name" required="required" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Código</span>
            <input type="text" name="cod" class="form-control" id="cod" required="required" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Fornecedor</span>
            <input type="text" class="form-control " name="supplier" id="supplier" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço</span>
            <input type="number" step='0.01' class="form-control" name="price" id="price" required="required" >
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" value="null" type="checkbox" role="switch" name="availability" id="availability">
            <label class="form-check-label" for="availability">Disponivel</label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" value="null" role="switch" name="order" id="order">
            <label class="form-check-label" for="order">Somente Encomenda</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="3"required="required" ></textarea>
        </div>

        <div class="input-group mb-3 ">
            <span class="input-group-text" id="basic-addon1">Estoque</span>
            <input type="number" class="form-control col-md-6 d-flex " name="inventory" id="inventory" required="required" >
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Classe de Item</span>
            <input type="text" class="form-control" name="type" id="type" required="required">
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Adicione uma foto</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>


        <button type="submit" class="btn btn-outline-light">Salvar Produto</button>
    </form>




</section>


@stop