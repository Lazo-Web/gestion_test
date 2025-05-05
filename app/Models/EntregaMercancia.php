<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EntregaMercancia extends Model
{
     public function entrega():BelongsTo
     {
        return $this->belongsTo(Entrega::class, 'entrega_id');
     }
        public function mercancia():BelongsTo
        {
            return $this->belongsTo(Mercancia::class, 'mercancia_id');
        }
}
