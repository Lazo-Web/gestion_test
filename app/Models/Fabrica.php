<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fabrica extends Model
{
    protected $table = 'fabrica';
    protected $primaryKey = 'id_fabrica';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];

    // Define any relationships or additional methods here
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
