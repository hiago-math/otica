<?php


namespace Application\Http\Controllers\Clientes;


use Domain\Clientes\Interfaces\Repositories\ISexoRepository;

class CarregarViewCadastroController
{
    public function __invoke(
        ISexoRepository $sexoRepository
    )
    {
        $sexos = $sexoRepository->listarTodosSexos();

        return view('clientes.cadastrar-cliente', compact('sexos'));
    }
}
