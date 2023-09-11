<?php

namespace Infrastructure\Repositories\Clientes;

use Domain\Clientes\Interfaces\Repositories\IEnderecoRepository;
use Illuminate\Support\Collection;
use Infrastructure\Models\Endereco;
use Infrastructure\Repositories\AbstractRepository;
use Shared\DTO\Cliente\CriarEnderecoDTO;

class EnderecoRepository extends AbstractRepository implements IEnderecoRepository
{

    public function __construct()
    {
        parent::__construct(Endereco::class);
    }

    /**
     * {@inheritDoc}
     */
    public function findAddressByZipcode(string $zipCode): Collection
    {
        $address = $this->getModel()
            ->where('cep', $zipCode)
            ->first()
            ?->toArray() ?? [];

        return $this->toCollect($address);
    }


    /**
     * {@inheritDoc}
     */
    public function createAddress(CriarEnderecoDTO $addressDto): Collection
    {
        $addressCreated = $this->getModel()
            ->create($addressDto->toArray());


        return $this->toCollect($addressCreated->toArray());
    }

    /**
     * {@inheritDoc}
     */
    public function getAll(): Collection
    {
        $allAddress = $this->getModel()
            ->select([
                'cep',
                'logradouro',
                'bairro',
                'cidade',
                'uf',
            ])
            ->orderBy('updated_at', 'desc')
            ->get()
            ->toArray();

        return $this->toCollect($allAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function cleanAll(): bool
    {
        return $this->getModel()
            ->query()
            ->update([
                'is_visible' => false
            ]);
    }
}
