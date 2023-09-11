<?php

namespace Domain\Clientes\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;

interface IComplementoEnderecoRepository
{
    public function criarComplementoEndereco(CriarClienteDTO $clienteDto): Collection;
}
