@extends('master')

@section('title', 'Editar Dados do Cliente')

@section('content')
        @csrf
        @method('PUT')

        <div class="container">

            <div class="form-group">
                <div class="label-group">
                    <label for="nome_completo">Nome Completo:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="nome_completo" value="{{ $cliente['nome_completo'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="cpf">CPF:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="cpf" value="{{ $cliente['cpf'] }}" class="readonly-field" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="nome_mae">Nome da Mãe:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="nome_mae" value="{{ $cliente['nome_mae'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="data_nascimento" value="{{ $cliente['data_nascimento'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="idade">Idade:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="idade" value="{{ $cliente['idade'] }}">
                </div>
            </div>

            <div class="form-group">
                <div class="label-group">
                    <label for="profissao">Profissão:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="profissao" value="{{ $cliente['profissao'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="convenio">Convênio:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="convenio" value="{{ $cliente['convenio'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="ultima_consulta">Última Consulta:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="ultima_consulta" value="{{ $cliente['ultima_consulta'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="numero_celular">Número de Celular:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="numero_celular" value="{{ $cliente['numero_celular'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="numero_residencia">Número de Residência:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="numero_residencia" value="{{ $cliente['numero_residencia'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="genero">Gênero:</label>
                </div>
                <div class="input-group"  id="div_genero">
                    <select id="genero" class="select_genero">
                        @foreach ($sexos as $sexo)
                            <option value="{{ \Illuminate\Support\Arr::get($sexo,'sexo_uid') }}" @if ($cliente['sexo_uid'] === \Illuminate\Support\Arr::get($sexo,'sexo_uid')) selected @endif>{{ \Illuminate\Support\Arr::get($sexo,'nome_exibicao') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">

                <div class="label-group">
                    <label for="cep">CEP:</label>
                </div>
                <div class="input-group"  id="div_cep">
                    <input type="text" id="cep" value="{{ $cliente['endereco']['cep'] }}">
                    <button id="buscarCep">Buscar</button>
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="logradouro">Logradouro:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="logradouro" value="{{ $cliente['endereco']['logradouro'] }}" class="readonly-field" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="bairro">Bairro:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="bairro" value="{{ $cliente['endereco']['bairro'] }}" class="readonly-field" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="cidade">Cidade:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="cidade" value="{{ $cliente['endereco']['cidade'] }}" class="readonly-field" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="numero">Número:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="numero" value="{{ $cliente['complemento_endereco']['numero'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="complemento">Complemento:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="complemento" value="{{ $cliente['complemento_endereco']['complemento'] }}">
                </div>
            </div>
            <div class="form-group">
                <div class="label-group">
                    <label for="uf">UF:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="uf" value="{{ $cliente['endereco']['uf'] }}" class="readonly-field" readonly>
                </div>
            </div>


            <button type="submit" id="editarCliente" class="button">Editar</button>
        </div>
@endsection

