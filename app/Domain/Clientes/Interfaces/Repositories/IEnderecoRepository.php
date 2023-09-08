<?php

namespace Domain\Clientes\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Shared\DTO\Cliente\CriarEnderecoDTO;

interface IEnderecoRepository
{
    /**
     * @param string $zipCode
     * @return Collection
     */
    public function findAddressByZipcode(string $zipCode): Collection;

    /**
     * @param CriarEnderecoDTO $addressDto
     * @return Collection
     */
    public function createAddress(CriarEnderecoDTO $addressDto): Collection;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @return Collection
     */
    public function cleanAll(): bool;
}
