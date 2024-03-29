@extends('layouts.main')
@section('title', 'Impeto')
@section('content')

    <div class="container">

        <div class="container">
            @if (@session('success'))
                <p class=" alert alert-info border border-white mt-5 ">{{ session('success') }}</p>
            @endif
        </div>


        <nav class="container-fluid" style="background-color: black; margin-top: 50px;">

            <div id="carouselExampleDark" class="carousel carousel-dark slide container" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000" style="height: 350px;">
                        <img src="https://s2.glbimg.com/8vNbQCCBci6D4tjPT0lya3obzjg=/0x0:2810x1469/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2018/6/Q/NByezmQlaqyz7r4nQwVQ/flaticon-generic.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000" style="height: 350px;">
                        <img src="https://s2.glbimg.com/8vNbQCCBci6D4tjPT0lya3obzjg=/0x0:2810x1469/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2018/6/Q/NByezmQlaqyz7r4nQwVQ/flaticon-generic.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 350px;">
                        <img src="https://s2.glbimg.com/8vNbQCCBci6D4tjPT0lya3obzjg=/0x0:2810x1469/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2018/6/Q/NByezmQlaqyz7r4nQwVQ/flaticon-generic.jpg"
                            class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


        </nav>

        <div class="container mt-4">

            <nav class="container-fluid" style="margin:50px 280px ; display : flex;">

                <div class="card col-md-12" style="width: 18rem; margin:50px 20px ">
                    <img src="/img/loja.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nossos Produtos</h5>
                        <p class="card-text">Os mais variados produtos para você!</p>
                        <a href="/produtos" class="btn btn-primary">Conheça</a>
                    </div>
                </div>

                <div class="card col-md-4" style="width: 18rem; margin:50px 20px ">
                    <img src="/img/prestador.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Serviços Oferecidos</h5>
                        <p class="card-text">Cobridos todos os serviços que seu evento precisa</p>
                        <a href="/prestadores" class="btn btn-primary">Adquira já!</a>
                    </div>
                </div>

                <div class="card col-md-4" style="width: 18rem; margin:50px 20px ">
                    <img style="height: 12rem" src="/img/anuncio.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Anuncie com a gente</h5>
                        <p class="card-text">Anuncios personalizados!</p>
                        <a href="/anuncios" class="btn btn-primary">Faça da parte!</a>
                    </div>
                </div>


        </div>



    </div>

    @if ($session = Session()->get('budget') != null)
        <div class="container">
            <a class="btn btn-success mt-3" href="/geraPdf">
                Gerar PDF do Ultimo Pedido
            </a>
        </div>
    @endif









    </nav>


    </div>

@stop
