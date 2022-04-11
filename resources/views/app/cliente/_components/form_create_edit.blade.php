@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
        @method('POST')
@endif
{{--        <label>--}}
{{--            <select name="fornecedor_id">--}}
{{--                <option>-- Selecione o Fornecedor --</option>--}}
{{--                @foreach($fornecedores as $fornecedor)--}}
{{--                    <option--}}
{{--                            value="{{$fornecedor->id}}" {{ ($cliente->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{$fornecedor->nome}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}--}}
{{--        </label>--}}
        <label>
            <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome"
                   class="borda-preta">
        </label>
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
{{--        <label>--}}
{{--            <input type="text" name="descricao" value="{{ $cliente->descricao ?? old('descricao') }}"--}}
{{--                   placeholder="Descrição"--}}
{{--                   class="borda-preta">--}}
{{--        </label>--}}
{{--        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}--}}
{{--        <label>--}}
{{--            <input type="text" name="peso" value="{{ $cliente->peso ?? old('peso') }}" placeholder="Peso"--}}
{{--                   class="borda-preta">--}}
{{--        </label>--}}
{{--        {{ $errors->has('peso') ? $errors->first('peso') : '' }}--}}
{{--        <label>--}}
{{--            <select name="unidade_id">--}}
{{--                <option>-- Selecione a Unidade de medida --</option>--}}
{{--                @foreach($unidades as $unidade)--}}
{{--                    <option--}}
{{--                            value="{{$unidade->id}}" {{ ($cliente->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </label>--}}
{{--        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}--}}
        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
