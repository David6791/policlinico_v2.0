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
        $query2 = "select * from users where tipo_user = 2 order by id asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('admin.index_medico')->with('row',$rows2);
    }
    public function crear_medico(){
        $query = "select * from tipo_usuarios order by id_tipo asc";
        $rows=\DB::select(\DB::raw($query));
        $query2 = "select * from especialidades where tipo_usuario = 2 order by id_especialidad asc";
        $rows1=\DB::select(\DB::raw($query2));
        return view('admin.crear_medico')->with('rows',$rows)->with('rows1',$rows1);
    }
    public function guardar_datos_medico(Request $request){
        return $request->all();
    }
}