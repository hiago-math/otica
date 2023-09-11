<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.datepicker').inputmask('99-99-9999',  { placeholder: 'DD-MM-AAAA' });
            $('.cell').inputmask('(99) 9 9999-9999',  { placeholder: '(DD) 0 0000-0000' });
            $('.tell').inputmask('(99) 9999-9999',  { placeholder: '(DD) 0000-0000' });

            $('#buscarCep').on('click', function () {
                var route = '{{ route('buscar.cep') }}';
                var cep = $('#cep').val();

                $.ajax({
                    url: route, // Substitua '/sua-rota/' pela rota real do seu servidor
                    method: 'GET',
                    data: { zip_code: cep }, // Passando o CEP como parâmetro na requisição
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
                            $('#nome_completo').addClass('campo-invalido');
                        },
                        error: function (erro) {
                            // Trate erros aqui, se necessário
                            console.log(erro);
                        }
                    });
                } else {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                }
            });
        });
    </script>
</head>
<body>
<div class="navbar">
    <a href="{{ route('listagem.clientes') }}">Listagem</a>
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
