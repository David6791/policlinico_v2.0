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



Route::get('/index_enfermeras', 'UsersController@index_enfermera');
Route::post('/crear_enfermeras', 'UsersController@crear_enfermera');



Route::get('/index_dentistas', 'UsersController@index_dentista');
Route::post('/crear_dentistas', 'UsersController@crear_dentista');



/* rutas para especialidades */
Route::get('/index_especialidades', 'SpecialtiesController@index_especialidad');
Route::post('/crear_especialidad', 'SpecialtiesController@crear_especialidad');

/* Rutas para adminitrar Pacientes... */

Route::get('/formulario_pacientes_nuevos', 'PatientsController@formulario_pacientes_nuevo');
Route::post('/store_patients', 'PatientsController@store_patient');


/* Rutas para Los Horarios */


Route::get('/index_schedules','SchedulesController@index_Schedules');
Route::post('/create_schedules','SchedulesController@create_Schedules');
