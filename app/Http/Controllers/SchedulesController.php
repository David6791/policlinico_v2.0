<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class SchedulesController extends Controller
{
    public function index_Schedules(){
        $query = "select * from schedules order by id_schedule";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.index_schedules')->with('row',$rows);  
    }
    public function create_Schedules(Request $request){
        //return $request->all();
        DB::table('schedules')->insert([
            'name_schedules' => $request->name_schedules,
            'schedules_start' => $request->hour_start,
            'schedules_end' => $request->hour_end,
            'description' => $request->hour_description
        ]);
        return redirect()->action(
            'SchedulesController@index_Schedules'
        );
    }
    public function darBajaSchedule(Request $request){
        //return $request->all();
        $query2 = "select state from schedules where id_schedule = :id";
        $rows2=\DB::select(\DB::raw($query2),array('id'=>$request->id));
        //return $rows;
        if(($rows2[0]->state)==='activo'){
            $baja_schedules = DB::table('schedules')
            ->where('id_schedule', '=', $request->id)
            ->update([
                'state' => 'inactivo'
            ]);    
        }else{
            $baja_schedules = DB::table('schedules')
            ->where('id_schedule', '=', $request->id)
            ->update([
                'state' => 'activo'
            ]);
        }
        return redirect()->action(
            'SchedulesController@index_Schedules'
        );
    }
}