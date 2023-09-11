<?php

namespace Shared\DTO\Cliente;

use Carbon\Carbon;
use Shared\DTO\DTOAbstract;

class CriarClienteDTO extends DTOAbstract
{
    /**
     * @var string|null
     */
    public ?string $cliente_uid;

    /**
     * @var string
     */
    public string $nome_completo;

    /**
     * @var string
     */
    public string $cpf;

    /**
     * @var string
     */
    public string $nome_mae;

    /**
     * @var int
     */
    public int $idade;

    /**
     * @var string
     */
    public string $data_nascimento;

    /**
     * @var string|null
     */
    public ?string $ultima_consulta;

    /**
     * @var string|null
     */
    public ?string $convenio;

    /**
     * @var string|null
     */
    public ?string $profissao;

    /**
     * @var string|null
     */
    public ?string $numero_celular;

    /**
     * @var string|null
     */
    public ?string $numero_residencia;

    /**
     * @var string
     */
    public string $sexo_uid;
    /**
     * @var string
     */
    public string $cep;

    /**
     * @var string|null
     */
    public ?string $complemento;

    /**
     * @var string|null
     */
    public ?string $numero;

    /**
     * @var string|null
     */
    public ?string $endereco_uid;

    /**
     * @param string $nome_completo
     * @param string $cpf
     * @param string $nome_mae
     * @param string $data_nascimento
     * @param string $sexo_uid
     * @param string $cep
     * @param string|null $ultima_consulta
     * @param string|null $convenio
     * @param string|null $profissao
     * @param string|null $numero_celular
     * @param string|null $numero_residencia
     * @param string|null $numero
     * @param string|null $complemento
     * @param string|null $endereco_uid
     * @return CriarClienteDTO
     */
    public function registrar(
        string $nome_completo,
        string $cpf,
        string $nome_mae,
        string $data_nascimento,
        string $sexo_uid,
        string $cep,
        ?string $ultima_consulta,
        ?string $convenio,
        ?string $profissao,
        ?string $numero_celular,
        ?string $numero_residencia,
        ?string $numero,
        ?string $complemento = null,
        ?string $endereco_uid = null,
        ?string $cliente_uid = null
    )
    {
        $this->nome_completo = $nome_completo;
        $this->cpf = $cpf;
        $this->nome_mae = $nome_mae;
        $this->data_nascimento = Carbon::parse($data_nascimento)->format('Y-m-d');
        $this->ultima_consulta = is_null($ultima_consulta) ? $ultima_consulta : Carbon::parse($ultima_consulta)->format('Y-m-d');
        $this->convenio = $convenio;
        $this->profissao = $profissao;
        $this->numero_celular = $numero_celular;
        $this->numero_residencia = $numero_residencia;
        $this->sexo_uid = $sexo_uid;
        $this->cep = $cep;
        $this->complemento = $complemento;
        $this->numero = $numero;
        $this->endereco_uid = $endereco_uid;
        $this->cliente_uid = $cliente_uid;

        $this->idade = Carbon::parse($data_nascimento)->diffInYears(Carbon::now());

        return $this;
    }
}
