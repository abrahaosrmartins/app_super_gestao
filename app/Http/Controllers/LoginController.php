<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inexistentes.';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário estar logado para acessar esta página.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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
            session_start();//inicia a super global Session para as informações ficarem guardadas nela, e o usuário conseguir navegar enquanto a sessão está ativa
            
            $_SESSION['nome'] = $usuario->name; // esta linha e a próxima armazenam o name e o email que vem na request, na super global SESSION
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
