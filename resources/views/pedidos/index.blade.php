@extends('layouts.app')

@section('content')
<div class="container ">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Pedidos"}}</h1>
            </div>
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
      <th scope="col">Desconto</th>
      <th scope="col">Entrega</th>
      <th scope="col">Observação</th>
      <th scope="col">Status</th>
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
      <td>{{$pedido->desconto}}</td>
      <td>{{$pedido->entrega == 1 ? "Entregar" : "Retirar"}}</td>
      <td>{{$pedido->observacao}}</td>
      <td >{{$pedido->status == 1 ? "Finalizado":"Pendente"}}</td>
      <td> 
      <div class="btn-group">
            <button class="btn btn-outline-light text-dark" onclick="window.location.href='{{route('pedidos.edit', ['pedido' => $pedido->id])}}';"><i class="bi bi-pencil-square"></i></button>

            <form method="post" action="{{route("pedidos.destroy", ["pedido" => $pedido->id])}}">
            @method("DELETE")
            @csrf
            <button class="btn btn-outline-light text-dark" type="submit"{{$pedido->status == 1 ? "disabled" : ""}}><i class="bi bi-trash"></i></button> 
            </form>
      </div> 
      </td>
    </tr>
@endforeach 
  </tbody>
</table>
</div>
@endsection
