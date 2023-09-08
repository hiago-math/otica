<?php

namespace Domain\Clientes\Actions;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Domain\Clientes\Interfaces\Services\IEnderecoService;
use Shared\DTO\Cliente\CriarClienteDTO;

class CriarClienteAction
{
    private IEnderecoService $enderecoService;
    private IClienteRepository $clienteRepository;

    /**
     * CriarClienteAction constructor.
     * @param IEnderecoService $enderecoService
     * @param IClienteRepository $clienteRepository
     */
    public function __construct(IEnderecoService $enderecoService, IClienteRepository $clienteRepository)
    {
        $this->enderecoService = $enderecoService;
        $this->clienteRepository = $clienteRepository;
    }

    public function execute(CriarClienteDTO $criarClienteDto)
    {
        $cep = $this->enderecoService->getAddressByZipCode($criarClienteDto->cep);

        dd($cep);
    }
}
