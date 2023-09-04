<?php

namespace App\Http\Controllers;

use App\Models\Financeiro;
use App\Models\Produtos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentTime = Carbon::now();
        $currentTime = strtotime( $currentTime);
        $currentTime = date('-m-' ,$currentTime);
        $ultimomes = strtotime('-1 month');        
        $ultimomes = date('-m-' ,$ultimomes);
        $financeiroultimomes = Financeiro::where([['status',1],['data','like','%'.$ultimomes.'%']])->get();
        $financeiromesatual = Financeiro::where([['status',1],['data','like','%'.$currentTime.'%']])->get();

        
        $mesesano = [
            '01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio','06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'];

        $meses = array_values($mesesano);
       

        //Grafico
        $mes = array_keys($mesesano);

        for ($i=0; $i < 12; $i++) { 
            $mounth[] = "-$mes[$i]-";
        }
        
        $mescoust = count($mounth);
        
        for ($i=0; $i < $mescoust ; $i++) {

            $datas[] = Financeiro::where([['status',1],['data','like','%'.$mounth[$i].'%']])->pluck('lucro')->toArray();

            $valorvendar[] = Financeiro::where([['status',1],['data','like','%'.$mounth[$i].'%']])->pluck('valor')->toArray();
            
         }
         
         for ($i=0; $i < $mescoust ; $i++) {
        
       
            $data['label'][] = $meses[$i];
            $data['data'][]  = array_sum($datas[$i]); 
            $data['vendas'][]  = array_sum($valorvendar[$i]);
             
         }   
         

        $data['chart_data'] = json_encode($data);

        return view('financeiro.index',compact('financeiroultimomes','financeiromesatual','meses','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Financeiro $financeiro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Financeiro $financeiro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Financeiro $financeiro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Financeiro $financeiro)
    {
        //
    }
    public function produtos(Request $request)
    {
        $currentTime = Carbon::now();
        $currentTime = strtotime( $currentTime);
        $currentTime = date('-m-' ,$currentTime);
        $ultimomes = strtotime('-1 month');        
        $ultimomes = date('-m-' ,$ultimomes);
        $financeiroultimomes = Financeiro::where([['status',1],['data','like','%'.$ultimomes.'%']])->get();
        $financeiromesatual = Financeiro::where([['status',1],['data','like','%'.$currentTime.'%']])->get();

        
        $mesesano = [
            '01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio','06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'];

        $meses = array_values($mesesano);

        //search
        $mesatual = "";
        $mesatual = $request->input('meses');
        $mes = '-'.$request->input('meses').'-';
        
        $produtostotal = Financeiro::where([['status',1],['data','like','%'.$mes.'%']])->pluck('produtos')->toArray();

        $produtostotal = implode(",",$produtostotal);
        $produtostotal = explode(",",$produtostotal);
        $produtostotal = array_count_values($produtostotal); 
        arsort($produtostotal); 

        return view('financeiro.produtos',compact('financeiroultimomes','financeiromesatual','meses','produtostotal','mesesano','mesatual'));
    }
}
