-- FUNCTION: public.big_dto_getcarreras(integer)

-- DROP FUNCTION public.big_dto_getcarreras(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getcarreras(
	periodolectivoid integer)
    RETURNS TABLE(id integer, nombre character varying, descripcion character varying, modalidad character varying) 
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
    ROWS 1000
AS $BODY$
	select 
		M.carrera_id as id,
		C.nombre as nombre,
		C.descripcion as descripcion,
		C.modalidad as modalidad
	FROM 
		public.mallas M join public.carreras C on C.id = M.carrera_id
	WHERE 
		M.id in (select distinct (malla_id)
					FROM public.matriculas 
					WHERE periodo_lectivo_id = periodoLectivoId
				);
$BODY$;

ALTER FUNCTION public.big_dto_getcarreras(integer)
    OWNER TO homestead;
