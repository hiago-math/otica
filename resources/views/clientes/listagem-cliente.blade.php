@extends('master')

@section('title', 'Listagem de Clientes')

@section('content')
    <div class="listagem">

        <H1>Listagem de Clientes</H1>
        <table class="table">
            <thead>
            <tr>
                <th>Nome Completo</th>
                <th>CPF</th>
                <th>Data Nascimento</th>
                <th>Idade</th>
                <th>Número de Celular</th>
                <th>CEP</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente['nome_completo'] }}</td>
                    <td>{{ $cliente['cpf'] }}</td>
                    <td>{{ $cliente['data_nascimento'] }}</td>
                    <td>{{ $cliente['idade'] }}</td>
                    <td>{{ $cliente['numero_celular'] }}</td>
                    <td>{{ $cliente['endereco']['cep'] }}</td>
                    <td>
                        <a href="{{ route('info.cliente', ['cliente_uid' => $cliente['cliente_uid']]) }}"
                           class="button">Ver Detalhes</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    <div class="pagination-links">
        <ul class="pagination">
            @if ($clientes->onFirstPage())
                <li class="disabled"><span>&laquo; anterior</span></li>
            @else
                <li><a href="{{ $clientes->previousPageUrl() }}" rel="prev">&laquo; anterior</a></li>
            @endif

            @if ($clientes->hasMorePages())
                <li><a href="{{ $clientes->nextPageUrl() }}" rel="next"> proxima &raquo;</a></li>
            @else
                <li class="disabled"><span>proxima &raquo;</span></li>
            @endif
        </ul>
    </div>
    </div>
@endsection

