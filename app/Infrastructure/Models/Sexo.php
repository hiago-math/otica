<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Infrastructure\Models\Casts\Timestamp;
use Infrastructure\Models\Traits\UuidTrait;

class Sexo extends Model
{
    use UuidTrait;

    protected $table = 'sexos';
    protected $primaryKey = 'sexo_uid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'sexo_uid',
        'nome',
        'nome_exibicao'
    ];

    protected $casts = [
        'created_at' => Timestamp::class,
        'updated_at' => Timestamp::class,
    ];

    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'sexo_uid', 'sexo_uid');
    }
}
