@extends('layouts.main')
@section('title', 'Impeto')
@section('content')




    <div class="container" role="alert">


        <div class="alert alert-warning mt-5" role="alert">
            Estes são nossos prestadores de Serviços
        </div>

        <nav class="card-container" style="margin:50px 280px ; display : flex;">

            @foreach ($results as $result)
                <div class="card col-md-12" style="width: 18rem; margin:50px 20px ">
                    <img src="/img/services/{{ $result->image }}" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title">{{ $result->type }}</h5>                       
                        <p class="card-text">Preço: {{ $result->name }}</p>
                        <p class="card-text">Avaliação: 5 Estrelas</p>
                        <p class="card-text">Preço: {{ $result->price }}</p>
                        <form method="post" action="/visualizarProduto/">
                            @csrf
                            <input type="hidden" name="id" value="{{ $result->_id }}">

                            <button type="submit" class="btn btn-primary">Visualizar Prestador</button><br></br>
                        </form>

                    </div>
                </div>
            @endforeach

        </nav>
    </div>

@stop
