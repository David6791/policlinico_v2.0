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
        $query = "select * from schedules where state = 'activo'";
        $rows=\DB::select(\DB::raw($query));
        return view('admin.index_schedules')->with('row',$rows);  
    }
    public function create_Schedules(Request $request){
        return $request->all();
    }
}