-- FUNCTION: public.big_dto_getestudiantesasignaturas(integer)

-- DROP FUNCTION public.big_dto_getestudiantesasignaturas(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getestudiantesasignaturas(
	periodolectivoid integer)
    RETURNS TABLE(carrera_id integer, cedula character varying, asignatura character varying, jornada character varying) 
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
    ROWS 1000
AS $BODY$

	select 
		MA.carrera_id carrera_id,	
		E.identificacion cedula,
		A.codigo,
		M.jornada_operativa jornada

	from estudiantes E
		join matriculas M on E.id = M.estudiante_id
		join mallas MA on M.malla_id = MA.id
		join detalle_matriculas DM on M.id = DM.matricula_id
		join asignaturas A on DM.asignatura_id = A.id

	where
		M.periodo_lectivo_id = periodolectivoid and
		M.estado LIKE 'MATRICULADO'
	order by	
		MA.carrera_id,
		E.identificacion
$BODY$;

ALTER FUNCTION public.big_dto_getestudiantesasignaturas(integer)
    OWNER TO homestead;
