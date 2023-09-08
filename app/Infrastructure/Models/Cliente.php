<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class Cliente extends Model
{
    use UuidTrait;

    protected $table = 'clientes';
    protected $primaryKey = 'clientes';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'endereco_uid',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'numero'
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
    ];
}
