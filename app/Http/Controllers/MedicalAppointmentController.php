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
        $query = "SELECT map.id_medical_appointments, map.appointment_description, pa.nombres, pa.ap_paterno, pa.ap_materno, mass.id_user, us.name m_name, us.apellidos m_apellidos, sch.name_schedules, ht.start_time, sap.name_state_appointments FROM medical_appointments map
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
        return ("Hola");
    }
}