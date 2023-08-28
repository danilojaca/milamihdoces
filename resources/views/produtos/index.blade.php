@extends('layouts.app')

@section('content')
<div class="container ">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Produtos"}}</h1>
            </div>
            <ul class="navbar-nav">      
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route("produtos.create") }}"><i class="bi bi-plus-lg"></i></a>
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
      <th scope="col">Produto</th>
      <th scope="col">Valor de Custo</th>
      <th scope="col">Valor de Venda</th>
      <th scope="col">Descriçao</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $produtos as $produto)
    <tr>
      <th scope="row">{{$produto->id}}</th>
      <td>{{$produto->produto}}</td>
      <td>{{$produto->valorcusto}}</td>
      <td>{{$produto->valortotal}}</td>
      <td>{{$produto->descricao}}</td>
      <td> 
            <button class="btn btn-outline-light text-dark" onclick="window.location.href='{{route('produtos.edit', ['produto' => $produto->id])}}';"><i class="bi bi-pencil-square"></i></button>
       
      </td>

    </tr>
@endforeach 
  </tbody>
</table>
</div>
@endsection
