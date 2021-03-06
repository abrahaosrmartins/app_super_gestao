@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <label>
                        <input type="text" name="usuario" placeholder="Usuário" class="borda-preta"
                            value="{{ old('usuario') }}">
                    </label>
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}

                    <label>
                        <input type="password" name="senha" placeholder="Senha" class="borda-preta"
                            value="{{ old('senha') }}">
                    </label>
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}

                    <button type="submit" class="borda-preta">Login</button>
                </form>
                {{isset($erro) && $erro != '' ? $erro : ''}}
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="img/facebook.png" alt="">
            <img src="img/linkedin.png" alt="">
            <img src="img/youtube.png" alt="">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="img/mapa.png" alt="">
        </div>
    </div>
@endsection
