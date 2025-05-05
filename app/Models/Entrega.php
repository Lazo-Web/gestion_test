<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entrega extends Model
{


    // Define any relationships or additional methods here
    public function clienteOrigen():BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_origen_id');
    }
    public function clienteDestino():BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_destino_id');
    }

    public function fabricaOrigen():BelongsTo
    {
        return $this->belongsTo(Fabrica::class, 'fabrica_origen_id');
    }
    public function fabricaDestino():BelongsTo
    {
        return $this->belongsTo(Fabrica::class, 'fabrica_destino_id');
    }
    public function equipo():BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }
    public function mercacncia():HasMany
    {
        return $this->hasMany(Mercancia::class);
    }

}
