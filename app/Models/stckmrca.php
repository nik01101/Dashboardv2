<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Awobaz\Compoships\Compoships;
use Awobaz\Compoships\Database\Eloquent\Model;

class stckmrca extends Model
{
    use HasFactory,Compoships;

    // Especifica el nombre de la tabla
    protected $table = 'stock_ultimo';

    // Especifica la clave primaria
    protected $primaryKey = 'prod_codi';

    // Desactiva la auto-incrementación si la clave primaria no es un entero auto-incrementado
    public $incrementing = false;

    // Especifica el tipo de clave primaria si no es un entero
    protected $keyType = 'string';

    // Define si la tabla usa las columnas created_at y updated_at
    public $timestamps = false;

    // Define los atributos que pueden ser asignados en masa
    protected $fillable = [
        'fecha_stock',
        'marc_codi',
        'fami_codi',
        'prod_codi',
        'prod_desc',
        'prod_unid',
        'prod_cant',
        'prod_costo',
        'prod_stot',
        'prod_glosa',
        'hora_data'
    ];

    // Si hay relaciones, defínelas aquí
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marc_codi', 'marc_codi');
    }

    public function familia()
    {
        return $this->belongsTo(Familia::class, ['marc_codi', 'fami_codi'], ['marc_codi', 'fami_codi']);
    }
}
