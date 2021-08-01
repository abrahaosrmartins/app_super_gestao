<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo $metodo_autenticacao . '<br>';

        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados. - ' . $perfil . '<br>';
        }

        if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD. - ' . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Carregar apenas alguns dados.' . '<br>';
        } else {
            echo 'Carregador o perfil completo do banco de dados' . '<br>';
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso negado! Você precisa estar logado para acessar esta página.');
        }
    }
}
