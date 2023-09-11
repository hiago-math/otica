<?php

namespace Domain\Clientes\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;
use Shared\DTO\Cliente\EditarClienteDTO;

interface IComplementoEnderecoRepository
{
    /**
     * @param CriarClienteDTO $clienteDto
     * @return Collection
     */
    public function criarComplementoEndereco(CriarClienteDTO $clienteDto): Collection;

    /**
     * @param EditarClienteDTO $editarClienteDto
     * @return Collection
     */
    public function editarComplementoEndereco(EditarClienteDTO $editarClienteDto): Collection;
}
