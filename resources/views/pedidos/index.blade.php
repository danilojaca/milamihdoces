@extends('layouts.app')

@section('content')
<div class="container ">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Pedidos"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("pedidos.create") }}"><i class="bi bi-plus-lg"></i></a>
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
      <th scope="col">Data</th>
      <th scope="col">Cliente</th>
      <th scope="col">Produto</th>
      <th scope="col">Valor</th>
      <th scope="col">Lucro</th>
      <th scope="col">Entrega</th>
      <th scope="col">Observação</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $pedidos as $pedido)
    <tr>
    @php
      $data = $pedido->data;
      $data = explode("-", $data);
      $data = array_reverse($data);
      $data = implode("-", $data);
    @endphp
      <th scope="row">{{$data}}</th>
      <td>{{$pedido->cliente->nome}} {{$pedido->cliente->sobrenome}}</td>
      <td>{{$pedido->produtos}}</td>
      <td>{{$pedido->valor}}</td>
      <td>{{$pedido->lucro}}</td>
      <td>{{$pedido->entrega}}</td>
      <td>{{$pedido->observacao}}</td>
      <td> 
            <button class="btn btn-outline-light text-dark" onclick="window.location.href='{{route('pedidos.edit', ['pedido' => $pedido->id])}}';"><i class="bi bi-pencil-square"></i></button>
       
      </td>
    </tr>
@endforeach 
  </tbody>
</table>
</div>
@endsection
