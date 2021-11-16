<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles.css">

</head>




<body style="background-color:black;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <a class="navbar-brand" href="#">Impeto Plataforma</a>
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

                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Novidade</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Menor Preço</a>
                    </li>


                </ul>

            </div>

            <div class="container-fluid col-sm-1">
                <button type="button" class="btn btn-light btn-lg" style="margin-left:50px; text-align: center;font-size: 20px;">Carrinho
                    <img src="https://cdn-icons-png.flaticon.com/512/126/126510.png" style="width: 40px;" class="rounded float-end" alt="...">
                </button>


            </div>

            <div class="container-fluid col-sm-1">
                <div>
                    <img src="https://cdn.icon-icons.com/icons2/1769/PNG/512/4092564-about-mobile-ui-profile-ui-user-website_114033.png" style="width: 60px; margin:20px 10px " class="rounded float-end" alt="...">
                </div>

                <div class="list-group row-sm-1" style="text-align: center; font-size: 12px;">
                    <a href="#" class="list-group-item list-group-item-action">Acessar Conta</a>
                    <a href="#" class="list-group-item list-group-item-action">Cadastrar-se</a>
                </div>
            </div>

        </nav>
    </header>

    

    <section class="content">
        @yield('content')
    </section>
</body>

</html>