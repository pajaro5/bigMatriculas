-- FUNCTION: public.big_dto_getperiodosacademicos(integer)

-- DROP FUNCTION public.big_dto_getperiodosacademicos(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getperiodosacademicos(
	carrera_id integer)
    RETURNS TABLE(carrera_id integer, nombre character varying, nivel bigint) 
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
    ROWS 1000
AS $BODY$
	select 
		carrera_id as carreraId,  
		PA.nombre as nombre,
		PA.id as nivel
	from public.periodo_academicos PA
	where PA.id in 
		(select  periodo_academico_id
			from asignaturas 
			where 
				estado = 'ACTIVO'
				and id in
						(select distinct(asignatura_id)
						from public.detalle_matriculas DM 
						where 
							DM.estado = 'MATRICULADO' 
							and DM.matricula_id in (
														select id 
														from public.matriculas 
														where malla_id in (select big_dto_getmallaid(carrera_id))
													)
						)
	order by periodo_academico_id, nombre);
$BODY$;

ALTER FUNCTION public.big_dto_getperiodosacademicos(integer)
    OWNER TO homestead;
