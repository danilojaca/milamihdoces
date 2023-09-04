@extends('layouts.app')

@section('content')
<div class="container ">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <img src="img/milamih.png" width="300" height="100">                
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid row pt-1 ">
    <div class="col-sm-7">
        <table class="table table-danger table-bordered border-danger" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="6"><a style="text-decoration: none;color:black;" href="#" onclick="openWinPedidosdoDia()">Pedidos do Dias</a></th>
                </tr>
                
            </thead>
            
        </table>
       
    </div>
    <div class="col-sm-5">
    <table class="table table-secondary table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="6"><a style="text-decoration: none;color:black;" href="#" onclick="openWinPedidos()">Pedido<i class="bi bi-cart"></i></a></th>
                </tr>
                
            </thead>
            
        </table>
    
    </div>
    <div class="col-sm-7">
        <table class="table table-bordered border-warning" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Pedidos dos Proximos 10 dias</th>
                </tr>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Observação</th>
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
                    <td>{{$pedido->entrega == 1 ? "Entregar" : "Retirar"}}</td>
                    <td>{{$pedido->observacao}}</td>
                </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
    <div class="col-sm-5">
    <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Aniversarios dos Proximos 10 dias</th>
                </tr>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $aniversarioclientes as $aniversario)
                @php
                $nome = "0";
                $data = "0";
                if( $aniversario->aniversariocliente >= $more10daytomorrow && $aniversario->aniversariocliente <= $more10day){

                  $nome = "$aniversario->nome $aniversario->sobrenome";
                  $data =  $aniversario->aniversariocliente;
                  $data = explode("-",$data);
                  $dia = $data[2];
                  $mes = $data[1]; 
                  $data = [$dia,$mes];
                  $data = implode("-", $data);

                }
                if(( $aniversario->aniversariofilho >= $more10daytomorrow && $aniversario->aniversariofilho <= $more10day)){

                    $nome = "$aniversario->nomefilho Filho[a] do[a] $aniversario->nome $aniversario->sobrenome";
                    $data =  $aniversario->aniversariofilho;
                    $data = explode("-",$data);
                    $dia = $data[2];
                    $mes = $data[1]; 
                    $data = [$dia,$mes];
                    $data = implode("-", $data);

                }
                @endphp
                <tr>
                <th scope="row">{{$data}}</th>
                <td>{{$nome}}</td>
                </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
<script>

let myWindow1;
let myWindow2;

function openWinPedidosdoDia() {
  myWindow1 = window.open("http://localhost:8000/pedidosdodia", "_blank", "width=800,height=800");
 
}

function openWinPedidos() {
  myWindow2 = window.open("http://localhost:8000/pedido", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=500,width=800,height=700");
}


</script>
@endsection
