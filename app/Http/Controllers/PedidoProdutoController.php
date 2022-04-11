<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Pedido $pedido
     * @return View
     */
    public function create(Pedido $pedido): View
    {
        $produtos = Produto::all();
//        $pedido->produtos; // eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Pedido $pedido
     * @return RedirectResponse
     */
    public function store(Request $request, Pedido $pedido): RedirectResponse
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe.',
            'required' => 'O campo :attribute deve ser preenchido.'
        ];

        $request->validate($regras, $feedback);

//        $data = [
//            'pedido_id' => $pedido->id,
//            'produto_id' => $request->get('produto_id'),
//            'quantidade' => $request->get('quantidade')
//        ];
//        PedidoProduto::create($data);

        // OU TAMBEM:

        /*
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

//      $pedido->produtos; // quando chamamos o método em formato de atributo, recebemos os registros do relacionamento
//      $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);
        // quando chamamos em formato de método, recebemos os objeto que mapeia esse relacionamento

        return redirect()->route('pedido-produto.create', $pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PedidoProduto $pedidoProduto
     * @param int $pedido_id
     * @return RedirectResponse
     */
//    public function destroy(Pedido $pedido, Produto $produto)
    public function destroy(PedidoProduto $pedidoProduto, int $pedido_id): RedirectResponse
    {
        // convencional
//        PedidoProduto::where([
//           'pedido_id' => $pedido->id,
//           'produto_id' => $produto->id
//        ])->delete();

        // pelo relacionamento, usando detach
//        $pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', $pedido_id);
    }
}
