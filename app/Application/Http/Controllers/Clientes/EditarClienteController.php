<?php

namespace Application\Http\Controllers\Clientes;

use Application\Http\Controllers\Controller;
use Domain\Clientes\Actions\CriarClienteAction;
use Domain\Clientes\Actions\EditarClienteAction;
use Illuminate\Http\Request;
use Shared\DTO\Cliente\CriarClienteDTO;
use Shared\DTO\Cliente\EditarClienteDTO;

class EditarClienteController extends Controller
{
    public function __invoke(
        Request $request,
        EditarClienteDTO $editarClienteDto,
        EditarClienteAction $editarClienteAction
    )
    {
        $editarClienteDto->registrar(
            ...$request->all()
        );

        $editarClienteAction->execute($editarClienteDto);

        return response()->json(['success' => true, 'redirect' => route('view.listagem')]);

    }
}
