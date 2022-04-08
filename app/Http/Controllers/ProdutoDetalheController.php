<?php

namespace App\Http\Controllers;

use App\Models\ItemDetalhe;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        abort(405, 'Method not enabled');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|
     */
    public function create(): View
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @return void
     */
    public function show()
    {
        abort(405, 'Method not enabled');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $produto_detalhe = ItemDetalhe::with('item')->find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', compact('produto_detalhe', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ItemDetalhe $produto_detalhe
     * @return Application|Redirector|RedirectResponse|string
     */
    public function update(Request $request, ItemDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        return redirect()-route('produto-detalhe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return void
     */
    public function destroy()
    {
        abort(405, 'Method not enabled');
    }
}
