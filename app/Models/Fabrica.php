<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fabrica extends Model
{
    

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'cliente_id',
    ];

    // Define any relationships or additional methods here
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
