<?php

namespace Domain\Clientes\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarClienteDTO;

interface ISexoRepository
{
    /**
     * @return Collection
     */
    public function listarTodosSexos(): Collection;

}
