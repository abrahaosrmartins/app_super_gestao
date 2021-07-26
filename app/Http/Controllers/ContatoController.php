<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //realizar a validação dos dados enviados na request
        $rules = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O Nome deve ser preenchido.',
            'nome.min' => 'O Nome deve ter, no mínimo, 3 caracteres.',
            'nome.max' => 'O Nome não deve ter mais do que 40 caracteres.',
            'nome.unique' => 'O Nome informado já existe.',
            'telefone.required' => 'O telefone deve ser informado.',
            'email' => 'O e-mail informado não é válido.',
            'motivo_contatos_id.required' => 'O motivo do contato deve ser preenchido.',
            'mensagem.required' => 'A mensagem deve ser preenchida'
        ];

        $request->validate($rules, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
