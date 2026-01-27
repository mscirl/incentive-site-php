<?php

namespace Mscirl\IncentiveSitePhp\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model {
    protected $table = 'curriculos';
    
    protected $fillable = [
        'nome',
        'cv_link',
    ];

    //Habilita timestamps automaticos (created_at e updated_at nos registros)
    public $timestamps = true;
}
