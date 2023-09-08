<?php

namespace Shared\DTO\Cliente;

use Shared\DTO\DTOAbstract;

class CriarEnderecoDTO extends DTOAbstract
{
    /**
     * @var string
     */
    public string $cep;

    /**
     * @var string
     */
    public string $logradouro;

    /**
     * @var string|null
     */
    public ?string $complemento;

    /**
     * @var string
     */
    public string $bairro;

    /**
     * @var string
     */
    public string $cidade;

    /**
     * @var string
     */
    public string $uf;

    /**
     * @var string
     */
    public string $numero;
    /**
     * @param string $cep
     * @param string $logradouro
     * @param string|null $complemento
     * @param string $bairro
     * @param string $cidade
     * @param string $uf
     * @param string|null $ibge
     * @param string|null $gia
     * @param string|null $ddd
     * @param string|null $siafi
     * @return CriarEnderecoDTO
     */
    public function register(
        string $cep,
        string $logradouro,
        string $bairro,
        string $cidade,
        string $uf,
        string $numero = null,
        ?string $complemento = null
    ): self
    {
        $this->cep = remove_mask_zip_code($cep);
        $this->logradouro = $logradouro;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->numero = $numero;
        $this->complemento = !empty($complemento) ? $complemento : null;

        return $this;
    }
}
