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
<form class=" row g-3" action="{{route("pedidos.store")}}" method="POST">
  @csrf 
  <div class="col-md-3">
  </div>
  <div class="col-md-2">
    <label for="data" class="form-label">Data</label>
    <input type="date" class="form-control" id="data" name="data"  >
  </div>
  <div class="col-md-5">
    <label for="cliente_id" class="form-label">Cliente</label>
    <select class="form-select" aria-label="Default select example" id="cliente_id" name="cliente_id">
    <option data-default disabled selected >{{"Selecione o Cliente"}}</option>
    @foreach ($clientes as $cliente)
    <option value="{{$cliente->id}}">{{$cliente->nome}} {{$cliente->sobrenome}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-3">
  </div>
  <div class="col-md-5">
    <label for="produtos" class="form-label">Produtos</label>
    <select class="form-select" multiple aria-label="multiple select example" id="produtos" name="produtos[]">
    @foreach ( $produtos as $produto)
      <option value="{{$produto->id}}" >{{$produto->produto}}</option>
    @endforeach
    </select>
  </div>  
  <div class="col-md-2">
    <label for="entrega" class="form-label">Entrega</label>
    <select class="form-select" aria-label="Default select example" id="entrega" name="entrega">
    <option data-default disabled selected >{{" Modo de Entrega"}}</option>
    @foreach ($entrega as $entrega)
    <option value="{{$entrega}}">{{$entrega}}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-3">
  </div>
  <div class="col-7">
    <label for="observacao" class="form-label">Observação</label>
    <textarea type="text" class="form-control"  id="observacao" name="observacao" ></textarea>
  </div> 
  <div class="col-3 ">
  </div>
  <div class="col-1">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>
@endsection
