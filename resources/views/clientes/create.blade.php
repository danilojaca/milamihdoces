@extends('layouts.app')

@section('content')
 <div class="container">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Clientes"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("clientes.index") }}"><i class="bi bi-reply"></i></a>
                </li>            
            </ul>
        </div>
    </nav>
</div>
<div class="container">
<form class="row g-3" action="{{route("clientes.store")}}" method="POST">
  @csrf 
  <div class="col-md-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome"  >
  </div>
  <div class="col-md-4">
    <label for="sobrenome" class="form-label">SobreNome</label>
    <input type="text" class="form-control" id="sobrenome" name="sobrenome">
  </div>
  <div class="col-md-1">
    <label for="idade" class="form-label">Idade</label>
    <input type="number" class="form-control" id="idade" name="idade" minlength="1"
  maxlength="2">
  </div>  
  <div class="col-md-4">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="tel" class="form-control" id="telefone" name="telefone" minlength="9"
  maxlength="9" pattern="[0-9]{9}">
  </div>
  <div class="col-12">
    <label for="endereco" class="form-label">Endereço</label>
    <input type="text" class="form-control"  id="endereco" name="endereco" >
  </div> 
  <div class="col-md-3">
    <label for="filho" class="form-label">Nome Filho</label>
    <input type="text" class="form-control" id="nomefilho" name="nomefilho">
  </div>
  <div class="col-md-1">
    <label for="filho" class="form-label">Idade Filho</label>
    <input type="number" class="form-control" id="idadefilho" name="idadefilho">
  </div>
  <div class="col-md-3 row pt-3">
    <label for="aniversariocliente" class="form-label">Aniversario</label>
      <div class="col-md-6">
    <select class="form-select" aria-label="Default select example" id="aniversariocliente" name="aniversariocliente[]">
    <option data-default disabled selected >{{"Dia"}}</option>
    @foreach ($dias as  $dia)
    <option value="{{$dia}}">{{$dia}}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-6">
    <select class="form-select" aria-label="Default select example" id="aniversariocliente" name="aniversariocliente[]">
    <option data-default disabled selected >{{"Mes"}}</option>
    @foreach ($meses as $key => $mes)
    <option value="{{$key}}">{{$mes}}</option>
    @endforeach
    </select>
    </div>
  </div>
  <div class="col-md-3 row pt-3">
    <label for="aniversariofilho" class="form-label">Aniversario do FIlho</label>
      <div class="col-md-6">
    <select class="form-select" aria-label="Default select example" id="aniversariofilho" name="aniversariofilho[]">
    <option data-default disabled selected >{{"Dia"}}</option>
    @foreach ($dias as  $dia)
    <option value="{{$dia}}">{{$dia}}</option>
    @endforeach
    </select>
    </div>
    <div class="col-md-6">
    <select class="form-select" aria-label="Default select example" id="aniversariofilho" name="aniversariofilho[]">
    <option data-default disabled selected >{{"Mes"}}</option>
    @foreach ($meses as $key => $mes)
    <option value="{{$key}}">{{$mes}}</option>
    @endforeach
    </select>
    </div>
  </div>
  <div class="col-11 ">
  </div>
  <div class="col-1 ">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</div>
@endsection
