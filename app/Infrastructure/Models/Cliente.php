<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class Cliente extends Model
{
    use UuidTrait;

    protected $table = 'clientes';
    protected $primaryKey = 'cliente_uid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'cliente_uid',
        'nome_completo',
        'cpf',
        'nome_mae',
        'data_nascimento',
        'idade',
        'convenio',
        'profissao',
        'ultima_consulta',
        'numero_celular',
        'numero_residencia',
        'sexo_uid',
        'endereco_uid'
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
    ];

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'endereco_uid', 'endereco_uid');
    }
    public function complementoEndereco(): BelongsTo
    {
        return $this->belongsTo(ComplementoEndereco::class, 'cliente_uid', 'cliente_uid');
    }

    public function sexo(): BelongsTo
    {
        return $this->belongsTo(Sexo::class, 'sexo_uid', 'sexo_uid');
    }
}
