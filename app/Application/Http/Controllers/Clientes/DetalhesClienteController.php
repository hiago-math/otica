<?php

namespace Application\Http\Controllers\Clientes;

use Application\Http\Controllers\Controller;
use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Illuminate\Http\Request;

class DetalhesClienteController extends Controller
{
    public function __invoke(
        Request $request,
        IClienteRepository $clienteRepository
    )
    {
        $cliente = $clienteRepository->findCliente($request->get('cliente_uid'));

        return view('clientes.info-cliente', compact('cliente'));
    }
}
