<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request)
    {
        $rules = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (email) é obrigatório!',
            'senha.required' => 'A senha é obrigatória'
        ];

        $request->validate($rules, $feedback);

        //recuperamos os parametros do formulário
        $email = $request->get('usuario'); //pega o name que vai no formulário
        $password = $request->get('senha');

        //Iniciamos o model User
        $user = new User();

        $usuario = $user->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

        if (isset($usuario->name)) {
            echo('Usuário existe.');
        } else {
            echo('Usuário inexistente!');
        }
    }
}
