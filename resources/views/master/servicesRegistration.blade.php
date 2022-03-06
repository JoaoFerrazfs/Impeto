@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<section class="container productRegister ">
    <h1>Cadastro Prestador</h1>


    <form method="POST" action="/validaCadastroPrestador" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Prestador</span>
            <input type="text" name="name" class="form-control" id="name" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Código</span>
            <input type="text" name="cod" class="form-control" id="cod" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tipo de Serviço</span>
            <input type="text" class="form-control " name="type" id="type" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço</span>
            <input type="number" step='0.01' class="form-control" name="price" id="price" required="required">
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Adicione uma foto</label>
            <input class="form-control" type="file" id="image" name="image" required="required">
        </div>


        <button type="submit" class="btn btn-outline-light">Salvar Produto</button>
    </form>




</section>


@stop