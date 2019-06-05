-- FUNCTION: public.big_dto_getmallaid(integer)

-- DROP FUNCTION public.big_dto_getmallaid(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getmallaid(
	carreraid integer)
    RETURNS integer
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
AS $BODY$
	select id from public.mallas where carrera_id = carreraid;
$BODY$;

ALTER FUNCTION public.big_dto_getmallaid(integer)
    OWNER TO homestead;
