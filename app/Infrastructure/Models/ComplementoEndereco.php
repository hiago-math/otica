<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class ComplementoEndereco extends Model
{
    use UuidTrait;

    protected $table = 'complemento_enderecos';
    protected $primaryKey = 'complemento_endereco_uid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'cliente_uid',
        'complemento',
        'numero'
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
    ];
}
