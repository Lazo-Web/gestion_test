<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Tractora extends Model
{
    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'vin',
        'fecha_matricula',
        'fecha_itv',
        'fecha_tacografo',
    ];
    
     
    // public function conductor():BelongsTo
    // {
    //     return $this->belongsTo(Conductor::class, 'conductor_id');
    // }    

}
