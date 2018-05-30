<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class RoomsController extends Controller
{
    public function view_room(){
        $query = "SELECT * FROM available_beds ORDER BY id_available_beds";
        $rows=\DB::select(\DB::raw($query));
        return view('rooms.index_rooms')->with('row',$rows);       
    }
    public function create_rooms(Request $request){
        //return $request->all();
        DB::table('available_beds')->insert([
            'name_room' => $request->name_room,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'RoomsController@view_room'
        );
    }
    public function view_room_available(){
        $query  = "SELECT * FROM available_beds where id_available_beds NOT IN(
                   SELECT id_room FROM patients_rooms)";
        $row = \DB::select(\DB::raw($query));
        return view('rooms.rooms_free')->with('rooms_free',$row);
    }
    public function edit_hospitalizations(){
        $query  = "SELECT * FROM patients_rooms pr
                        INNER JOIN pacientes p
                            ON p.id_paciente = pr.id_patient
                        INNER JOIN available_beds ab
                            ON ab.id_available_beds = pr.id_room
                    WHERE state_internacion = 'activo'";
        $row = \DB::select(\DB::raw($query));
        return view('rooms.rooms_edit_hospitalizations')->with('rooms_edit',$row);
    }
}