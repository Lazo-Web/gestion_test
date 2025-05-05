<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'tipo',

    ];

    public function fabrica(): HasMany
    {
        return $this->hasMany(Fabrica::class);
    }
}
