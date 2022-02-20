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

    <!--Icones-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body style="background-color: black;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Impeto</a>

                <form class="container-fluid d-flex">
                    <input class="form-control me-2" type="search" placeholder="O que você precisa?" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i> </button>
                </form>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                </ul>

                @auth
                <div class="">
                    <a type="button" href="/carrinho/visualizar"class="btn btn-outline-success">Carrinho <i class="bi bi-cart-check"></i> </a>
                </div>
                @endauth

                <div class="mx-1">
                    <a type="button" href="/login" class="btn btn-success">Entre <i class="bi bi-box-arrow-in-right"></i> </a>
                   
                </div>
            </div>
        </div>
    </nav>

    <section class="content">
        @yield('content')
    </section>
</body>




</html>