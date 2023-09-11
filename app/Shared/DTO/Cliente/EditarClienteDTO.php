<?php

namespace Shared\DTO\Cliente;

use Carbon\Carbon;
use Shared\DTO\DTOAbstract;

class EditarClienteDTO extends DTOAbstract
{
    /**
     * @var string
     */
    public string $cliente_uid;

    /**
     * @var string
     */
    public ?string $nome_completo = null;

    /**
     * @var string
     */
    public ?string $cpf = null;

    /**
     * @var string
     */
    public ?string $nome_mae = null;

    /**
     * @var int
     */
    public ?int $idade = null;

    /**
     * @var string
     */
    public ?string $data_nascimento = null;

    /**
     * @var string|null
     */
    public ?string $ultima_consulta = null;

    /**
     * @var string|null
     */
    public ?string $convenio = null;

    /**
     * @var string|null
     */
    public ?string $profissao = null;

    /**
     * @var string|null
     */
    public ?string $numero_celular = null;

    /**
     * @var string|null
     */
    public ?string $numero_residencia = null;

    /**
     * @var string
     */
    public ?string $sexo_uid = null;
    /**
     * @var string
     */
    public ?string $cep = null;

    /**
     * @var string|null
     */
    public ?string $complemento = null;

    /**
     * @var string|null
     */
    public ?string $numero = null;

    /**
     * @var string|null
     */
    public ?string $endereco_uid = null;

    /**
     * @param string|null $nome_completo
     * @param string|null $cpf
     * @param string|null $nome_mae
     * @param string|null $data_nascimento
     * @param string|null $sexo_uid
     * @param string|null $cep
     * @param string|null $ultima_consulta
     * @param string|null $convenio
     * @param string|null $profissao
     * @param string|null $numero_celular
     * @param string|null $numero_residencia
     * @param string|null $numero
     * @param string|null $complemento
     * @param string|null $endereco_uid
     * @param string|null $cliente_uid
     * @return EditarClienteDTO
     */
    public function registrar(
        ?string $nome_completo = null,
        ?string $cpf = null,
        ?string $nome_mae = null,
        ?string $data_nascimento = null,
        ?string $sexo_uid = null,
        ?string $cep = null,
        ?string $ultima_consulta = null,
        ?string $convenio = null,
        ?string $profissao = null,
        ?string $numero_celular = null,
        ?string $numero_residencia = null,
        ?string $numero = null,
        ?string $complemento = null,
        ?string $cliente_uid = null
    )
    {
        $this->nome_completo = $nome_completo;
        $this->cpf = $cpf;
        $this->nome_mae = $nome_mae;
        $this->data_nascimento = is_null($data_nascimento) ? $data_nascimento : Carbon::parse($data_nascimento)->format('Y-m-d');
        $this->ultima_consulta = is_null($ultima_consulta) ? $ultima_consulta : Carbon::parse($ultima_consulta)->format('Y-m-d');
        $this->convenio = $convenio;
        $this->profissao = $profissao;
        $this->numero_celular = $numero_celular;
        $this->numero_residencia = $numero_residencia;
        $this->sexo_uid = $sexo_uid;
        $this->cep = $cep;
        $this->complemento = $complemento;
        $this->numero = $numero;
        $this->cliente_uid = $cliente_uid;

        $this->idade = is_null($data_nascimento) ? $data_nascimento : Carbon::parse($data_nascimento)->diffInYears(Carbon::now());

        return $this;
    }
}
