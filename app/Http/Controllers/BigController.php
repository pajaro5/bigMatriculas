<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BigController extends Controller
{    
    public function carreras($periodoLectivoId)
    {
        $carreras = DB::select('select * from big_dto_getcarreras(?)', [$periodoLectivoId]);
        return $carreras;
    }

    public function getPeriodosAcademicosByCarrera($carreraId)
    {
        $periodosAcademicos = DB::select('select * from big_dto_getperiodosacademicos(?)', [$carreraId]);
        return $periodosAcademicos;
    }

    public function getAsignaturasByCarrera($carreraId)
    {
        $asignaturas = DB::select('select * from big_dto_getasignaturas(?)', [$carreraId]);
        return $asignaturas;

    }

    public function getEstudiantesByPeriodoLectivo($periodoLectivoId)
    {
        $estudiantes = DB::select('select * from big_dto_getestudiantes(?)', [$periodoLectivoId]);
        return $estudiantes;        
    }

    public function getEstudiantesAsignaturasByPeriodoLectivo($periodoLectivoId)
    {
        return DB::select('select * from big_dto_getestudiantesasignaturas(?)', [$periodoLectivoId]);
        
    }
}
