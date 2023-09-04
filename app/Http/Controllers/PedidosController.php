<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Produtos;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos= Pedidos::orderBy('created_at')->get();
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrega= array('Entrega','Retirada');
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pedidos.create',compact('clientes','produtos','entrega'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = $request->produtos;
        $products = explode(",",$request->produtos);
        
        $produtos = Produtos::whereIn('id', $products)->pluck('produto')->toArray();
        $valor = Produtos::whereIn('id', $products)->pluck('valortotal')->toArray();
        $custo = Produtos::whereIn('id', $products)->pluck('valorcusto')->toArray();
        $desconto = $request->input('desconto');
        $valor = array_sum($valor);
        $custo = array_sum($custo);
        $lucro = (($valor - $custo)- $desconto);
        $produtos = implode(",",$produtos);

        $entrega = $request->input('entrega');
        if ($entrega != 1) {

        $entrega = 0;
            
        }
        $pedido = Pedidos::create([
            'data' => $request->input('data'),
            'cliente_id' => $request->input('cliente_id'),
            'entrega' => $entrega,
            'valor' => $valor,
            'custo' => $custo,
            'lucro' => $lucro,
            'desconto' => $desconto,
            'produtos' => $produtos,
            'observacao' => $request->input('observacao'),
            'status' => 0

        ]);
         
        return redirect()->route('pedido.pedidocalcular');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request,Pedidos $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedido)
    {
        $pedidos = $pedido->produtos;
        $pedidos = explode(", ",$pedidos);
        $pedidos = Produtos::whereIn('produto',$pedidos)->pluck('id')->toArray();
        //dd($pedidos);
        $entrega= array('Entrega','Retirada');
        $produtos = Produtos::all();
        $clientes = Clientes::all();
        return view('pedidos.edit',compact('clientes','produtos','entrega','pedidos','pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedido)
    {
       //dd($request->all());
       $produtos = Produtos::whereIn('id', $request->produtos)->pluck('produto')->toArray();
       $valor = Produtos::whereIn('id', $request->produtos)->pluck('valortotal')->toArray();
       $custo = Produtos::whereIn('id', $request->produtos)->pluck('valorcusto')->toArray();
       $desconto = $request->input('desconto');
       $valor = array_sum($valor);
       $custo = array_sum($custo);
       $lucro = (($valor - $custo)- $desconto);
       $produtos = implode(",",$produtos);
       $entrega = $request->input('entrega');
        if ($entrega != 1) {

        $entrega = 0;
            
        }
       
       $pedido->update([
           'data' => $request->input('data'),
           'cliente_id' => $request->input('cliente_id'),
           'entrega' => $entrega,
           'valor' => $valor,
           'custo' => $custo,
           'lucro' => $lucro,
           'desconto' => $desconto,
           'produtos' => $produtos,
           'observacao' => $request->input('observacao'),
           'status' => 0

       ]);

       return redirect()->route('pedidos.index')
                       ->with('sucess','Pedido Editado com Sucesso');
   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }

    public function finalizar( Pedidos $pedido){

               
       $pedido->update([
           'status' => 1

       ]);

       return redirect()->route('pedidosdodia');
    }

    public function pedidocalcular(Request $request)
    {   $products = array("","");
        $token = $request->input('_token')
        ;
        if ($request->produtos != "") {
            $products = $request->produtos;
        }
        $desconto = 0;
        $total = 0;
        
        if (isset($token)) {
            $desconto = $request->input('desconto') != "" ? $request->input('desconto') : 0 ;
            $produto = $request->produtos;
            $total = Produtos::whereIn('id',$produto)->pluck('valortotal')->toArray();
            $total = array_sum($total);
            $total = ($total - $desconto);
            $total = number_format($total,2, ".", ",");
        }
        
        
        $produtos = Produtos::orderBy('produto')->get();
        return view('pedidos.pedido',compact('produtos','total','products','desconto'));
    }
    public function pedido(Request $request,$produtos,$desconto)
    {  
        $clientes = Clientes::all();
        return view('pedidos.create',compact('clientes','produtos','desconto'));
    }
}
