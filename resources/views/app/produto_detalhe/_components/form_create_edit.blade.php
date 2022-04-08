@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf
        @method('POST')
@endif
        <label>
            <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="Produto Id"
                   class="borda-preta">
        </label>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
        <label>
            <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}"
                   placeholder="Comprimento"
                   class="borda-preta">
        </label>
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
        <label>
            <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura"
                   class="borda-preta">
        </label>
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}
        <label>
            <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura"
                   class="borda-preta">
        </label>
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}
        <label>
            <select name="unidade_id">
                <option>-- Selecione a Unidade de medida --</option>
                @foreach($unidades as $unidade)
                    <option
                        value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                @endforeach
            </select>
        </label>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
