@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<div class="col-md-12 d-flex p-2 align-self-center productRegister " >
@foreach ($products as $product )     
    <div class="col-md-6 container-fluid  productRegister ">
        <h1>Visualização de Produto</h1>
    <form method="POST" action="/validaCadastro" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Produto</span>
            <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name" required="required" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Fornecedor</span>
            <input type="text" class="form-control" value="{{$product->_id_supplier}}" name="_id_supplier" id="_id_supplier" required="required">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Preço</span>
            <input type="number" step='0.01' class="form-control" value="{{$product->price}}" name="price" id="price" required="required" >
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="availability" id="availability">
            <label class="form-check-label" for="availability">Disponivel</label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="order" id="order">
            <label class="form-check-label" for="order">Somente Encomenda</label>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description"  name="description" rows="3"required="required" >{{$product->description}}</textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Estoque</span>
            <input type="number" class="form-control" value="{{$product->inventory}}" name="inventory" id="inventory" required="required" >
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Adicione uma foto</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        <button type="Realizar Cadastro" class="btn btn-outline-light">Salvar Produto</button>
    </form>     
    </div>

    <div class="col-md-3 d-flex container-fluid p-2 align-self-center " style="height: 400px;">
        <img src="/img/products/{{$product->image}}" class="img-fluid " alt="{{$product->name}}" >
    </div>
@endforeach
</div>

@stop