<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function () {

            const campo_iniciais = {
                cep_inicial: $('#cep').val(),
                nome_completo_inicial: $('#nome_completo').val(),
                cpf_inicial: $('#cpf').val(),
                nome_mae_inicial: $('#nome_mae').val(),
                data_nascimento_inicial: $('#data_nascimento').val(),
                ultima_consulta_inicial: $('#ultima_consulta').val(),
                convenio_inicial: $('#convenio').val(),
                profissao_inicial: $('#profissao').val(),
                numero_celular_inicial: $('#numero_celular').val(),
                numero_residencia_inicial: $('#numero_residencia').val(),
                genero_inicial: $('#genero').val(),
                numero_inicial: $('#numero').val(),
            };
            console.log(campo_iniciais['nome_completo_inicial']);

            $('.datepicker').inputmask('99-99-9999', {placeholder: 'DD-MM-AAAA'});
            $('.cell').inputmask('(99) 9 9999-9999', {placeholder: '(DD) 0 0000-0000'});
            $('.tell').inputmask('(99) 9999-9999', {placeholder: '(DD) 0000-0000'});

            $('#buscarCep').on('click', function () {
                var route = '{{ route('buscar.cep') }}';
                var cep = $('#cep').val();

                $.ajax({
                    url: route, // Substitua '/sua-rota/' pela rota real do seu servidor
                    method: 'GET',
                    data: {zip_code: cep}, // Passando o CEP como parâmetro na requisição
                    success: function (data) {
                        // Atualize o campo #numero com o valor retornado do servidor
                        $('#logradouro').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#uf').val(data.uf);
                    },
                    error: function (erro) {
                        // Trate erros aqui, se necessário
                        console.log(erro);
                    }
                });
            });

            $('#cadastrar').on('click', function () {
                event.preventDefault(); // Evita o envio do formulário padrão

                var route = '{{ route('criar.cliente') }}';

                var cep = $('#cep').val();
                var nome_completo = $('#nome_completo').val();
                var cpf = $('#cpf').val();
                var nome_mae = $('#nome_mae').val();
                var data_nascimento = $('#data_nascimento').val();
                var ultima_consulta = $('#ultima_consulta').val();
                var convenio = $('#convenio').val();
                var profissao = $('#profissao').val();
                var numero_celular = $('#numero_celular').val();
                var numero_residencia = $('#numero_residencia').val();
                var sexo_uid = $('#genero').val();
                var numero = $('#numero').val();

                // Define a classe de erro
                var classeErro = 'campo-invalido';

                // Array de campos obrigatórios
                var camposObrigatorios = [
                    'cep', 'nome_completo', 'cpf', 'nome_mae', 'data_nascimento',
                    'numero_celular',
                    'genero', 'numero'
                ];

                $('.' + classeErro).removeClass(classeErro);

                var camposValidos = true;

                camposObrigatorios.forEach(function (campo) {
                    var valorCampo = $('#' + campo).val().trim();

                    if (valorCampo === '') {
                        $('#div_' + campo).addClass(classeErro);
                        camposValidos = false;
                    }
                });

                if (camposValidos) {
                    $.ajax({
                        url: route,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            cep: cep,
                            nome_completo: nome_completo,
                            cpf: cpf,
                            nome_mae: nome_mae,
                            data_nascimento: data_nascimento,
                            ultima_consulta: ultima_consulta,
                            convenio: convenio,
                            profissao: profissao,
                            numero_celular: numero_celular,
                            numero_residencia: numero_residencia,
                            sexo_uid: sexo_uid,
                            numero: numero
                        },
                        success: function (data) {
                            alert('Cliente criado com sucesso!');

                            window.location.href = data.redirect
                        },
                        error: function (erro) {
                            alert('Erro ao criar usuario!');

                            window.location.reload();
                        }
                    });
                } else {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                }
            });

            $('#editarCliente').on('click', function () {
                event.preventDefault(); // Evita o envio do formulário padrão

                var clienteUid = getParameterByName('cliente_uid');
                var route = '{{ route('editar.cliente') }}' + '?cliente_uid=' + clienteUid;

                // Define a classe de erro
                var classeErro = 'campo-invalido';

                var camposAtuais = [
                    'nome_completo',
                    'cep',
                    'cpf',
                    'nome_mae',
                    'data_nascimento',
                    'ultima_consulta',
                    'convenio',
                    'profissao',
                    'numero_celular',
                    'numero_residencia',
                    'genero',
                    'numero',

                ];

                $('.' + classeErro).removeClass(classeErro);

                var payload = {};

                camposAtuais.forEach(function (campoAtuais) {
                    var valorCampoAtuais = $('#' + campoAtuais).val();

                    if (valorCampoAtuais !== campo_iniciais[campoAtuais + '_inicial']) {
                        payload[campoAtuais] = valorCampoAtuais
                    }

                });

                if (Object.keys(payload).length !== 0) {
                    $.ajax({
                        url: route,
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: payload,
                        success: function (data) {
                            alert('Cliente editado com sucesso!');

                            window.location.href = data.redirect
                        },
                        error: function (erro) {
                            // Trate erros aqui, se necessário
                            alert('Erro ao criar cliente!');
                        }
                    });
                } else {
                    alert('Por favor, edite alguma informacao');
                }
            });
        });

        function getParameterByName(name, url) {
            if (!url) {
                url = window.location.href;
            }
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) {
                return null;
            }
            if (!results[2]) {
                return '';
            }
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>
</head>
<body>
<div class="navbar">
    <a href="{{ route('view.listagem') }}">Listagem</a>
    <a href="{{ route('view.cadastrar') }}">Cadastro</a>
</div>
<div class="container">
    @yield('content')
</div>
<footer>
    <p>&copy; {{now()->format('Y')}} Oliver Corp. Todos os direitos reservados.</p>
</footer>
</body>
</html>
