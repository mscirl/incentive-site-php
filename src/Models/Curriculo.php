<?php

namespace Mscirl\IncentiveSitePhp\Models;

class Curriculo extends Model {
    protected $table = 'curriculos';
    protected $primaryKey = 'id';
    
    #Método public para habilitar timestamps (created_at e updated_at nos registros)
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'cv_link',
    ];
}
