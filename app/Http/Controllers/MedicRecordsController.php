<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicRecordsController extends Controller
{
    public function view_medical_record(){
        $query = "SELECT * FROM pacientes ORDER BY id_paciente ASC";
        $rows=\DB::select(\DB::raw($query));
        return view('record_medic.index_patients')->with('list',$rows);
    }
    public function load_dates_record_medic_full(Request $request){
        //return $request->all();
        $query = "SELECT * FROM view_record_medic_full_patients(:id_patient)";
        $rows=\DB::select(\DB::raw($query),array('id_patient'=>$request->id_patient));
        $data3 = array();
        for($i = 0 ; $i < count($rows) ; $i++){
            $asd = json_encode($rows[$i]->j);
            $asdd = json_decode($asd);
            $data3[]=json_decode($asdd,true);
        }
        //return $data3;
        return view('record_medic.load_pages_record.view_record_patients_full')->with('list_record',$data3);
    }
}