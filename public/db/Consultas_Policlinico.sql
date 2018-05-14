ALTER TABLE medical_appointments ALTER COLUMN state_appointments SET default 2


ALTER TABLE medical_appointments ALTER COLUMN data_creation_appointments SET default now()


SELECT sch.id_schedule, mass.id_user, tus.nombre_tipo, us.name, us.apellidos, sch.name_schedules, sch.schedules_start, sch.schedules_end FROM medical_assignments mass 
     INNER JOIN users us
	ON us.id = mass.id_user
     INNER JOIN tipo_usuarios tus
	ON us.tipo_usuario = tus.id_tipo
     INNER JOIN schedules sch
	ON sch.id_schedule = mass.id_schedul
WHERE id_user = 5


SELECT sch.id_schedule, mass.id_user, tus.nombre_tipo, us.name, us.apellidos, sch.name_schedules, sch.schedules_start, sch.schedules_end FROM medical_assignments mass 
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON us.tipo_usuario = tus.id_tipo
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                    WHERE id_user =5


SELECT sch.id_schedule, sch.name_sche	dules FROM schedules sch 
WHERE sch.state = 'activo' AND sch.id_schedule NOT IN(
    SELECT mass.id_schedul
    FROM medical_assignments mass
    WHERE mass.id_user = 5
)


select es.id_especialidad, es.nombre_especialidad
        from especialidades es
        where es.tipo_usuario = :tip and es.id_especialidad  NOT IN
            (
                select id_especialidad 
                from usuarios_especialidades
                where id_usuario = :id_medico and estado = 'activo'
            )


select sch.id_schedule, sch.name_schedules from schedules sch where sch.state = 'activo'



select * from medical_appointments
SELECT map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments FROM medical_appointments map
     INNER JOIN pacientes pa
	ON pa.id_paciente = map.id_patient
     INNER JOIN medical_assignments mass
	ON mass.id_medical_assignments = map.id_medical_assignments
     INNER JOIN users us
	ON us.id = mass.id_user
     INNER JOIN schedules sch
	ON sch.id_schedule = mass.id_schedul
     INNER JOIN hour_turns ht
	ON ht.id_hour_turn = map.id_turn_hour
     INNER JOIN state_appointments sap
	ON sap.id_state_appointments = map.state_appointments


SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
    INNER JOIN schedules sch
	ON sch.id_schedule = ht.id_schedul
    WHERE ht.id_schedul = 1 AND ht.id_hour_turn NOT IN (
	SELECT id_turn_hour FROM medical_appointments map
    WHERE date_trunc('day', map.date_appointments) = '05-02-2018'
)

SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map  
                    WHERE date_trunc('day', map.date_appointments) = '05-02-2018' AND id_schedul = 1)





select * from hour_turns 

where id_schedul = 5


SELECT * FROM medical_appointments map
RIGHT JOIN hour_turns ht
ON map.id_turn_hour = ht.id_hour_turn
WHERE date_trunc('day', map.date_appointments) = '05-02-2018' and id_hour_turn NOT IN(
select id_hour_turn from hour_turns 
)


ht.id_hour_turn IS NULL


SELECT * FROM hour_turns

SELECT * FROM medical_appointments 

where date_trunc('day', date_appointments) = '05-02-2018'


CREATE OR REPLACE FUNCTION public.modify_appointments(
    _id_apoointments integer,
    _id_state integer)
  RETURNS integer AS
$BODY$
DECLARE	
BEGIN
	update medical_appointments set state_appointments=_id_state where id_medical_appointments = _id_apoointments;
	return 5;	
END;
$BODY$
  LANGUAGE plpgsql VOLATILE

SELECT mass.id_medical_assignments, sch.id_schedule, sch.name_schedules, us.id, us.name, us.apellidos, tp.nombre_tipo, ht.id_hour_turn, ht.start_time FROM medical_assignments mass
    INNER JOIN schedules sch
	ON sch.id_schedule = mass.id_schedul
    INNER JOIN users us
	ON us.id = mass.id_user
    INNER JOIN tipo_usuarios tp
	ON tp.id_tipo = us.tipo_usuario
    INNER JOIN hour_turns ht
	ON ht.id_hour_turn = 15
