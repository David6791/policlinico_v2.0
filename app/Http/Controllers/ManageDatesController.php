<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class ManageDatesController extends Controller
{
    public function index_pathologie(){
        $query = "select * from patologias order by id_patologia";
        $rows=\DB::select(\DB::raw($query));
        return view('manage_dates.view_phatologies')->with('list',$rows);
    }
    public function create_phatologies(Request $request){
        //return $request->all();
        DB::table('patologias')->insert([
            'nombre_patologia' => $request->name_phatologie,
            'descripcion_patologia' => $request->phatologie_description,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'ManageDatesController@index_pathologie'
        );
    }   

    public function index_medical_date(){
        $query = "select * from datos_medicos order by id_dato_medico";
        $rows=\DB::select(\DB::raw($query));
        return view('manage_dates.view_medical_dates')->with('list',$rows);
    }
    public function create_medical_date(Request $request){
        DB::table('datos_medicos')->insert([
            'nombre_dato_medico' => $request->name_medical_date,
            'pregunta_dato_medico' => $request->mesage_answer_yes,
            'pregunta_mostrar' => $request->question_view,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'ManageDatesController@index_medical_date'
        );
    }

    public function index_data_medical_appointment(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('manage_dates.data_medical_appointment')->with('list',$rows);
    }
}