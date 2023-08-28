@extends('layouts.app')

@section('content')
<div class="container ">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Clientes"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("clientes.create") }}"><i class="bi bi-plus-lg"></i></a>
                </li>            
            </ul>
        </div>
    </nav>
</div>
@if ($message = Session::get("success"))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
<div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome Completo</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereço</th>
      <th scope="col">Idade</th>
      <th scope="col">Nome Filho</th>
      <th scope="col">Idade Filho</th>
      <th scope="col">Aniversario</th>
      <th scope="col">Aniversario Filho</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $clientes as $cliente)
    <tr>
      <th scope="row">{{$cliente->id}}</th>
      <td>{{$cliente->nome}} {{$cliente->sobrenome}}</td>
      <td>{{$cliente->telefone}}</td>
      <td>{{$cliente->endereco}}</td>
      <td>{{$cliente->idade}}</td>
      <td>{{$cliente->nomefilho}}</td>
      <td>{{$cliente->idadefilho}}</td>
      @php
      $datacliente =  $cliente->aniversariocliente;
                  $datacliente = explode("-",$datacliente);
                  $dia = $datacliente[2];
                  $mes = $datacliente[1]; 
                  $datacliente = [$dia,$mes];
                  $datacliente = implode("-", $datacliente);
      
      @endphp
      <td>{{$datacliente}}</td>
      @php
      $datafilho =  $cliente->aniversariocliente;
                  $datafilho = explode("-",$datafilho);
                  $dia = $datafilho[2];
                  $mes = $datafilho[1]; 
                  $datafilho = [$dia,$mes];
                  $datafilho = implode("-", $datafilho);
      
      @endphp
      <td>{{$datafilho}}</td>
      <td> 
            <button class="btn btn-outline-light text-dark" onclick="window.location.href='{{route('clientes.edit', ['cliente' => $cliente->id])}}';"><i class="bi bi-pencil-square"></i></button>
       
      </td>

    </tr>
@endforeach 
  </tbody>
</table>
</div>
@endsection
