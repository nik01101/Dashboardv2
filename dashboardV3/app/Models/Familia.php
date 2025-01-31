<?php

namespace App\Models;

use Awobaz\Compoships\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Awobaz\Compoships\Compoships;

class Familia extends Model
{
    use HasFactory,Compoships;
    protected $table = 'familia';
    protected $primaryKey = 'fami_codi';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'marc_codi',
        'fami_codi',
        'fami_descl',
        'fami_descc',
        'estado',
        'fami_cat1',
        'cat1_desc',
        'fami_cat2',
        'cat2_desc',
        'fami_int2',
        'fami_char2',
        'fami_ucre',
        'fami_fcre',
        'fami_umod',
        'fami_fmod',
    ];
    protected $casts = [
        'fami_fcre' => 'datetime',
        'fami_fmod' => 'datetime',
    ];
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marc_codi', 'marc_codi');
    }
}
