<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AssignmentsController extends Controller
{
    public function index_Assignments(){
        $query = "SELECT mass.id_medical_assignments, us.name, us.apellidos, tus.nombre_tipo, sch.name_schedules, mass.date_creation FROM medical_assignments mass
                            INNER JOIN users us
                        ON mass.id_user = us.id	
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                            INNER JOIN schedules sch
                        ON sch.id_schedule = mass.id_schedul ORDER BY mass.id_medical_assignments";
        $rows=\DB::select(\DB::raw($query));
        $query1 = "SELECT us.id, us.name, us.apellidos, tus.nombre_tipo FROM users us
                            LEFT JOIN medical_assignments mass
                        ON mass.id_user = us.id
                            INNER JOIN tipo_usuarios tus
                        ON tus.id_tipo = us.tipo_usuario
                    WHERE us.estado_user = 1 AND mass.id_user is NULL AND us.tipo_usuario != 1";
        $users=\DB::select(\DB::raw($query1));
        $query2 = "SELECT * FROM schedules WHERE state = 'activo'";
        $schedul = \DB::select(\DB::raw($query2));
        return view('admin.index_assignments')->with('rows',$rows)->with('users',$users)->with('schedul',$schedul);
    }
    public function create_Assignments(Request $request){
        return $request->all();
    }
}