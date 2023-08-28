@extends('layouts.app')

@section('content')
 <div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Pedidos"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("pedidos.index") }}"><i class="bi bi-reply"></i></a>
                </li>            
            </ul>
        </div>
    </nav>
</div>
<div class="container">
<form class="row g-3" action="{{route("pedidos.update",["pedido" => $pedido->id])}}" method="POST">
  @method('PUT')
  @csrf 
  <div class="col-md-2">
    <label for="data" class="form-label">Data</label>
    <input type="date" class="form-control" id="data" name="data" value="{{$pedido->data}}" >
  </div>
  <div class="col-md-5">
    <label for="cliente_id" class="form-label">Cliente</label>
    <select class="form-select" aria-label="Default select example" id="cliente_id" name="cliente_id">
    <option data-default disabled selected >{{"Selecione o Cliente"}}</option>
    @foreach ($clientes as $cliente)
    <option value="{{$cliente->id}}" {{$pedido->cliente_id == $cliente->id ? 'selected' : ''}}>{{$cliente->nome}} {{$cliente->sobrenome}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-5">
    <label for="produtos" class="form-label">Produtos</label>
    <select class="form-select" multiple aria-label="multiple select example" id="produtos" name="produtos[]">
    @foreach ( $produtos as $produto)
      <option value="{{$produto->id}}" {{(in_array($produto->id, $pedidos)) ? 'selected' : ''}} >{{$produto->produto}}</option>
    @endforeach
    </select>
  </div>  
  <div class="col-md-3">
    <label for="entrega" class="form-label">Entrega</label>
    <select class="form-select" aria-label="Default select example" id="entrega" name="entrega">
    <option data-default disabled selected >{{"Selecione Modo de Entrega"}}</option>
    @foreach ($entrega as $entrega)
    <option value="{{$entrega}}"{{$pedido->entrega == $entrega ? 'selected' : ''}}>{{$entrega}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-9">
    <label for="observacao" class="form-label">Observação</label>
    <textarea type="text" class="form-control"  id="observacao" name="observacao" >{{$pedido->observacao}}</textarea>
  </div> 
  <div class="col-11 ">
  </div>
  <div class="col-1">
    <button type="submit" class="btn btn-primary">Editar</button>
  </div>
</form>
</div>
@endsection
