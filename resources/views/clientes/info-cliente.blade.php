@extends('master')

@section('title', 'Dados do Cliente')

@section('content')
    <form class="cliente-form">
        <div class="form-group">
            <div class="label-group">
                <label for="nome_completo">Nome Completo:</label>
            </div>
            <div class="input-group">
                <input type="text" id="nome_completo" value="{{ $cliente['nome_completo'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="cpf">CPF:</label>
            </div>
            <div class="input-group">
                <input type="text" id="cpf" value="{{ $cliente['cpf'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="nome_mae">Nome da Mãe:</label>
            </div>
            <div class="input-group">
                <input type="text" id="nome_mae" value="{{ $cliente['nome_mae'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="data_nascimento">Data de Nascimento:</label>
            </div>
            <div class="input-group">
                <input type="text" id="data_nascimento" value="{{ $cliente['data_nascimento'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="idade">Idade:</label>
            </div>
            <div class="input-group">
                <input type="text" id="idade" value="{{ $cliente['idade'] }}" readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="label-group">
                <label for="profissao">Profissão:</label>
            </div>
            <div class="input-group">
                <input type="text" id="profissao" value="{{ $cliente['profissao'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="convenio">Convênio:</label>
            </div>
            <div class="input-group">
                <input type="text" id="convenio" value="{{ $cliente['convenio'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="ultima_consulta">Última Consulta:</label>
            </div>
            <div class="input-group">
                <input type="text" id="ultima_consulta" value="{{ $cliente['ultima_consulta'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="numero_celular">Número de Celular:</label>
            </div>
            <div class="input-group">
                <input type="text" id="numero_celular" value="{{ $cliente['numero_celular'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="numero_residencia">Número de Residência:</label>
            </div>
            <div class="input-group">
                <input type="text" id="numero_residencia" value="{{ $cliente['numero_residencia'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="genero">Gênero:</label>
            </div>
            <div class="input-group">
                <input type="text" id="genero" value="{{ $cliente['sexo']['nome_exibicao'] }}" readonly>
            </div>
        </div>
    </form>

    <h2>Endereço</h2>
    <form class="endereco-form">
        <div class="form-group">
            <div class="label-group">
                <label for="cep">CEP:</label>
            </div>
            <div class="input-group">
                <input type="text" id="cep" value="{{ $cliente['endereco']['cep'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="logradouro">Logradouro:</label>
            </div>
            <div class="input-group">
                <input type="text" id="logradouro" value="{{ $cliente['endereco']['logradouro'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="bairro">Bairro:</label>
            </div>
            <div class="input-group">
                <input type="text" id="bairro" value="{{ $cliente['endereco']['bairro'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="cidade">Cidade:</label>
            </div>
            <div class="input-group">
                <input type="text" id="cidade" value="{{ $cliente['endereco']['cidade'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="numero">Número:</label>
            </div>
            <div class="input-group">
                <input type="text" id="numero" value="{{ $cliente['complemento_endereco']['numero'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="complemento">Complemento:</label>
            </div>
            <div class="input-group">
                <input type="text" id="complemento" value="{{ $cliente['complemento_endereco']['numero'] }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="uf">UF:</label>
            </div>
            <div class="input-group">
                <input type="text" id="uf" value="{{ $cliente['endereco']['uf'] }}" readonly>
            </div>
        </div>
    </form>
@endsection

