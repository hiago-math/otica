<?php

namespace Domain\Clientes\Services;

use Domain\Clientes\Interfaces\Repositories\IEnderecoRepository;
use Domain\Clientes\Interfaces\Services\IEnderecoService;
use Illuminate\Support\Collection;
use Infrastructure\Apis\ViaCep\Interfaces\IViaCepApi;
use Shared\DTO\Cliente\CriarEnderecoDTO;

class EnderecoService implements IEnderecoService
{
    private IViaCepApi $viaCepApi;
    private IEnderecoRepository $addressRepository;
    private CriarEnderecoDTO $createAddressDto;

    /**
     * AddressService constructor.
     * @param IViaCepApi $viaCepApi
     * @param CriarEnderecoDTO $createAddressDto
     * @param IEnderecoRepository $addressRepository
     */
    public function __construct(
        IViaCepApi $viaCepApi,
        CriarEnderecoDTO $createAddressDto,
        IEnderecoRepository $addressRepository
    )
    {
        $this->viaCepApi = $viaCepApi;
        $this->createAddressDto = $createAddressDto;
        $this->addressRepository = $addressRepository;
    }


    /**
     * {@inheritDoc}
     */
    public function getAddressByZipCode(string $zipCode): Collection
    {
        $address = $this->addressRepository->findAddressByZipcode($zipCode);

        if ($address->isEmpty()) {
            $address = $this->viaCepApi->getAddressByZipCode($zipCode);
            $newCreateAddressDto = $this->prepareCreateAddressDtoByResponse($address);
            $address = $this->createAddress($newCreateAddressDto);
        }

        return $address;
    }

    /**
     * {@inheritDoc}
     */
    public function createAddress(CriarEnderecoDTO $createUserDto): Collection
    {
       return $this->addressRepository->createAddress($createUserDto);
    }

    /**
     * {@inheritDoc}
     */
    private function prepareCreateAddressDtoByResponse(Collection $response): CriarEnderecoDTO
    {
        return $this->createAddressDto->register(
            $response->get('cep'),
            $response->get('logradouro'),
            $response->get('bairro'),
            $response->get('localidade'),
            $response->get('uf'),
            $response->get('complemento')
        );
    }

    /**
     * {@inheritDoc}
     */
    public function returnHeadersForCsv(): array
    {
        return [
            'CEP',
            'LOGRADOURO',
            'BAIRRO',
            'CIDADE',
            'UF',
        ];
    }
}
