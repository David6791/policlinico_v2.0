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
        $querys = "SELECT map.id_medical_appointments, map.id_patient, map.id_turn_hour, ta.name_type, map.appointment_description, map.date_appointments, map.data_creation_appointments, sap.name_state_appointments, sch.name_schedules, ht.start_time from medical_appointments map
                            INNER JOIN state_appointments sap
                                ON sap.id_state_appointments = map.state_appointments
                            INNER JOIN medical_assignments mass
                                ON mass.id_medical_assignments = map.id_medical_assignments
                            INNER JOIN schedules sch
                                ON sch.id_schedule = mass.id_schedul
                            INNER JOIN hour_turns ht
                                ON ht.id_hour_turn = map.id_turn_hour
                            INNER JOIN types_appointsment ta
                                ON ta.id_type_appointments = map.type_appoinment
                        WHERE id_patient =(
                    SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appoinments
                    ) ORDER BY data_creation_appointments";
        $row=\DB::select(\DB::raw($querys),array('id_appoinments'=>$request->id_appointments));
        $query = "SELECT * FROM dates_of_register
                    WHERE state_date_register = 'activo'";
        $rows2=\DB::select(\DB::raw($query));
        $query3 = "SELECT * FROM medical_appointments map
                    INNER JOIN types_appointsment ta
                        on ta.id_type_appointments = map.type_appoinment
                    where id_medical_appointments = :id_appoinments AND state_appointments = 3";
        $rows3=\DB::select(\DB::raw($query3),array('id_appoinments'=>$request->id_appointments));
        $query4 = "SELECT * FROM stock_medicines sm
                        INNER JOIN medicines m
                            ON m.id_medicines = sm.id_medicine
                    WHERE sm.quantity_medicine > 1 AND sm.date_expiration > now() AND m.state_medicine = 'activo'";
        $rows4=\DB::select(\DB::raw($query4));

        return view('attentions.view_dates_patient')->with('dates_patient',$rows)->with('list_app',$row)->with('dat',$rows2)->with('dates_cita_end',$rows3)->with('list_mecines_disponibles',$rows4);
    }
    public function load_dates_appoinment(Request $request){
        return $request->all();
    }
    public function load_dates_filiation_full(Request $request){
        $query = "SELECT * FROM pacientes pa
                        INNER JOIN pacientes_patologias pap
                            ON pa.id_paciente = pap.id_paciente
                        INNER JOIN patologias pat
                            ON pat.id_patologia = pap.id_patologia
                    WHERE pa.id_paciente = :id_patient";
        $rows=\DB::select(\DB::raw($query),array('id_patient'=>$request->id_patient));
        $query1 = "SELECT * FROM pacientes pa
                        INNER JOIN patients_dates_medic ptm
                            ON pa.id_paciente = ptm.id_patient
                        INNER JOIN datos_medicos dm
                            ON dm.id_dato_medico = ptm.id_date_medic
                    WHERE pa.id_paciente = :id_patient";
        $rows1=\DB::select(\DB::raw($query1),array('id_patient'=>$request->id_patient));
        //return $rows1;
        return view('attentions.view_filiation_dates_full')->with('patologias',$rows)->with('datos_medicos',$rows1);
    }
    public function save_dates_appoinments_date(Request $request){
        //return $request->all();
        /* Modificar los datos de aqui para cer que se puede insertar. */
        $al = $request->all();
        foreach($al as $row =>$val) {
            if(is_numeric($row)){
                $data2[] = [
                    $row => $val
                ];
                //json_decode($data2);
            }
        }
        //return json_encode( $data2);
        /*DB::table('notes_medic_dates_appoinments')->insert([
            'id_medical_appoinments' => $request->id_appoinments,
            'observation_medical_appoinments' => $request->observation_appointment_dates,
            'dates_register_appoinments' => json_encode($data2) 
        ]);*/
        if(isset($request->observations_appointments)){
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
                'dates_register_appoinments' => json_encode($data2),
                'observation_re_medical_consusltation' => $request->observations_appointments,
                're_medical_consultation' => 'S'
            ]);
            $add_re = DB::table('medical_appointments')
            ->where('id_medical_appointments', '=', $request->id_appoinments)
            ->update([
                'reconsulta_register' => 'S',
                'state_appointments' => 1
            ]);
        }else{
            DB::table('notes_medic_dates_appoinments')->insert([
                'id_medical_appoinments' => $request->id_appoinments,
                'observation_medical_appoinments' => $request->observation_appointment_dates,
                'dates_register_appoinments' => json_encode($data2)
            ]);
        }
        /*$query = "SELECT * FROM notes_medic_dates_appoinments";
        $rows=\DB::select(\DB::raw($query));
        return json_decode($rows[0]->dates_register_appoinments);*/

    }
    public function load_medicine_table(Request $request){
        //return $request->all();
        $query = "SELECT * FROM medicines                        
                    WHERE id_medicines = :id_medicines";
        $rows=\DB::select(\DB::raw($query),array('id_medicines'=>$request->id_medicine));
        return $rows;
    }
}