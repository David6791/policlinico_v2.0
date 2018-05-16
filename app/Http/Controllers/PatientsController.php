<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PatientsController extends Controller
{
    public function formulario_pacientes_nuevo(){
        //return 'asdasdsad';
        $query = "select * from patologias where estado_patologia = 'activo'";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from datos_medicos where estado_dato_medico = 'activo'";
        $rows1=\DB::select(\DB::raw($query1));
        return view('admin.form_patients')->with('row',$rows)->with('rows',$rows1);        
    }
    public function store_patient(Request $request){
        //$json = '{ "key1" : "watevr1", "key2" : "watevr2", "key3" : "watevr3" }';
        print_r(array_keys($request));
        /*DB::table('pacientes')->insert([
            'ci' => $request->ci,
            'ap_paterno' => $request->apellido_pat,
            'ap_materno' => $request->apellido_mat,
            'nombres' => $request->nombres,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'pais_nacimiento' => $request->pais,
            'ciudad_nacimiento' => $request->ciudad,
            'provincia' => $request->provincia,
            'localidad_nacimiento' => $request->localidad
        ]);
        $query = "select id from pacientes order by id desc limit 1";
        $rows=\DB::select(\DB::raw($query));*/
        /*if($request->patologias != null){
            //return 'lleno';
            foreach($request->patologias as $pat){
                DB::table('pacientes_patologias')->insert([
                    'id_paciente' => $rows[0]->id_paciente,
                    'id_patologia' => $pat
                ]);
            }            
        }
        if($request->patologias != null){
            //return 'lleno';
            foreach($request->patologias as $pat){
                DB::table('pacientes_patologias')->insert([
                    'id_paciente' => $rows[0]->id_paciente,
                    'id_patologia' => $pat
                ]);
            }            
        }*/
        $query = "select id_dato_medico from datos_medicos";
        $rows=\DB::select(\DB::raw($query));
        foreach($rows as $limi){
            //echo($limi->id_dato_medico);
        }
    }
}