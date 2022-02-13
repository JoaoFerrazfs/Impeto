<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!--JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css">

</head>




<body class="container-fluid" style="background-color:black;">
    <header>
        <nav class=" container navbar navbar-expand-lg navbar-dark bg-dark">

            <a class="navbar-brand" href="/">Impeto Plataforma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>

            <div class="col-sm-7">
                <form class="container-fluid">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="O que você precisa?" aria-label="Username" aria-describedby="basic-addon1">
                        <button class="btn btn-sm btn-outline-secondary" type="button">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Novidade</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Menor Preço</a>
                    </li> -->


                </ul>

            </div>
            @auth
            <div class="col mx-5">
                <a type="button" href="/carrinho/visualizar" style="text-align: center; font-size: 12px;" class="btn btn-light btn-lg" >Carrinho
                </a>


            </div>
            @endauth

            <div class="col">
                <a type="button" href="/login" style="text-align: center; font-size: 12px;" class="btn btn-success btn-lg" >Entre
                </a>


            </div>

        </nav>
    </header>



    <section class="content">
        @yield('content')
    </section>
</body>

</html>