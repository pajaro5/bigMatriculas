<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PeriodoLectivo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'codigo',
        'fecha_inicio_periodo',
        'fecha_fin_periodo',
        'fecha_inicio_cupo',
        'fecha_fin_cupo',
        'fecha_inicio_ordinaria',
        'fecha_fin_ordinaria',
        'fecha_inicio_extraordinaria',
        'fecha_fin_extraordinaria',
        'fecha_inicio_especial',
        'fecha_fin_especial',
        'estado',
    ];

    public function matriculas()
    {
        return $this->hasMany('App\Matricula');
    }
}
