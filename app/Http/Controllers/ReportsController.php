<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ReportsController extends Controller
{
    public function view_list_report_daily(){
        //este de aqui es el que da para los medicos
        /*$query = "SELECT * FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
		                    ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments = current_date AND mass.id_user = :id_user";*/
        $query = "SELECT p.ci_paciente, p.nombres, p.ap_paterno, p.ap_materno,ht.start_time, sapp.name_state_appointments, mapp.appointment_description FROM medical_appointments mapp
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN hour_turns ht
                            ON ht.id_hour_turn = mapp.id_turn_hour
                        INNER JOIN state_appointments sapp
                            ON sapp.id_state_appointments = mapp.state_appointments
                        INNER JOIN pacientes p
                            ON p.id_paciente = mapp.id_patient
                    WHERE date_appointments = current_date";
        $rows=\DB::select(\DB::raw($query));            
        //$rows=\DB::select(\DB::raw($query),array('id_user'=>Auth::user()->id));
        //return (Auth::user()->id);
        return view('reports.index_list_daily')->with('list_daily',$rows);
    }
}