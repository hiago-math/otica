<?php

namespace Domain\Clientes\Interfaces\Services;

use Illuminate\Support\Collection;
use Shared\DTO\Address\CreateAddressDTO;
use Shared\DTO\Cliente\CriarEnderecoDTO;

interface IEnderecoService
{
    /**
     * @param string $zipCode
     * @return Collection
     */
    public function getAddressByZipCode(string $zipCode): Collection;

    /**
     * @param CreateAddressDTO $createUserDto
     * @return Collection
     */
    public function createAddress(CriarEnderecoDTO $createUserDto): Collection;

    /**
     * @return array
     */
    public function returnHeadersForCsv(): array ;
}
