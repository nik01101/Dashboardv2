<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVentaMarcaMes extends Model
{
    use HasFactory;

    protected $table = 'consolidado_mes_marca';

    // Relación con la tabla de marcas
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marc_codi', 'marc_codi');
    }
}
