<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    protected $table = 'mercancias';

    protected $fillable = [
        'id',
        'nombre',
        'fabrica_id',
    ];

    public function fabrica()
    {
        return $this->belongsTo(Fabrica::class);
    }
}
