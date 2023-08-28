<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MilaMih</title>

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
<body><div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Pedidos"}}</h1>
            </div>
        </div>
    </nav>
</div>
<div class="container">
<form class=" row g-3" action="/pedido" method="GET">
  @csrf
  <div class="col-md-12">
    <label for="produtos" class="form-label">Produtos</label>
    <select class="form-select" size="5" multiple aria-label="multiple select example" id="produtos" name="produtos[]">
    @foreach ( $produtos as $produto)
      <option value="{{$produto->id}}" >{{$produto->produto}}</option>
    @endforeach
    </select>
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div> 
  <div class="col-md-12">
  </div>
  <div class="col-md-5">
  <input type="text" readonly class="form-control" name="valor" id="valor" value="{{$total}}">
  </div>
  <div class="col-md-5">
  </div> 
  <div class="col-1">
    <button type="submit" class="btn btn-primary">Calcular</button>
  </div>
</form>
</div>
    </body>
</html>