<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos= Produtos::orderBy('id')->get();
        return view('produtos.index',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produtos = Produtos::create($request->all());

        return redirect()->route('produtos.index')
                    ->with('sucess', 'Produto Cadastrado com Sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produto)
    {
        return view('produtos.edit',compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtos $produto)
    {
        $produto->update($request->all());

        return redirect()->route('produtos.index')
                ->with('sucess','Produto Editado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
