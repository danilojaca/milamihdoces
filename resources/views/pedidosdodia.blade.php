<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MilaMih</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid ">
        <table class="table table-bordered border-danger" id="entrega10dias">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center" colspan="6">Pedidos do Dias</th>
                </tr>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Finalizar</th>
                </tr>
            </thead>
            <tbody class="table-bordered border-danger table-danger">
                @foreach ( $pedidoshoje as $hoje)
                <tr>
                @php
                $data = $hoje->data;
                $data = explode("-", $data);
                $data = array_reverse($data);
                $data = implode("-", $data);
                @endphp
                    <th scope="row">{{$data}}</th>
                    <td>{{$hoje->cliente->nome}} {{$hoje->cliente->sobrenome}}</td>
                    <td>{{$hoje->produtos}}</td>                    
                    <td>{{$hoje->entrega == 1 ? "Entregar" : "Retirar"}}</td>
                    <td>{{$hoje->observacao}}</td>
                    <td style="text-align:center">
                    <form method="post" action="{{route("pedidos.finalizar", ["pedido" => $hoje->id])}}">
                    @method("PATCH")
                    @csrf
                    <button class="btn btn-outline-light text-dark" onclick="window.location.href='{{route('pedidos.finalizar', ['pedido' => $hoje->id])}}';"><i class="bi bi-check-lg"></i></button></form></td>
                </tr>
                @endforeach     
            </tbody>
        </table>
       
    </div>
    </body>
</html>

