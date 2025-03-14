<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $primaryKey = 'pers_vend';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'pers_vend',
        'vend_canal',
        'vend_super',
        'flag_cuota',
        'vend_fono',
        'estado',
        'app_pass',
        'vend_ruta',
        'vend_ucre',
        'vend_fcre',
        'vend_umod',
        'vend_fmod',
    ];

    protected $casts = [
        'vend_fcre' => 'datetime',
        'vend_fmod' => 'datetime',
    ];
}
