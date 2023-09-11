<?php

namespace Infrastructure\Repositories\Clientes;

use Domain\Clientes\Interfaces\Repositories\IComplementoEnderecoRepository;
use Illuminate\Support\Collection;
use Infrastructure\Models\ComplementoEndereco;
use Infrastructure\Repositories\AbstractRepository;
use Shared\DTO\Cliente\CriarClienteDTO;

class ComplementoEnderecoRepository extends AbstractRepository implements IComplementoEnderecoRepository
{
    public function __construct()
    {
        parent::__construct(ComplementoEndereco::class);
    }

    public function criarComplementoEndereco(CriarClienteDTO $clienteDto): Collection
    {
        $complemento = $this->getModel()
            ->create(
                $clienteDto->toArray(
                    only: ['numero', 'complemento', 'cliente_uid']
                )
            );

        return $this->toCollect($complemento->toArray());
    }
}
