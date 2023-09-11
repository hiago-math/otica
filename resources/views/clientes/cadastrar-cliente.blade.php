@extends('master')

@section('title', 'Cadastro de Clientes')

@section('content')

<header>
    <h1>Cadastro de Cliente</h1>
</header>
<div class="container">
        <div class="form-group">
            <div class="label-group">
                <label for="nome_completo">Nome Completo:</label>
            </div>
            <div class="input-group" id="div_nome_completo">
                <input type="text" id="nome_completo" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="cpf">CPF:</label>
            </div>
            <div class="input-group" id="div_cpf">
                <input type="text" id="cpf" required>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="nome_mae">Nome da Mãe:</label>
            </div>
            <div class="input-group" id="div_nome_mae">
                <input type="text" id="nome_mae" class="campo-invalido" required>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="data_nascimento" >Data de Nascimento:</label>
            </div>
            <div class="input-group" id="div_data_nascimento">
                <input type="text" id="data_nascimento" class="datepicker" required>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="genero">Gênero:</label>
            </div>
            <div class="input-group"  id="div_genero">
                <select id="genero" class="select_genero" required>
                    <option value=""> Selecione um genero</option>
                    @foreach ($sexos as $sexo)
                        <option value="{{ \Illuminate\Support\Arr::get($sexo,'sexo_uid') }}">{{ \Illuminate\Support\Arr::get($sexo,'nome_exibicao') }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group" >
                <label for="ultima_consulta" >Última Consulta:</label>
            </div>
            <div class="input-group"  id="div_ultima_consulta">
                <input type="text" id="ultima_consulta" class="datepicker" >
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="convenio">Convênio:</label>
            </div>
            <div class="input-group">
                <input type="text" id="convenio" >
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="profissao">Profissão:</label>
            </div>
            <div class="input-group">
                <input type="text" id="profissao" >
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="numero_celular">Número de Celular:</label>
            </div>
            <div class="input-group" id="div_numero_celular">
                <input type="text" id="numero_celular" class="cell" required>
            </div>
        </div>
        <div class="form-group">
            <div class="label-group">
                <label for="numero_residencia">Número de Residência:</label>
            </div>
            <div class="input-group" id="div_numero_residencia">
                <input type="text" id="numero_residencia" class="tell" required>
            </div>
        </div>

    <div class="form-group">
        <div class="label-group">
            <label for="cep">CEP:</label>
        </div>
        <div class="input-group" id="div_cep">
            <input type="text" id="cep" placeholder="Digite o CEP" required>
            <button id="buscarCep">Buscar</button>
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="logradouro">Logradouro:</label>
        </div>
        <div class="input-group">
            <input type="text" id="logradouro" placeholder="" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="bairro">Bairro:</label>
        </div>
        <div class="input-group">
            <input type="text" id="bairro" placeholder="" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="cidade">Cidade:</label>
        </div>
        <div class="input-group">
            <input type="text" id="cidade" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="uf">UF:</label>
        </div>
        <div class="input-group">
            <input type="text" id="uf" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="complemento">Complemento:</label>
        </div>
        <div class="input-group">
            <input type="text" id="complemento" placeholder="Inserir Complemento">
        </div>
    </div>
    <div class="form-group">
        <div class="label-group">
            <label for="numero">Número:</label>
        </div>
        <div class="input-group" id="div_numero">
            <input type="text" id="numero" placeholder="Inserir Número" required>
        </div>
    </div>

    <div class="button-container">
        <button id="cadastrar" class="button">Cadastrar</button>
    </div>
</div>
@endsection

