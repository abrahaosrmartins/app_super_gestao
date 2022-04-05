<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * List the resource
     */
    public function index()
    {
        return view('app.fornecedor.index');
    }

    /**
     * pesquisa um fornecedor
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome'))
            ->where('site', 'like', '%' . $request->input('site'))
            ->where('uf', 'like', '%' . $request->input('uf'))
            ->where('email', 'like', '%' . $request->input('email'))
            ->get();
            // ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    /**
     * Cria um fornecedor
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function adicionar(Request $request)
    {
        $msg = '';

        //adição
        if ($request->input('_token') != '' && $request->input('id') == '') {
            //validação

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email' => 'O campo email deve ser preenchido corretamente'
            ];

            $request->validate($regras, $feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redirect

            //dados.view
            $msg = 'Cadastro realizado com sucesso';
        }

        //edição
        //caso o token esteja preenchido e o id seja diferente de vazio
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Update realizado com sucesso!';
            } else {
                $msg = 'Update apresentou problema';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    /**
     * Leva para a página de edição um registro de fornecedor
     */
    public function editar($id, $msg = '') //como a msg é opcional, definimos um valor default pra ela como vazio
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    /**
     * Exclui um registro
     */
    public function excluir($id): RedirectResponse
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar')->with('Registro deletado com sucesso');
    }
}
