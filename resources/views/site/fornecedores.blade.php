<div>
    <h2>Fornecedores</h2>
</div>
@foreach ($fornecedores as $fornecedor)
    <div class="container">
        <h4>{{ $fornecedor->nome }}</h4>
        <h4>{{ $fornecedor->email }}</h4>
        <h4>{{ $fornecedor->uf }}</h4>
        <h4>{{ $fornecedor->site }}</h4>
        <hr>
    </div>
@endforeach
