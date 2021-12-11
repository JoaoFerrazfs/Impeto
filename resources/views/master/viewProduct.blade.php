@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<div class="col-md-12 d-flex p-2 align-self-center productRegister ">
    @foreach ($products as $product )
    <div class="col-md-6 container-fluid  productRegister ">
        <h1>Visualização de Produto</h1>
        <form method="POST" action="/meusProdutos/salvaEdicao" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1">Nome do Produto</span>
                <input type="text" name="name" class="form-control" value="{{$product->name}}" id="name" required="required">
                <input type="hidden" name="id" class="form-control" value="{{$product->id}}" id="name" required="required">
            </div>

            <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1">Código</span>
                <input type="text" name="cod" class="form-control" value="{{$product->cod}}" id="cod" required="required" readonly>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text " id="basic-addon1">Fornecedor</span>
                <input type="text" class="form-control" value="{{$product->supplier}}" name="supplier" id="supplier" required="required"  >
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Preço</span>
                <input type="number" step='0.01' class="form-control" value="{{$product->price}}" name="price" id="price" required="required">
            </div>



            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3" required="required">{{$product->description}}</textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Estoque</span>
                <input type="number" class="form-control" value="{{$product->inventory}}" name="inventory" id="inventory" required="required">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Tipo</span>
                <input type="text" class="form-control" value="{{$product->type}}" name="type" id="type" required="required">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Adicione uma foto</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-outline-light">Atualizar produto</button>
        </form>
    </div>


    <div class="col-md-3 d-flex container-fluid p-2 align-self-center " style="height: 400px;">
        <img src="/img/products/{{$product->image}}" class="img-fluid " alt="{{$product->name}}">
    </div>

    <form method="POST" action="/meusProdutos/status" enctype="multipart/form-data">
        @csrf
        @if ( $product->availability == "Disponível")
        <div class="form-check form-switch">
            <input type="hidden" name="availability" class="form-control" value="Indísponivel" id="availability">
            <input type="hidden" name="id" class="form-control" value="{{$product->id}}" id="name" required="required">
            <button type="submit" class="btn btn-outline-warning">Desativar produto</button>
        </div>
        @else
        <div class="form-check form-switch">
            <input type="hidden" name="availability" class="form-control" value="Dísponivel" id="availability">
            <input type="hidden" name="id" class="form-control" value="{{$product->id}}" id="name" required="required">
            <button type="submit" class="btn btn-outline-warning">Ativar produto</button>
        </div>
        @endif
    </form>
    <form method="POST" action="/meusProdutos/status" enctype="multipart/form-data">
        @csrf
        @if ( $product->order == "Pronta Entrega")
        <div class="form-check form-switch">
            <input type="hidden" name="order" class="form-control" value="Encomenda" id="order">
            <input type="hidden" name="id" class="form-control" value="{{$product->id}}" id="name" required="required">
            <button type="submit" class="btn btn-outline-warning">Mudar para encomenda</button>

        </div>
        @else
        <div class="form-check form-switch">
            <input type="hidden" name="order" class="form-control" value="Pronta Entrega" id="order">
            <input type="hidden" name="id" class="form-control" value="{{$product->id}}" id="name" required="required">
            <button type="submit" class="btn btn-outline-warning">Mudar para Pronta Entrega</button>

        </div>
        @endif
    </form>

    <form method="post" action="/meusProdutos/delete/{{$product->id}}">
        @method('delete')
        @csrf
        <div class="form-check form-switch">
            <button type="submit" value="Delete" name="delete" class="btn btn-outline-danger">Deletar Produto</button>
        </div>

    </form>
</div>
@endforeach
</div>

@stop