<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AttentionsController extends Controller
{
    public function view_attention_list(){
        $fecha=date("m-d-Y");
        $query = "select * from view_list_appoinments(:id_user, :date)";
        $rows=\DB::select(\DB::raw($query),array('id_user'=>Auth::user()->id,'date'=>$fecha));
        //return $rows;
        return view('attentions.view_appoinments_list')->with('list',$rows);
    }
    public function start_appointment_dates(Request $request){
        //return $request->all();
        $query = "SELECT id_paciente, ci, ap_paterno, ap_materno, nombres, sexo, direccion, telefono, celular, fecha_nacimento, pais_nacimiento, ciudad_nacimiento, provincia, localidad_nacimiento, fecha_creacion, esta_paciente FROM medical_appointments  map
                        INNER JOIN pacientes pa
                            ON pa.id_paciente = map.id_patient
                    WHERE map.id_medical_appointments = :id_appoinments";
        $rows=\DB::select(\DB::raw($query),array('id_appoinments'=>$request->id_appointments));
        $querys = "SELECT map.id_medical_appointments, map.id_patient, map.id_turn_hour, map.appointment_description, map.data_creation_appointments, sap.name_state_appointments, sch.name_schedules, ht.start_time from medical_appointments map
                        INNER JOIN state_appointments sap
                            ON sap.id_state_appointments = map.state_appointments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = map.id_medical_assignments
                        INNER JOIN schedules sch
                            ON sch.id_schedule = mass.id_schedul
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = map.id_turn_hour
                    WHERE id_patient =(
                    SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appoinments
                    ) ORDER BY data_creation_appointments";
        $row=\DB::select(\DB::raw($querys),array('id_appoinments'=>$request->id_appointments));
        return view('attentions.view_dates_patient')->with('dates_patient',$rows)->with('list_app',$row);
    }
}