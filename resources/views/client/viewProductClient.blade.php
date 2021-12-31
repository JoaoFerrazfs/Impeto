@extends('layouts.managerMain')
@section('title','Impeto')
@section('content')


<div class="col-md-12 d-flex p-2 align-self-center productRegister ">
    <div class="col-md-6 container-fluid  productRegister ">
        <h1>{{$products->name}}</h1>


        <div class="input-group mb-3 ">
           
                 </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Código</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->cod}}  </label>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Vendedor</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->supplier}}  </label>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Preço</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->price}}  </label>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Descrição</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->description}}  </label>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Estoque</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->inventory}}  </label>
                </div>

                <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">Tipo</span>
                    <label type="text" name="cod" class="form-control"  id="cod">{{$products->type}}  </label>
                </div>




                <form method="POST" action="/carrinho" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" class="form-control" id="id"  value="{{$products->_id}}">
                    <input type="hidden" name="cod" class="form-control" id="cod"  value="{{$products->cod}}">
                    <input type="hidden" name="name" class="form-control" id="name"  value="{{$products->name}}"> 
                    <input type="hidden" name="price" class="form-control" id="price"  value="{{$products->price}}"> 
                    <input type="hidden" name="image" class="form-control" id="image"  value="{{$products->image}}">
                    <input type="hidden" name="inventory" class="form-control" id="inventory"  value="{{$products->inventory}}"> 
                    <input type="hidden" name="supplier" class="form-control" id="supplier"  value="{{$products->supplier}}">
                    <input type="hidden" name="userSupplier" class="form-control" id="userSupplier"  value="{{$products->user}}">
                    <button type="submit" class="btn btn-outline-light">Adicionar ao Carrinho</button>
                </form>
        </div>


        <div class="col-md-3 d-flex container-fluid p-2 align-self-center " style="height: 400px;">
            <img src="/img/products/{{$products->image}}" class="img-fluid " alt="{{$products->name}}">
        </div>





    </div>

</div>

@stop