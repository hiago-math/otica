<?php

namespace Application\Http\Controllers\Clientes;

use Application\Http\Controllers\Controller;
use Domain\Clientes\Interfaces\Services\IEnderecoService;
use Illuminate\Http\Request;
use Shared\DTO\Cliente\CriarEnderecoDTO;

class SearchAddressFormController extends Controller
{
    public function __invoke(
        Request $request,
        IEnderecoService $addressService,
        CriarEnderecoDTO $criarEnderecoDTO
    )
    {
        try {
            $criarEnderecoDTO->cep = $request->get('zip_code');
            $criarEnderecoDTO->numero = null;
            $address = $addressService->getAddressByZipCode($criarEnderecoDTO);

            return $address->toArray();
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->withInput()->withErrors(['erro' => $exception->getMessage()]);
        }

    }
}
