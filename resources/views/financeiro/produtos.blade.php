
@extends('layouts.app')

@section('content')
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
 

<div class="container-fluid row pt-3 ">
    <div class="contaniner-fluid">
        <nav class="navbar navbar-expand-sm bg-light">
            <div class="container-fluid">               
                <div class="container navbar-nav justify-content-center  ">
                    <h1>{{"Produtos"}}</h1>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-sm-4">
        <table class="table  table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Produtos Mais Vendidos Mes Atual</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $produtos = $financeiromesatual->pluck('produtos')->toArray();
                    
                   $produtostotais = implode(",",$produtos);
                    $produtomesatual = explode(",",$produtostotais);
                    $produtosmesatual = array_count_values($produtomesatual); 
                    arsort($produtosmesatual);                 
                @endphp
                <tr>                                       
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                @foreach ( array_slice($produtosmesatual,0,5) as $key => $produto )

                <tr>                                       
                    <td>{{$key}}</td>
                    <td>{{$produto}}</td>
                </tr>
                    
                    
                @endforeach
                
            </tbody>
        </table>
        <br>

        <table class="table  table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Produtos Mais Vendidos Ultimo Mes</th>
                </tr>
            </thead>
            <tbody>
                @php
                $produtos = $financeiroultimomes->pluck('produtos')->toArray();
                
                    
                    $produtostotais = implode(",",$produtos);
                    $produtoultimomes = explode(",",$produtostotais);
                    $produtosultimomes = array_count_values($produtoultimomes); 
                    arsort($produtosultimomes); 
                   
                @endphp
                <tr>                                       
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                @foreach ( array_slice($produtosultimomes,0,5) as $key => $produto )

                <tr>                                       
                    <td>{{$key}}</td>
                    <td>{{$produto}}</td>
                </tr>
                    
                    
                @endforeach
                
            </tbody>
        </table>

    </div>
    <div class="col-sm-8 ">
        <form class="row g-3" action="/financas/produtos" method="GET">
            <div class="col-md-11">
                <select class="form-select" data-placeholder="Selecione o Mes" id="meses" name="meses">
                    <option data-default disabled selected>{{"Selecione o Mes"}}</option>
                    @foreach ($mesesano as $key => $value)
                    <option value="{{$key}}" {{$key == $mesatual ? "selected" :""}}>{{$value}}</option>   
                    @endforeach  
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
        </form> 
        <hr>
        <table class="table  table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Produtos Mais Vendidos Ultimo Mes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $produtostotal as $key => $produto )
                <tr>                                       
                    <td>{{$key}}</td>
                    <td>{{$produto}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$( '#meses' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );
</script>
@endsection