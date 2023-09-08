<?php

namespace Infrastructure\Repositories\Clientes;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Infrastructure\Models\Cliente;
use Infrastructure\Repositories\AbstractRepository;

class ClienteRepository extends AbstractRepository implements IClienteRepository
{
    public function __construct()
    {
        parent::__construct(Cliente::class);
    }
}
