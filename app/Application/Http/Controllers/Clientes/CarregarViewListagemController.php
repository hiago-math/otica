<?php

namespace Application\Http\Controllers\Clientes;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Illuminate\Http\Request;

class CarregarViewListagemController
{
    public function __invoke(
        Request $request,
        IClienteRepository$clienteRepository
    )
    {
        $clientes = $clienteRepository->listarTodosClientes($request->get('page', 1));

        return view('clientes.listagem-cliente', ['clientes' => $clientes]);
    }
}
