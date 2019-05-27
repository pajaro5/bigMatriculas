<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/detalle_matriculas', 'DetalleMatriculasController@create');
Route::put('/detalle_matriculas', 'DetalleMatriculasController@update');
Route::get('/detalle_matriculas', 'DetalleMatriculasController@get');
Route::get('/detalle_matriculas/count', 'DetalleMatriculasController@getCountDetalleCuposCarrera');

Route::get('/asignaturas', 'AsignaturasController@get');
Route::get('/asignaturas/{id}', 'AsignaturasController@getOne');

Route::get('/periodo_lectivos', 'PeriodoLectivosController@get');
Route::get('/periodo_lectivos/actual', 'PeriodoLectivosController@getActual');
Route::get('/periodo_lectivos/{id}', 'PeriodoLectivosController@getOne');

Route::get('/tipo_matriculas', 'TipoMatriculasController@get');
Route::get('/tipo_matriculas/{id}', 'TipoMatriculasController@getOne');


Route::get('/matriculas/cupo', 'MatriculasController@getCupo');
Route::get('/matriculas/aprobado', 'MatriculasController@getAprobado');
Route::delete('/matriculas/cupo', 'MatriculasController@deleteCupo');
Route::delete('/matriculas/matricula', 'MatriculasController@deleteMatricula');
Route::get('/matriculas/validate_cupo', 'MatriculasController@validateCupo');
Route::get('/matriculas/validate_cupos_carrera', 'MatriculasController@validateCuposCarrera');
Route::get('/matriculas/validate_cupos_periodo_academico', 'MatriculasController@validateCuposPeriodoAcademico');

Route::delete('/matriculas/delete_cupos_carrera', 'MatriculasController@deleteCuposCarrera');
Route::delete('/matriculas/delete_cupos_periodo_academico', 'MatriculasController@deleteCuposPeriodo');
Route::get('/matriculas/certificado_matricula', 'MatriculasController@getCertificadoMatricula');
Route::get('/matriculas/solicitud_matricula', 'MatriculasController@getSolicitudMatricula');
Route::get('/matriculas/carreras', 'MatriculasController@getMatriculasCarreras');
Route::get('/matriculas/periodo_academicos', 'MatriculasController@getMatriculasPeriodoAcademicos');
Route::get('/matriculas/cupos', 'MatriculasController@getCupos');
Route::get('/matriculas/aprobados', 'MatriculasController@getAprobados');
Route::get('/matriculas/en_proceso', 'MatriculasController@getCuposEnProceso');
Route::get('/matriculas/asignaturas', 'MatriculasController@getAsignaturasMalla');
Route::put('/matriculas', 'MatriculasController@updateMatricula');
Route::get('/matriculas/count', 'MatriculasController@getCountMatriculas');
Route::delete('/matriculas/delete_detalle_cupo', 'MatriculasController@deleteDetalleCupo');
Route::delete('/matriculas/delete_detalle_matricula', 'MatriculasController@deleteDetalleMatricula');
Route::put('/matriculas/fecha_formulario', 'MatriculasController@updateFechaFormulario');
Route::put('/matriculas/fecha_solicitud', 'MatriculasController@updateFechaSolicitud');

Route::get('/catalogos/paises', 'CatalogosController@getPaises');
Route::get('/catalogos/provincias', 'CatalogosController@getProvincias');
Route::get('/catalogos/cantones', 'CatalogosController@getCantones');
Route::get('/catalogos/carreras', 'CatalogosController@getCarreras');
Route::get('/catalogos/periodo_academicos', 'CatalogosController@getPeriodoAcademicos');
Route::get('/exports/cupos_carrera', 'ExcelController@exportCuposCarrera');
Route::get('/exports/cupos_periodo_academico', 'ExcelController@exportCuposPeriodoAcademico');

Route::post('/imports/cupos', 'ExcelController@importCupos');
Route::post('/imports/estudiantes', 'ExcelController@importEstudiantes');
Route::post('/imports/matriculas', 'ExcelController@importMatriculas');

Route::get('/certificado-matricula/{matricula_id}', 'MatriculasController@getCertificadoMatriculaPublic');

Route::get('/exports/errores_cupos', 'ExcelController@exportErroresCupos');

Route::get('/email', 'PruebasController@email');
Route::post('/emails', 'EmailsController@send');

Route::get('/paralelos', 'ExcelController@changeParalelo');
Route::get('/users', 'UsersController@getOne');
Route::get('/estudiantes/en_proceso', 'EstudiantesController@getEnProceso');
Route::get('/estudiantes/{id}', 'EstudiantesController@getOne');
Route::get('/estudiantes/formulario/{id}', 'EstudiantesController@getFormulario');
Route::put('/estudiantes/update_perfil', 'EstudiantesController@updatePerfil');
Route::put('/users/reset_password', 'UsersController@resetPassword');

Route::get('/big/carreras/{periodoLectivoId}', 'BigController@carreras');
Route::get('/big/carrera/{carreraId}/periodosacademicos', 'BigController@getPeriodosAcademicosByCarrera');

Route::get('/prueba', 'PruebasController@get')->middleware('auth:api');

Route::post('/matriculas/open_periodo_lectivo', 'MatriculasController@openPeriodoLectivo');