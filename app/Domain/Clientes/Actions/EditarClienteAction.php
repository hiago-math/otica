<?php

namespace Domain\Clientes\Actions;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Domain\Clientes\Interfaces\Repositories\IComplementoEnderecoRepository;
use Domain\Clientes\Interfaces\Services\IEnderecoService;
use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;
use Shared\DTO\Cliente\CriarEnderecoDTO;
use Shared\DTO\Cliente\EditarClienteDTO;

class EditarClienteAction
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

    public function execute(EditarClienteDTO $editarClienteDto): Collection
    {
        if (!is_null($editarClienteDto->cep)) {
            $this->prepareCriarEnderecoDTO($editarClienteDto);
            $cep = $this->enderecoService->getAddressByZipCode($this->criarEnderecoDto);
            $editarClienteDto->endereco_uid = $cep->get('endereco_uid');

            $this->complementoEnderecoRepository->criarComplementoEndereco($editarClienteDto);

        }

        return $this->clienteRepository->editarCliente($editarClienteDto);
    }

    private function prepareCriarEnderecoDTO(EditarClienteDTO $editarClienteDto)
    {
        $this->criarEnderecoDto->cep = $editarClienteDto->cep;
    }
}
