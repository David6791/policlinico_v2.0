<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Rutas para administrar usuarios */
Route::get('/index_medicos', 'UsersController@index_medico');
Route::post('/crear_medicos', 'UsersController@crear_medico');
Route::get('/crear_medico', 'UsersController@guardar_datos_medico');
Route::post('/verMedicos', 'UsersController@verMedico');
Route::post('update1/{id}', 'UsersController@update1');
Route::post('/darBajaUser', 'UsersController@baja_user');

Route::post('/update_users', 'UsersController@update_users');


Route::get('/index_enfermeras', 'UsersController@index_enfermera');
Route::post('/crear_enfermeras', 'UsersController@crear_enfermera');



Route::get('/index_dentistas', 'UsersController@index_dentista');
Route::post('/crear_dentistas', 'UsersController@crear_dentista');



/* rutas para especialidades */
Route::get('/index_especialidades', 'SpecialtiesController@index_especialidad');
Route::post('/crear_especialidad', 'SpecialtiesController@crear_especialidad');
Route::post('/darBajaSpecialtys', 'SpecialtiesController@darBajaSpecialty');
Route::post('/editSpecialties', 'SpecialtiesController@editSpecialtie');
Route::post('/saveSpecialties', 'SpecialtiesController@saveSpecialtie');

/* Rutas para adminitrar Pacientes... */

Route::get('/formulario_pacientes_nuevos', 'PatientsController@formulario_pacientes_nuevo');
Route::post('/store_patients', 'PatientsController@store_patient');
Route::get('/index_patients','PatientsController@index_patients');

Route::post('/filiation_completing', 'PatientsController@filiation_completing');

/* Rutas para Los Horarios */


Route::get('/index_schedules','SchedulesController@index_Schedules');
Route::post('/create_schedules','SchedulesController@create_Schedules');
Route::post('/darBajaSchedules', 'SchedulesController@darBajaSchedule');
Route::post('/edit_Schedules', 'SchedulesController@edit_Schedule');
Route::post('/save_schedules', 'SchedulesController@save_Schedule');


/* Rutas de Asignacion de Horarios a los Usuarios */
Route::get('/index_assignment','AssignmentsController@index_Assignments');
Route::post('/create_assignments','AssignmentsController@create_Assignments');
Route::post('/view_Assignments','AssignmentsController@view_Assignment');
Route::post('/edit_Assignments','AssignmentsController@edit_Assignment');
Route::post('/save_edit_assignments','AssignmentsController@save_edit_assignment');


/* Rutas para administrar citas medicas */
Route::get('/view_medical_appointment','MedicalAppointmentController@index_Appointment');

Route::get('/create_medical_appointment','MedicalAppointmentController@create_Medical_Appointment');

/* Rutas para escoger metodo cita medica */
Route::get('/create_medical_appointments','MedicalAppointmentController@create_medical_appointments_a');
Route::get('/create_date_appointments','MedicalAppointmentController@create_date_appointment_a');


Route::get('/view_turns_day_date','MedicalAppointmentController@view_turns_day_date');

Route::get('/create_assignments_view_user_medics','MedicalAppointmentController@create_assignments_view_user_medic');

Route::post('/load_patient_dates','MedicalAppointmentController@load_patient_date');

/* insertar datos de una cita medica */
Route::post('/insert_appointsments','MedicalAppointmentController@insert_appointsment');

Route::post('/modifi_appointments_save','MedicalAppointmentController@modifi_appointment_save');


/* Cita con Medico disponible */
Route::post('/select_turns_free','MedicalAppointmentController@select_turn_free');

Route::post('/load_dates_medic_patients','MedicalAppointmentController@load_dates_medic_patient');


Route::post('/insert_appointsments_medics','MedicalAppointmentController@insert_appointsments_medic');



/* Rutas para todo Emergencias */
Route::get('/view_emergency','EmergenciesController@index_emergency');

Route::post('/search_patients','EmergenciesController@search_patient');

