<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class UsersController extends Controller
{
    public function index_medico(){
        $query2 = "select * from users us
                    left join estados_usuarios esu
                    on us.estado_user = esu.id_estados
                    where us.tipo_usuario = 2 order by id asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.index_medico')->with('row',$rows2);
    }
    public function crear_medico(){
        $query = "select * from tipo_usuarios order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 2 order by id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.crear_medico')->with('rows',$rows)->with('rows1',$rows1)->with('rows2',$rows2);
    }
    public function guardar_datos_medico(Request $request){
        //return $request->all();
        DB::table('users')->insert([
            'ci' => $request->n_documento,
            'tipo_usuario' => $request->tipo_usuario,
            'name' => $request->nombres,
            'apellidos' => $request->apellidos,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'estado_civil' => $request->estado_civil,
            'ocupacion' => $request->ocupacion,
            'nacionalidad' => $request->nacionalidad,
            'localidad' => $request->localidad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'matricula_medico' => $request->matricula         
        ]);
        
    }
}