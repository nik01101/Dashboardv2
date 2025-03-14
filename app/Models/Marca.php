<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';

    // Especificar la clave primaria si no es 'id'
    protected $primaryKey = 'marc_codi'; // Cambia esto si tu clave primaria es diferente

    // La clave primaria es un entero, así que se establece en true
    public $incrementing = true; // Establecido en true porque es un entero

    // Especificar el tipo de clave primaria
    protected $keyType = 'int'; // Cambiado a 'int' porque smallint es un entero

    // Especificar los atributos que son asignables en masa
    protected $fillable = [
        'marc_codi',
        'marc_descl',
        'marc_descc',
        'estado',
        'marc_cuota',
        'marc_char2',
        'marc_ucre',
        'marc_fcre',
        'marc_umod',
        'marc_fmod',
        'checked',
    ];

    public $timestamps = false;

    public function detallesVenta()
    {
        return $this->hasMany(DetalleVentaMarcaMes::class, 'marc_codi', 'marc_codi');
    }
}
