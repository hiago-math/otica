<?php

namespace Domain\Clientes\Interfaces\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;

interface IClienteRepository
{
    /**
     * @param CriarClienteDTO $criarClienteDto
     * @return Collection
     */
    public function criarCliente(CriarClienteDTO $criarClienteDto): Collection;

    /**
     * @param int $page
     * @return Collection
     */
    public function listarTodosClientes(int $page): LengthAwarePaginator;

    /**
     * @param string $cliente_uid
     * @return Collection
     */
    public function findCliente(string $cliente_uid): Collection;
}
