<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MilaMih</title>
    
<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    
</head>
<body><div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Pedido"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="http://localhost:8000/pedido"><i class="bi bi-arrow-clockwise"></i></a>
                </li>            
            </ul>
        </div>
    </nav>
</div>
<div class="container-md">
<form class=" row g-3" action="/pedido" method="GET">
  @csrf
 
  <div class="col-md-12 pt-4">
    
    <select class="form-select"  data-placeholder="Select the Product" size="5" id="produtos" name="produtos[]" multiple>
    @foreach ( $produtos as $produto)
      <option value="{{$produto->id}}" {{(in_array($produto->id, $products)) ? 'selected' : ''}}>{{$produto->produto}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-12 pt-5" style="height: 300px;">
  </div>
  <div class="col-md-2 pt-5" style="text-align: right;">
    <label for="desconto" class="form-label">Desconto</label>
  </div>
  <div class="col-md-2 pt-5" >
 <input type="text"  class="form-control"  name="desconto" id="desconto" value="{{$desconto}}" >
  </div>
  <div class="col-md-4 pt-5">
  </div>
  <div class="col-md-2 pt-5">
   <input type="text" readonly class="form-control" name="valor" id="valor" value="{{$total}}">
  </div> 
  <div class="col-1 pt-5">
    <button type="submit" class="btn btn-primary">Calcular</button>
  </div>
</form>
</div>
<div class="container pt-5 ">
 <div>
 
 @if ($products[0] != "")
 @php
 $products = implode(",",$products);
 @endphp
 Prosseguir com o Pedido <a href="{{ route("pedido.pedido", ["produtos" => $products,"desconto" => $desconto]) }}" class="btn btn-primary"><i class="bi bi-arrow-right-short"></i></a>     
 @endif
  
  </div>
</div>  
    </body>
</html>
<script>
$('#produtos').select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: true,
} );




</script>