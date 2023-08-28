@extends('layouts.app')

@section('content')
 <div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Produtos"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("produtos.index") }}"><i class="bi bi-reply"></i></a>
                </li>            
            </ul>
        </div>
    </nav>
</div>
<div class="container">
<form class="row g-3" action="{{route("produtos.store")}}" method="POST">
  @csrf 
  <div class="col-md-6">
    <label for="produto" class="form-label">Produto</label>
    <input type="text" class="form-control" id="produto" name="produto"  >
  </div>
  <div class="col-md-2">
    <label for="valorcusto" class="form-label">Valor de Custo</label>
    <input type="text" class="form-control" id="valorcusto" name="valorcusto">
  </div>
  <div class="col-md-2">
    <label for="valortotal" class="form-label">Valor de Venda</label>
    <input type="text" class="form-control" id="valortotal" name="valortotal">
  </div>
  <div class="col-md-5">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" rows="4" name="descricao"></textarea>
  </div>
  <div class="col-11 ">
  </div>
  <div class="col-1 ">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>
@endsection
