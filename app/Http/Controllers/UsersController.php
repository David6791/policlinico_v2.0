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
    public function index_enfermera(){
        $query2 = "select * from users us
                    left join estados_usuarios esu
                    on us.estado_user = esu.id_estados
                    where us.tipo_usuario = 3 order by id asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.index_enfermera')->with('row',$rows2);
    }
    public function index_dentista(){
        $query2 = "select * from users us
                    left join estados_usuarios esu
                    on us.estado_user = esu.id_estados
                    where us.tipo_usuario = 4 order by id asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.index_dentista')->with('row',$rows2);
    }
    public function crear_medico(){
        $query = "select * from tipo_usuarios where id_tipo = 2 order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 2 and estado_especialidad = 'Activo' order by id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.crear_medico')->with('rows',$rows)->with('rows1',$rows1)->with('rows2',$rows2);
    }
    public function crear_enfermera(){
        $query = "select * from tipo_usuarios where id_tipo = 3 order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 3 order by id_especialidad asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.crear_medico')->with('rows',$rows)->with('rows1',$rows1)->with('rows2',$rows2);
    }
    public function crear_dentista(){
        $query = "select * from tipo_usuarios where id_tipo = 4 order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "select * from estados_civil order by id_estado_civil asc";
        $rows1=\DB::select(\DB::raw($query1));
        $query2 = "select * from especialidades where tipo_usuario = 4 order by id_especialidad asc";
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
        $query = "select id from users order by id desc limit 1";
        $rows=\DB::select(\DB::raw($query));
        foreach($request->especialidad as $esp){
            //return $esp;
            DB::table('medico_especialidad')->insert([
                'id_medico' => $rows[0]->id_medico,
                'id_especialidad' => $esp
            ]);
        }  
    }
    public function verMedico(Request $request){
        //return $request->all();
        $query2 = "select tipo_usuario from users where id = :id_medico";
        $rows2=\DB::select(\DB::raw($query2),array('id_medico'=>$request->id_medico));
        $query = "select * from usuarios_especialidades ue
                    inner join users us
                    on us.id = ue.id_usuario
                    inner join especialidades es
                    on es.id_especialidad = ue.id_especialidad
                    where id_usuario = :id_medico";
        $rows=\DB::select(\DB::raw($query),array('id_medico'=>$request->id_medico));
        $query1 = "select es.id_especialidad, es.nombre_especialidad
        from especialidades es
        where es.tipo_usuario = :tip and es.estado_especialidad = 'Activo' and es.id_especialidad  NOT IN
            (
                select id_especialidad 
                from usuarios_especialidades
                where id_usuario = :id_medico and estado = 'activo'
            )";
        $espe=\DB::select(\DB::raw($query1),array('id_medico'=>$request->id_medico,'tip'=>$rows2[0]->tipo_usuario));

        //return $rows;
        return view('admin.ver_detalles_medico')->with('rows',$rows)->with('espe',$espe);
    }
    public function update1(Request $request, $id)
    {
        //return $request->all();

        //$query1 = "select agregar_especialidad(:id, :id_espe); ";
        //return $id;
        //$rows2 = \DB::select(\DB::raw($query1),array('id_persona'=>$request->id_persona));
        //return $request->all();
        /*return array_keys($request->all());
        if(sizeof($request->all())>1)
        {*/
            foreach($request->agregar_especialidad as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query1 = "select public.agregar_especialidad(:id, :id_espe)";
                    $rows2 = \DB::select(\DB::raw($query1),array('id'=>$id,'id_espe'=>$esp));        
                }
            }
            foreach($request->eliminar_especialidad as $esp){
                //return $esp;
                if($esp!=0)
                {
                    $query2 = "select public.eliminar_especialidad(:id, :id_espe)";
                    $rows3 = \DB::select(\DB::raw($query2),array('id'=>$id,'id_espe'=>$esp));
                }
            }
            return $id;
        //}
        ///[$id,true,'url']
        /*$query1 = "select * from persona where id_persona = :id_persona";
        return $id;
        $rows2 = \DB::select(\DB::raw($query1),array('id_persona'=>$request->id_persona));
        return $rows2;*/
    }
    public function baja_user(Request $request){
        //return $request->all();
        $query2 = "select estado_user, tipo_usuario from users where id = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        //return $rows2;
        if(($rows2[0]->estado_user)===1){
            $baja_user = DB::table('users')
            ->where('id', '=', $request->id)
            ->update([
                'estado_user' => 2
            ]);    
        }else{
            $baja_user = DB::table('users')
            ->where('id', '=', $request->id)
            ->update([
                'estado_user' => 1
            ]);
        }
        if(($rows2[0]->tipo_usuario)===2){
            return redirect()->action(
                'UsersController@index_medico'
            );
        }else{
            if(($rows2[0]->tipo_usuario)===3){
                return redirect()->action(
                    'UsersController@index_enfermera'
                );
            }else{
                if(($rows2[0]->tipo_usuario)===4){
                    return redirect()->action(
                        'UsersController@index_dentista'
                    );
                }
            }
        }    
    }
    public function update_users(Request $request){
        //return $request->all();
        $update_user = DB::table('users')
            ->where('id', '=', $request->id_user)
            ->update([
                'name' => $request->name_user,
                'apellidos' => $request->apellidos,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'ci' => $request->ci_patient,
                'email' => $request->email,
                'ocupacion' => $request->profesion,
                'telefono' => $request->telefono,
                'celular' => $request->celular,
                'estado_civil' => $request->estado_civil
            ]);
            return redirect()->action(
                'UsersController@index_medico'
            );
            //return back()->withInput();
    }
}