Route::post('/store_emergencies','EmergenciesController@store_emergency');

/* Rutas para la atencion de Citas Medicas */
Route::get('/view_attention_lists','AttentionsController@view_attention_list'); 

Route::post('/start_appointment_date','AttentionsController@start_appointment_dates');
Route::post('/save_dates_appoinments_dates','AttentionsController@save_dates_appoinments_date');
Route::post('/load_medicine_table','AttentionsController@load_medicine_table');
Route::post('/save_dates_treatment','AttentionsController@save_dates_treatment'); 
Route::post('/store_patients_transfer','AttentionsController@store_patients_transfer');
Route::post('/end_medical_appointment','AttentionsController@end_medical_appointment');
Route::get('/view_attention_lists_full_medic','AttentionsController@view_attention_lists_full_medic'); 



Route::post('/load_dates_appoinments','AttentionsController@load_dates_appoinment');

Route::post('/load_dates_filiation_full','AttentionsController@load_dates_filiation_full');


/* Ruta para guardar datos de examen medico de un paciente. */
Route::post('/register_medical_exam','AttentionsController@register_medical_exam');



/* Rutas para Administrar datos del sistema */
Route::get('/index_pathologies','ManageDatesController@index_pathologie');
Route::post('/create_phatologies','ManageDatesController@create_phatologies');
Route::post('/edit_patologies_charge','ManageDatesController@edit_patologies_charge');

Route::post('/edit_phatologies','ManageDatesController@edit_phatologies');
Route::post('/darBajaPatologie','ManageDatesController@darBajaPatologie');


Route::get('/index_medical_dates','ManageDatesController@index_medical_date');
Route::post('/create_medical_dates','ManageDatesController@create_medical_date');
Route::post('/edit_medical_charge','ManageDatesController@edit_medical_charge');

Route::post('/edit_medical_dates','ManageDatesController@edit_medical_dates');


Route::get('/index_data_medical_appointments','ManageDatesController@index_data_medical_appointment');
Route::get('/index_register_data_medical_appointments','ManageDatesController@index_register_data_medical_appointment');
Route::post('/get_BajaDatemedics','ManageDatesController@get_BajaDatemedics');


/* Rutas para el registro de Medicamentos */
Route::get('/view_medicines','MedicinesController@index_view_medicines');
Route::post('/create_medicines','MedicinesController@create_medicine');


Route::get('/view_stock_medicines','MedicinesController@view_stock_medicine');
Route::post('/create_stock_medicines','MedicinesController@create_stock_medicines');



/* rutas para administrar habitaciones */


Route::get('/view_room','RoomsController@view_room');
Route::post('/create_rooms','RoomsController@create_rooms');

Route::get('/view_room_available','RoomsController@view_room_available');
Route::get('/edit_hospitalizations','RoomsController@edit_hospitalizations');


/* Rutas para examenes Medicos de los pacientes del policlinico */ 
Route::get('/view_medical_exam','MedicalExamController@view_medical_exam');
Route::post('/create_medical_exam','MedicalExamController@create_medical_exam');


/* Ver Historiales Medicos */
Route::get('/view_medical_record','MedicRecordsController@view_medical_record');
Route::post('/load_dates_record_medic_full','MedicRecordsController@load_dates_record_medic_full');
Route::post('/load_dates_record_medic_full_appoinment','MedicRecordsController@load_dates_record_medic_full_appoinment');



/* Reportes del Sistema */
Route::get('/view_list_report_daily','ReportsController@view_list_report_daily');
Route::get('/view_list_report_month','ReportsController@view_list_report_month');
Route::post('/send_range_dates_controller','ReportsController@send_range_dates_controller');
Route::get('/view_list_report_daily_all','ReportsController@view_list_report_daily_all');
Route::get('/view_list_report_range_daily_all','ReportsController@view_list_report_range_daily_all');
Route::post('/send_range_dates_controller_full_user','ReportsController@send_range_dates_controller_full_user');