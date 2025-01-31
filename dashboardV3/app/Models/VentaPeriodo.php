<?php

namespace App\Models;

use Awobaz\Compoships\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Awobaz\Compoships\Compoships;
use Awobaz\Compoships\Database\Eloquent\Model;


class VentaPeriodo extends Model
{
    use HasFactory,Compoships;

    protected $table = 'consolidado_mes_familia';

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marc_codi', 'marc_codi');
    }
    public function familia(): HasOne
    {
        return $this->hasOne(Familia::class, ['marc_codi', 'fami_codi'], ['marc_codi', 'fami_codi']);
    }
}
