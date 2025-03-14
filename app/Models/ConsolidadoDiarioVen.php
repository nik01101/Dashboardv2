<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsolidadoDiarioVen extends Model
{
    use HasFactory;

    protected $table = 'consolidado_diario_ven';

    public function vendedores()
    {
        return $this->belongsTo(Vendedores::class, 'pers_vend', 'pers_vend');
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marc_codi', 'marc_codi');
    }
}
