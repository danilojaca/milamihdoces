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
        </div>
    </nav>
</div>
<div class="container-lg">
<form class=" row g-3" action="{{route("pedidos.store")}}" method="POST">
  @csrf 
  <div class="col-md-2">
  <input type="hidden" class="form-control" id="produtos" name="produtos" value="{{$produtos}}" >
  <input type="hidden" class="form-control" id="desconto" name="desconto" value="{{$desconto}}" >
  </div>
  <div class="col-md-3">
    <label for="data" class="form-label">Data</label>
    <input type="date" class="form-control" id="data" name="data"  >
  </div>
  <div class="col-md-6">
    <label for="cliente_id" class="form-label">Cliente</label>
    <select cclass="form-select"  data-placeholder="Selecione o Cliente" id="cliente_id" name="cliente_id">
    <option data-default disabled selected>{{"Selecione o Cliente"}}</option>
    @foreach ($clientes as $cliente)
    <option value="{{$cliente->id}}">{{$cliente->nome}} {{$cliente->sobrenome}}</option>
    @endforeach
    </select>
  </div> 
  <div class="col-md-2">
  </div>
  <div class="col-7">
    <label for="observacao" class="form-label">Observação</label>
    <textarea type="text" class="form-control"  id="observacao" name="observacao" ></textarea>
  </div> 
  <div class="col-2 pt-5 ">
  <input class="form-check-input " type="checkbox" id="entrega" name="entrega" value="1">
  <label for="entrega" class="form-label">Entrega</label>
  </div>
  <div class="col-10 ">
  </div>
  <div class="col-1">
    <button type="submit"  class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>
<script>
$( '#cliente_id' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );
function closeWin() {
  myWindow.close();
}
</script>
</body>
</html>
