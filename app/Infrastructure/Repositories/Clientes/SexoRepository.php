<?php

namespace Infrastructure\Repositories\Clientes;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Domain\Clientes\Interfaces\Repositories\ISexoRepository;
use Illuminate\Support\Collection;
use Infrastructure\Models\Cliente;
use Infrastructure\Models\Sexo;
use Infrastructure\Repositories\AbstractRepository;
use Shared\DTO\Cliente\CriarClienteDTO;

class SexoRepository extends AbstractRepository implements ISexoRepository
{
    public function __construct()
    {
        parent::__construct(Sexo::class);
    }

    /**
     * @return Collection
     */
    public function listarTodosSexos(): Collection
    {
        $sexos = $this->getModel()
            ->select(['sexo_uid', 'nome_exibicao'])
            ->get()
            ->toArray();

        return $this->toCollect($sexos);
    }
}
