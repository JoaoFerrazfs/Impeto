@extends('layouts.main')
@section('title', 'Impeto')
@section('content')




    <div class="container" role="alert">


        <div class="container">
            @if (session('msg') != null)
                <div class="alert alert-info mt-5" role="alert">
                    {{ session('msg') }}
                </div>
            @else
                <div class="alert alert-warning mt-5" role="alert">
                    Bem vindo ao nosso Cardápio
                </div>
            @endif



            <nav class="card-container" style="margin:50px 280px ; display : flex;">

                @foreach ($products as $product)
                    <div class="card col-md-12" style="width: 18rem; margin:50px 20px ">
                        <img src="/img/products/{{ $product->image }}" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Preço: {{ $product->price }}</p>
                            <p class="card-text">Preço: {{ $product->price }}</p>
                            <form method="post" action="/visualizarProduto/">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->_id }}">

                                <button type="submit" class="btn btn-primary">Visualizar Produto</button><br></br>
                            </form>

                        </div>
                    </div>
                @endforeach

            </nav>
        </div>

    @stop
