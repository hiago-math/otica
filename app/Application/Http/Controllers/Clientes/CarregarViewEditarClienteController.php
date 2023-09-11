<?php

namespace Application\Http\Controllers\Clientes;

use Application\Http\Controllers\Controller;
use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Domain\Clientes\Interfaces\Repositories\ISexoRepository;
use Illuminate\Http\Request;

class CarregarViewEditarClienteController extends Controller
{
    public function __invoke(
        Request $request,
        ISexoRepository $sexoRepository,
        IClienteRepository $clienteRepository
    )
    {
        $cliente = $clienteRepository->findCliente($request->get('cliente_uid'));
        $sexos = $sexoRepository->listarTodosSexos();

        return view('clientes.editar-cliente', ['cliente' => $cliente, 'sexos' => $sexos]);
    }
}
