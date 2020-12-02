@extends('layout')

@section('cabecalho')
Clientes
@endsection

@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="{{ route('creat_client') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($clientes as $cliente)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $cliente->name }}
        <form method="post" action="/series/{{ $cliente->id }}"
              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($cliente->nome) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