WHERE id_medical_assignments = 1
(select currval('venta_pasaje_id_venta_pasaje_seq'))::integer;
CREATE OR REPLACE FUNCTION public.register_emergency(
    _id_patient integer,
    _ci_patient integer,
    _name_patient varchar,
    _apaterno_patient varchar,
    _amaterno_patient varchar,
    _fnacimiento_patient date,
    _direccion_patient varchar,
    _sexo_patient varchar,
    _descryption_emergecy varchar)
  RETURNS integer AS
$BODY$
DECLARE
	_cantidad integer;
	_id_patient_new integer;
BEGIN
	_cantidad=0;
	_id_patient_new=0;
	_cantidad=(select count(id_paciente) from pacientes where id_paciente = _id_patient);
	if (_cantidad = 0) then
		insert into pacientes(ci,ap_paterno,ap_materno,nombres,sexo,direccion,fecha_nacimento) values(_ci_patient,_apaterno_patient,_amaterno_patient,_name_patient,_sexo_patient,_direccion_patient,_fnacimiento_patient);
		_id_patient_new=(select currval('pacientes_id_paciente_seq'))::integer;
		insert into medical_appointments(id_patient,id_medical_assignments,id_turn_hour,appointment_description,date_appointments,emergency) values(_id_patient_new,6,17,_descryption_emergecy,now(),'S');		
	else
		insert into medical_appointments(id_patient,id_medical_assignments,id_turn_hour,appointment_description,date_appointments,emergency) values(_id_patient,6,17,_descryption_emergecy,now(),'S');		
		
	end if;

	return 5;	
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
select * from view_list_appoinments(1,'05-14-2018') 
CREATE OR REPLACE FUNCTION public.view_list_appoinments(
    IN _id_user integer,
    IN _date_now date)
  RETURNS TABLE(r_ci character varying, r_id_medical_appointments integer, r_appointment_description text, r_nombres character varying, r_apaterno character varying, r_amaterno character varying, r_id_user integer, r_m_name character varying, r_m_apellidos character varying, r_name_schedules character varying, r_start_time time, r_name_state_appoinments character varying, r_date_appointments timestamp, emergency character varying) AS
$BODY$
begin
	if(_id_user = 1) then
		return query(
		SELECT pa.ci, map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments, map.emergency FROM medical_appointments map
                            INNER JOIN pacientes pa
                        ON pa.id_paciente = map.id_patient
                            INNER JOIN medical_assignments mass
                        ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                        ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN state_appointments sap
                        ON sap.id_state_appointments = map.state_appointments
                    WHERE date_trunc('day', map.date_appointments) = _date_now
                        ORDER BY map.emergency desc, map.id_medical_appointments 
		);
	else	
		return query(
		SELECT pa.ci, map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments, map.emergency FROM medical_appointments map
                            INNER JOIN pacientes pa
                        ON pa.id_paciente = map.id_patient
                            INNER JOIN medical_assignments mass
                        ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                        ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN state_appointments sap
                        ON sap.id_state_appointments = map.state_appointments
                    WHERE date_trunc('day', map.date_appointments) = _date_now AND mass.id_user = _id_user
                        ORDER BY map.emergency desc, map.id_medical_appointments
		);

	end if;
end
$BODY$
  LANGUAGE plpgsql VOLATILE



SELECT map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments FROM medical_appointments map
                            INNER JOIN pacientes pa
                        ON pa.id_paciente = map.id_patient
                            INNER JOIN medical_assignments mass
                        ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                        ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN state_appointments sap
                        ON sap.id_state_appointments = map.state_appointments
                        ORDER BY map.emergency desc, map.id_medical_appointments

select * from public.view_list_appoinments(1,'05-08-2018')


SELECT * FROM medical_appointments  map
	INNER JOIN pacientes pa
		ON pa.id_paciente = map.id_patient
WHERE map.id_medical_appointments = 18

































