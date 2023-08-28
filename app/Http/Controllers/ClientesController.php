<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::orderBy('id')->get();
        return view ('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        for ($i = 1; $i <= 31; ++$i) {
            if ($i < 10){
            $dias[] = "0$i";
        }
        if ($i > 10){
            $dias[] = "$i";
        }
        }
        $meses = [
            '01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio','06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'];
        
        return view ('clientes.create',compact('dias','meses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aniversariocliente = $request->aniversariocliente;
        $dia = $aniversariocliente[0];
        $mes = $aniversariocliente[1];
        $ano = "0000";
        $aniversariocliente = [$ano,$mes,$dia];
        $aniversariocliente = implode("-",$aniversariocliente);
        $aniversariofilho = $request->aniversariofilho;
        $dia = $aniversariofilho[0];
        $mes = $aniversariofilho[1];
        $ano = "0000";
        $aniversariofilho = [$ano,$mes,$dia];
        $aniversariofilho = implode("-",$aniversariofilho);
        $cliente = Clientes::create([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobrenome'),
            'idade' => $request->input('idade'),
            'endereco' => $request->input('endereco'),
            'nomefilho' => $request->input('nomefilho'),
            'idadefilho' => $request->input('idadefilho'),
            'telefone' => $request->input('telefone'),
            'aniversariocliente' => $aniversariocliente,
            'aniversariofilho' => $aniversariofilho

        ]);

        return redirect()->route('clientes.index')
                                ->with('success','Edificio Criado com Sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        for ($i = 1; $i <= 31; ++$i) {
            if ($i < 10){
            $dias[] = "0$i";
        }
        if ($i > 10){
            $dias[] = "$i";
        }
        }
        $meses = [
            '01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio','06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro'];
        
        return view ('clientes.edit',compact('dias','meses','cliente'));; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $cliente)
    {
        $aniversariocliente = $request->aniversariocliente;
        $dia = $aniversariocliente[0];
        $mes = $aniversariocliente[1];
        $ano = "0000";
        $aniversariocliente = [$ano,$mes,$dia];
        $aniversariocliente = implode("-",$aniversariocliente);
        $aniversariofilho = $request->aniversariofilho;
        $dia = $aniversariofilho[0];
        $mes = $aniversariofilho[1];
        $ano = "0000";
        $aniversariofilho = [$ano,$mes,$dia];
        $aniversariofilho = implode("-",$aniversariofilho);
        $cliente->update([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobrenome'),
            'idade' => $request->input('idade'),
            'endereco' => $request->input('endereco'),
            'nomefilho' => $request->input('nomefilho'),
            'idadefilho' => $request->input('idadefilho'),
            'telefone' => $request->input('telefone'),
            'aniversariocliente' => $aniversariocliente,
            'aniversariofilho' => $aniversariofilho

        ]);

        return redirect()->route('clientes.index')
                                ->with('success','Edificio Editado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
