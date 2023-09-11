<?php

namespace Domain\Clientes\Actions;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Domain\Clientes\Interfaces\Repositories\IComplementoEnderecoRepository;
use Domain\Clientes\Interfaces\Services\IEnderecoService;
use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;
use Shared\DTO\Cliente\CriarEnderecoDTO;

class CriarClienteAction
{
    private IEnderecoService $enderecoService;
    private CriarEnderecoDTO $criarEnderecoDto;
    private IClienteRepository $clienteRepository;
    private IComplementoEnderecoRepository $complementoEnderecoRepository;

    /**
     * CriarClienteAction constructor.
     * @param IEnderecoService $enderecoService
     * @param CriarEnderecoDTO $criarEnderecoDto
     * @param IClienteRepository $clienteRepository
     * @param IComplementoEnderecoRepository $complementoEnderecoRepository
     */
    public function __construct(
        IEnderecoService $enderecoService,
        CriarEnderecoDTO $criarEnderecoDto,
        IClienteRepository $clienteRepository,
        IComplementoEnderecoRepository $complementoEnderecoRepository
    )
    {
        $this->enderecoService = $enderecoService;
        $this->criarEnderecoDto = $criarEnderecoDto;
        $this->clienteRepository = $clienteRepository;
        $this->complementoEnderecoRepository = $complementoEnderecoRepository;
    }

    public function execute(CriarClienteDTO $criarClienteDto): Collection
    {
        $this->prepareCriarEnderecoDTO($criarClienteDto);
        $cep = $this->enderecoService->getAddressByZipCode($this->criarEnderecoDto);

        $criarClienteDto->endereco_uid = $cep->get('endereco_uid');
        $cliente = $this->clienteRepository->criarCliente($criarClienteDto);

        $criarClienteDto->cliente_uid = $cliente->get('cliente_uid');
        return $this->complementoEnderecoRepository->criarComplementoEndereco($criarClienteDto);
    }

    private function prepareCriarEnderecoDTO(CriarClienteDTO $criarClienteDto)
    {
        $this->criarEnderecoDto->cep = $criarClienteDto->cep;
    }
}
