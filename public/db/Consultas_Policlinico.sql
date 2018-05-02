ALTER TABLE state_appointments ALTER COLUMN state SET default 'activo'


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




SELECT * FROM hour_turns ht 
    INNER JOIN schedules sch
	ON sch.id_schedule = ht.id_schedul
WHERE id_hour_turn = 1


SELECT * FROM medical_assignments mass
     INNER JOIN users us
	ON us.id = mass.id_user
     INNER JOIN tipo_usuarios tus
	ON tus.id_tipo = us.tipo_usuario
WHERE id_schedul = 1













