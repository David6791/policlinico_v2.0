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
        $query5 = "SELECT * FROM view_examens_medics(:id)";
        $rows5=\DB::select(\DB::raw($query5),array('id'=>$request->id_appointments));
        //return $rows5;
        $data2 = array();
        for($i = 0 ; $i < count($rows5) ; $i++){
            $asd = json_encode($rows5[$i]->j);
            $asdd = json_decode($asd);

            

            //return $asdd;
            //return $asdd;
            /*$data2[] = [
                'j' => $asd
            ];*/
            //json_decode($data2[1],true)
            // aqui ya tienes que poner un json_decode para que se guarde directo en tu array
            $data2[]=json_decode($asdd,true);
        }
        //$asd = json_encode($rows5[1]->j);
        //$aps = json_encode($data2);
        /*$aux=json_encode($data2[1]);
        $aux=json_decode($data2[1]);
        */
        //return $data2;
        //return var_dump(json_decode($data2[1],true)["name_medical_exam"]);
        //return ['id_medical_exam'];



        return view('attentions.view_dates_patient')->with('dates_patient',$rows)->with('list_app',$row)->with('dat',$rows2)->with('dates_cita_end',$rows3)->with('list_mecines_disponibles',$rows4)->with('ex_medics',$data2);
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
        //return json_encode($rows1);
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
    public function save_dates_treatment(Request $request){
        //return $request->all();
        DB::table('treatment_patients')->insert([
            'date_start_treatment' => $request->treatment_start,
            'date_end_treatment' => $request->treatment_end,
            'id_medical_appointments' => $request->id_appoinments,
            'description_treatment' => $request->indications_treatment,
            'id_users_register' => Auth::user()->id
        ]);
        $query = "SELECT id_treatment FROM treatment_patients                        
                    ORDER BY id_treatment ASC LIMIT 1";
        $rows2=\DB::select(\DB::raw($query));        
        $tam = count($request->id_medicine);
        for($i  = 0; $i<$tam ; $i++){
            DB::table('treatment_details')->insert([
                'id_treatment' => $rows2[0]->id_treatment,
                'id_medicine' => $request->id_medicine[$i],
                'quantity_medicine' => $request->cantidad[$i]
            ]);
            $query2 = "SELECT update_stock(:id_medicine, :quantity)";
            $rows=\DB::select(\DB::raw($query2),array('id_medicine'=>$request->id_medicine[$i],'quantity'=>$request->cantidad[$i]));    
        }
    }
    public function register_medical_exam(Request $request){
        //return $request->all();
        $query = "SELECT id_patient FROM medical_appointments WHERE id_medical_appointments = :id_appoinments";
        $rows2=\DB::select(\DB::raw($query),array('id_appoinments'=>$request->id_appoinments));  
        DB::table('medical_exam_patients')->insert([
            'id_patient' => $rows2[0]->id_patient,
            'id_appoinments' => $request->id_appoinments,
            'id_medical_exam' => $request->id_medical_exam,
            'reason_medical_examn' => $request->reason_medical_exam,
            'observation_medical_exam' => $request->observations_medical_exam,
            'id_user_creator' => Auth::user()->id
        ]);
        $query1 = "SELECT mep.id_medical_exam_patient, mep.id_appoinments, mep.reason_medical_examn, mep.observation_medical_exam, mep.date_creation, mass.id_user, us.name, us.apellidos,
                        p.nombres, p.ap_paterno, p.ap_materno, p.fecha_nacimento, p.ci, mee.name_medical_exam
                        FROM medical_exam_patients mep
                        INNER JOIN medical_appointments mapp 
                            ON mep.id_appoinments = mapp.id_medical_appointments
                        INNER JOIN medical_assignments mass
                            ON mass.id_medical_assignments = mapp.id_medical_assignments
                        INNER JOIN users us
                            ON us.id = mass.id_user
                        INNER JOIN pacientes p
                            ON p.id_paciente = mep.id_patient
                        INNER JOIN medical_exam mee
                            ON mee.id_medical_exam = mep.id_medical_exam
                    ORDER BY id_medical_exam_patient ASC LIMIT 1";
        $rows1=\DB::select(\DB::raw($query1));
        //return $rows1;
        return view('admin.load_pages_attentions.medical_exam')->with('exam_medic',$rows1);
    }
}