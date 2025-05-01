<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'direccion',
        'ciudad',
        'provincia',
        'cod_postal',
        'telefono',
        'permiso_conducir_fecha',
        'targeta_tacografo_vencimiento',
        'capacitacion_vencimiento',
        'fecha_nacimiento'
    ];
    public function tractora(): HasMany
    {
        return $this->hasMany(Tractora::class, 'conductor_id');
    }
    public function trailer(): HasMany
    {
        return $this->hasMany(Trailer::class, 'conductor_id');
    }
}
