<?php

namespace Application\Http\Controllers\Clientes;

use Application\Http\Controllers\Controller;
use Domain\Clientes\Actions\CriarClienteAction;
use Illuminate\Http\Request;
use Shared\DTO\Cliente\CriarClienteDTO;

class CriarClienteController extends Controller
{
    public function __invoke(
        Request $request,
        CriarClienteDTO $criarClienteDto,
        CriarClienteAction $criarClienteAction
    )
    {
        $criarClienteDto->registrar(...$request->all());

       $criarClienteAction->execute($criarClienteDto);
    }
}
