-- FUNCTION: public.big_dto_getestudiantes(integer)

-- DROP FUNCTION public.big_dto_getestudiantes(integer);

CREATE OR REPLACE FUNCTION public.big_dto_getestudiantes(
	periodolectivoid integer)
    RETURNS TABLE(periodo_lectivo_id integer, carrera_id integer, jornada character varying, nombre1 character varying, nombre2 character varying, apellido1 character varying, apellido2 character varying, identificacion character varying, telefono_celular character varying, telefono_fijo character varying, tiene_discapacidad character varying, correo character varying) 
    LANGUAGE 'sql'

    COST 100
    VOLATILE 
    ROWS 1000
AS $BODY$

select 
	periodolectivoid as periodo_lectivo_id, 
	MA.carrera_id carrera_id,
	M.jornada_operativa,
	E.nombre1,
	E.nombre2,
	E.apellido1, 
	E.apellido2,
	E.identificacion,
	IE.telefono_celular,
	IE.telefono_fijo,
	IE.tiene_discapacidad,
	E.correo_institucional correo	
from estudiantes E
	join matriculas M on E.id = M.estudiante_id
	join mallas MA on M.malla_id = MA.id
	join informacion_estudiantes IE on M.id = IE.matricula_id
where
	M.periodo_lectivo_id = periodolectivoid and
	M.estado LIKE 'MATRICULADO'
order by	
	MA.carrera_id,
	E.identificacion
	
$BODY$;

ALTER FUNCTION public.big_dto_getestudiantes(integer)
    OWNER TO homestead;
