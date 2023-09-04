<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Clientes;
use App\Models\Produtos;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        // Pedidos com entregas nos proximos 10 dias
        $currentTime = Carbon::now();
        $currentTime = strtotime( $currentTime);
        $currentTime = date('Y-m-d' ,$currentTime);
        $tomorrow = strtotime('+1 days');        
        $tomorrow = date('Y-m-d' ,$tomorrow);

        $more10dayTime = strtotime('+10 days');
        $more10dayTime = date('Y-m-d' ,$more10dayTime);
        
        $pedidos = Pedidos::whereBetween('data',[$tomorrow, $more10dayTime])->orderBy('data')->get();

        // Pedidos com entregas nos Dias
        $pedidoshoje = Pedidos::where([['data',$currentTime],['status',0]])->orderBy('data')->get();



        // Clientes com o Aniversario daqui a 10 dias 
        $more10day = strtotime('+10 days');
        $more10day = date('0000-m-d' ,$more10day);

        $more10daytomorrow = strtotime('+1 days');
        $more10daytomorrow = date('0000-m-d' ,$more10daytomorrow);
        

        $aniversarioclientes = Clientes::whereBetween('aniversariocliente',[$more10daytomorrow, $more10day])->orwhereBetween('aniversariofilho',[$more10daytomorrow, $more10day])->orderBy('aniversariofilho')->get();

        
        return view('home',compact('pedidos','aniversarioclientes','more10day','more10daytomorrow','pedidoshoje'));
    }

    public function pedidosdodia(){

        
        $currentTime = Carbon::now();
        $currentTime = strtotime( $currentTime);
        $currentTime = date('Y-m-d' ,$currentTime);
        // Pedidos com entregas nos Dias
        $pedidoshoje = Pedidos::where([['data',$currentTime],['status',0]])->orderBy('data')->get();
       
        return view('pedidosdodia',compact('pedidoshoje'));

    }
}
