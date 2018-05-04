<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicalAppointmentController extends Controller
{
    public function index_Appointment(){
        $query = "SELECT map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments, map.date_appointments FROM medical_appointments map
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
                        ORDER BY map.id_medical_appointments";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.index_medical_appointments')->with('row',$rows);
    }
    public function create_Medical_Appointment(Request $request){
        return view('admin.create_medical_appointsments');
    }
    public function create_medical_appointments_a(){

        return view('admin.load_pages.reservation_medic');
    }
    public function create_date_appointment_a(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.load_pages.reservation_date')->with('schedul',$rows);
    }
    public function view_turns_day_date(Request $request){
        //return $request->all();
        $query = "SELECT ht.id_hour_turn, ht.start_time, ht.end_time, ht.state, ht.id_schedul, sch.name_schedules FROM hour_turns ht
                    INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE ht.id_schedul = :id_schedul AND ht.id_hour_turn NOT IN (
                   SELECT id_turn_hour FROM medical_appointments map  
                    WHERE date_trunc('day', map.date_appointments) = :date)";
        $rows=\DB::select(\DB::raw($query),array('date'=>$request->fecha,'id_schedul'=>$request->id_turno));
        //return $rows;
        return view('admin.load_pages.reservation_turns_date')->with('turns',$rows);
    }
    public function create_assignments_view_user_medic(Request $request){
        //return $request->all();
        $query = "SELECT * FROM hour_turns ht 
                        INNER JOIN schedules sch
                        ON sch.id_schedule = ht.id_schedul
                    WHERE id_hour_turn = :id_hour_turn";
        $rows=\DB::select(\DB::raw($query),array('id_hour_turn'=>$request->id));
        $query1 = "SELECT * FROM medical_assignments mass
                            INNER JOIN users us
                        ON us.id = mass.id_user
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                    WHERE id_schedul = :id_schedul";
        $rows1=\DB::select(\DB::raw($query1),array('id_schedul'=>$request->id_turno));
        $datos = $request->fecha;
        $query2 = "SELECT * FROM types_appointsment";
        $rows2=\DB::select(\DB::raw($query2));
        //return $rows1;
        return view('admin.load_pages.load_date_reservation')->with('dates',$datos)->with('turno',$rows)->with('medic',$rows1)->with('types',$rows2);
    }
    public function load_patient_date(Request $request){
        //return $request->all();
        $query = "SELECT * FROM pacientes WHERE ci = :ci";
        $row = \DB::select(\DB::raw($query),array('ci'=>$request->ci_patient));
        //return $row;
        return view('admin.load_pages.load_dates_patient')->with('dates_patient',$row);
    }
    public function insert_appointsment(Request $request){
        //return $request->all();
        DB::table('medical_appointments')->insert([
            'nombre_especialidad' => $request->nombre_especialidad,
            'descripcion_especialidad' => $request->descripcion_esp,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        return redirect()->action(
            'SpecialtiesController@index_especialidad'
        );
    }

}