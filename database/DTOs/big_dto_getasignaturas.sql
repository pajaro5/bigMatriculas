-- FUNCTION: public.big_dto_getasignaturas(integer)

-- DROP FUNCTION public.big_dto_getasignaturas(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getasignaturas(
	carrera_id integer)
    RETURNS TABLE(codigo character varying, nombre character varying, horas_docente integer, horas_practica integer, horas_autonoma integer, periodo_academico_id integer) 
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
    ROWS 1000
AS $BODY$
select  codigo, nombre, horas_docente, horas_practica, horas_autonoma, periodo_academico_id
from asignaturas 
where 
	estado = 'ACTIVO'
	and id in
	(select distinct(asignatura_id)
	from public.detalle_matriculas DM 
	where 
		DM.estado = 'MATRICULADO' 
		and DM.matricula_id in (select id from public.matriculas where malla_id in (select big_dto_getmallaid(carrera_id)))
	)
order by periodo_academico_id, nombre;
$BODY$;

ALTER FUNCTION public.big_dto_getasignaturas(integer)
    OWNER TO homestead;
