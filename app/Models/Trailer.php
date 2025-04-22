<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trailer extends Model
{
    protected $fillable = [
        'matricula',
        'marca',
        'vin',
        'fecha_matricula',
        'fecha_itv',
        'fecha_atp',
        'deposito_1',
        'deposito_2',
        'deposito_3',
        'deposito_4',
        'capacidad'
    ];
    
    // public function tractora(): BelongsTo
    // {
    //     return $this->belongsTo(Tractora::class, 'tractora_id');
    // }

    // public function conductor(): BelongsTo
    // {
    //     return $this->belongsTo(Conductor::class, 'conductor_id');
    // }
}
