<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipo extends Model
{
    protected $fillable = [
        'id',
        'name',
        'conductor_id',
        'tractora_id',
        'trailer_id',
    ];
    public function tractora(): BelongsTo
    {
        return $this->belongsTo(Tractora::class, 'tractora_id');
    }

    public function conductor(): BelongsTo
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }
    public function trailer(): BelongsTo
    {
        return $this->belongsTo(Trailer::class, 'trailer_id');
    }
}
