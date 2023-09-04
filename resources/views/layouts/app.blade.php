<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MilaMih</title>
    <link rel="icon" type="images/x-icon" href="img/logomilamih.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar  bg-primary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand navbar-dark" href="{{ url('/') }}"><i class="bi bi-house"></i></a>
                    <img src="img/logomilamihwhite.png" width="50" height="40"> 
                        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{'MilaMih'}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>                       
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('clientes.index') }}">{{'Clientes'}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('produtos.index') }}">{{'Produtos'}}</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('pedidos.index') }}">{{'Pedidos'}}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{'Finanças'}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('financeiro.index') }}">{{ __('Financeiro') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ route('financeiro.produtos') }}">{{ __('Relatorio Produtos') }}</a></li>
                                    </ul>
                                </li>                                                               
                            </ul>      
                        </div>
                    </div>
                </div>
        </nav> 

        <main class="pt-5">
            @yield('content')
        </main>
    </div>
     
</body>
</html>
