@extends('layouts.app')

@section('content')
<div class="container-fluid row pt-3 ">
<div class="contaniner-fluid">
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">               
            <div class="container navbar-nav justify-content-center  ">
                <h1>{{"Financeiro"}}</h1>
            </div>
        </div>
    </nav>
    </div>
    <div class="col-sm-4">
        <table class="table  table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Financeiro Mes Atual</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $valortotal = $financeiromesatual->pluck('valor')->toArray();
                    $valortotal = array_sum($valortotal);
                    $valortotal = number_format($valortotal,2, ".", ",");
                    $lucrototal = $financeiromesatual->pluck('lucro')->toArray();
                    $lucrototal = array_sum($lucrototal);
                    $lucrototal = number_format($lucrototal,2, ".", ",");
                    $quantidadesprodutos = $financeiromesatual->pluck('produtos')->toArray();
                    $quantidadesprodutos = count($quantidadesprodutos);
                @endphp
                <tr>
                    <th>Quantidade de Vendas</th>
                    <td>{{$quantidadesprodutos}}</td>
                </tr>
                <tr>
                    <th>Valor Total Vendido</th>
                    <td>R$ {{$valortotal}}</td>
                </tr>
                <tr>
                    <th>Lucro Total</th>
                    <td>R$ {{$lucrototal}}</td>
                </tr>
            </tbody>
        </table>
        <br>

        <table class="table  table-bordered border-dark" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="5">Financeiro Ultimo Mes</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $valortotal = $financeiroultimomes->pluck('valor')->toArray();
                    $valortotal = array_sum($valortotal);
                    $valortotal = number_format($valortotal,2, ".", ",");
                    $lucrototal = $financeiroultimomes->pluck('lucro')->toArray();
                    $lucrototal = array_sum($lucrototal);
                    $lucrototal = number_format($lucrototal,2, ".", ",");
                    $quantidadesprodutos = $financeiroultimomes->pluck('produtos')->toArray();
                    $quantidadesprodutos = count($quantidadesprodutos);
                @endphp
                <tr>
                    <th>Quantidade de Vendas</th>
                    <td>{{$quantidadesprodutos}}</td>
                </tr>
                <tr>
                    <th>Valor Total Vendido</th>
                    <td>R$ {{$valortotal}}</td>
                </tr>
                <tr>
                    <th>Lucro Total</th>
                    <td>R$ {{$lucrototal}}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="col-sm-8">
        <div class="card chart-container">
            <canvas id="chart"></canvas>
        </div>
    </div>
    
</div>
    
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js">
src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script>
	var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
      const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: cData.label,
          datasets: [{
            label: 'Lucro Mensal',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: cData.data,
          },
          {
            label: 'Valor Vendido Mensal',
            backgroundColor: 'rgba(0, 255, 153, 1)',
            borderColor: 'rgb(0, 134, 24)',
            data: cData.vendas,
          }]
          
        },
       
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
</script>


@endsection