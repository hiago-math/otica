<?php

namespace Infrastructure\Apis\ViaCep\Services;

use Application\Exceptions\Response\InvalidResponseException;
use Illuminate\Support\Collection;
use Infrastructure\Apis\BaseServiceApi;
use Infrastructure\Apis\ViaCep\Interfaces\IViaCepApi;

class ViaCepApi extends BaseServiceApi implements IViaCepApi
{
    public function __construct()
    {
        $this->setBaseUrl(config('custom.SERVICE_VIACEP_URL'));
    }

    /**
     * {@inheritDoc}
     * */
    public function getAddressByZipCode(string $zipCode): Collection
    {
        $response = $this->request('GET', "$zipCode/json");

        return collect(json_decode($response, true));
    }
}
