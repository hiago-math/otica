<?php

namespace Infrastructure\Repositories\Clientes;

use Domain\Clientes\Interfaces\Repositories\IClienteRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Infrastructure\Models\Cliente;
use Infrastructure\Repositories\AbstractRepository;
use Shared\DTO\Cliente\CriarClienteDTO;
use Shared\DTO\Cliente\EditarClienteDTO;

class ClienteRepository extends AbstractRepository implements IClienteRepository
{
    public function __construct()
    {
        parent::__construct(Cliente::class);
    }

    /**
     *{@inheritDoc}
     */
    public function criarCliente(CriarClienteDTO $criarClienteDto): Collection
    {
        $clienteCriado = $this->getModel()->firstOrCreate(
            [
                'cpf' => $criarClienteDto->cpf
            ],
            $criarClienteDto->toArray(['cep', 'complemento', 'numero', 'cliente_uid'])
        );

        return $this->toCollect($clienteCriado->toArray());
    }

    /**
     *{@inheritDoc}
     */
    public function listarTodosClientes(int $page): LengthAwarePaginator
    {
        return $this->getModel()
            ->query()
            ->select([
                'cliente_uid',
                'nome_completo',
                'cpf',
                'data_nascimento',
                'idade',
                'numero_celular',
                'endereco_uid',
            ])
            ->with(['endereco'])
            ->paginate(10, '*', 'page', $page);
    }

    /**
     *{@inheritDoc}
     */
    public function findCliente(string $cliente_uid): Collection
    {
        $cliente = $this->getModel()
            ->query()
            ->with([
                'sexo' => function ($query) {
                    $query->select(['sexo_uid', 'nome_exibicao']);
                },
                'endereco',
                'complementoEndereco'
            ])
            ->where('cliente_uid', $cliente_uid)
            ->first()
            ->toArray();

        return $this->toCollect($cliente);
    }

    /**
     * @param EditarClienteDTO $editarClienteDto
     * @return Collection
     */
    public function editarCliente(EditarClienteDTO $editarClienteDto): Collection
    {
        $clienteEditado = $this->getModel()
            ->where('cliente_uid', $editarClienteDto->cliente_uid)
            ->first();

        $clienteEditado->update(remove_null_array($editarClienteDto->toArray()));

        return $this->toCollect($clienteEditado->toArray());
    }
}
