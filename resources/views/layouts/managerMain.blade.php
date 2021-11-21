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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/stylesManager.css">



</head>




<body class="container-fluid" style="background-color:black;">
    <header class="container-fluid">
        <nav class=" container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Impeto Plataforma</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <nav class="container-fluid nav_button">
                <a href="/meusProdutos/{{ auth()->user()->_id}}" type="button" class="btn btn-outline-light ">
                    <ion-icon name="library-outline"></ion-icon>
                    Produtos Cadastrados
                </a>

                <a type="button" class="btn btn-outline-light ">
                    <ion-icon name="document-text-outline"></ion-icon>
                    Pedidos
                </a>

                <a type="button" class="btn btn-outline-light ">
                    <ion-icon name="notifications-outline"></ion-icon>
                    Notificações
                </a>
            </nav>

            <nav class="container-fluid nav_button">

                <div class="container" style="margin-left:5px;">
                    <a type="button" class="btn btn-outline-light ">
                        <img src="https://cdn.icon-icons.com/icons2/1769/PNG/512/4092564-about-mobile-ui-profile-ui-user-website_114033.png" class="img-fluid img-thumbnail" alt="Responsive image">
                    </a>
                </div>
                <a style="color: white;">Plataforma Impeto</a>
                </div>



                <div class="container" style="margin-left: 180px;">
                    <a type="button" class="btn btn-outline-light ">
                        <img src="https://cdn.icon-icons.com/icons2/1769/PNG/512/4092564-about-mobile-ui-profile-ui-user-website_114033.png" class="img-fluid img-thumbnail" alt="Responsive image">
                    </a>
                </div>

                <div>
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                João Pedro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Meu dados</a></li>
                                <li><a class="dropdown-item" href="#">Segurança</a></li>
                                <li><a class="dropdown-item" href="#">Privacidade</a></li>
                                <li><a class="dropdown-item" href="#">Gerenciar Empresa</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>


                <div>


                </div>

            </nav>

        </nav>
    </header>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <section class="content">
        @yield('content')
    </section>
</body>

</html>