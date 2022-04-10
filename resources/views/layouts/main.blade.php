<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!--JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css">

    <!--Icones-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body class="" style="background-color: black;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex ml-5  " id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Impeto</a>

                <div class="d-flex container col-md-6  ">

                    <form class="container d-flex w-100">
                        <input class="form-control me-2 w-100  " type="search" placeholder="O que você precisa?"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i> </button>
                    </form>

                    <ul class="navbar-nav justify-content-end mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                                <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>







                <form method='GET' action='/pesquisaPedido' class="d-flex d-flex justify-content-end w-50 me-5  ">
                    <input class="form-control me-2 w-75" name='cpf' type="search" placeholder="Pesquise seu pedido"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i> </button>
                </form>


                <!-- Button trigger modal -->
                @if (session()->get('portage') != null)
                    <div class="mx-1">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Frete: R$: {{ session()->get('portage') }}
                        </button>
                    </div>
                @else
                    <div class="mx-1">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Frete
                            <i class="bi bi-truck"></i>
                        </button>
                    </div>
                @endif

                @if (session()->get('cart') != null)
                    <div class="">
                        <a href="/carrinho/visualizar" class="btn btn-outline-success">Carrinho <i
                                class="bi bi-cart-check"></i> </a>
                    </div>
                @endif

                <div class="mx-1">
                    <a type="button" href="/login" class="btn btn-success">Entre <i
                            class="bi bi-box-arrow-in-right"></i> </a>

                </div>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Calcular frete </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class=" mx-3 mt-3">
                    <h4>Local de Entrega <i style="width: 50px;" class=" mx-5 bi bi-truck"></i> </h4>

                </div>

                <form method="post" action="/frete" class="mt-2 ">
                    @csrf


                    <div class="col-auto">
                        <input type="text" name="address" class="form-control" id="address"
                            placeholder="Digite seu endereço ou frete">
                    </div>


                    <div class="modal-footer m-2">



                        <button type="submit" class="btn btn-success"><i class="bi bi-calculator"></i> Calcular</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                    </div>
                </form>


            </div>


        </div>



    </div>
    </div>
    </div>

    







        <section class="content">
            @yield('content')
        </section>
</body>




</html>
