<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class MedicalExamController extends Controller
{
  
    public function view_medical_exam(){
        $query = "select * from medical_exam";
        $rows=\DB::select(\DB::raw($query));
        return view('medical_exam.index_medical_exam')->with('list',$rows);
    }
    public function create_medical_exam(Request $request){
        //return $request->all();
        /*$v  = $this->validate($request, [
            'medical_exam_description'  => 'required|min:5',
            'name_medical_exam'      => 'required'
        ]);
    
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }*/
        
        DB::table('medical_exam')->insert([
            'name_medical_exam' => $request->name_medical_exam,
            'description_medical_exam' => $request->medical_exam_description,
            'id_user_register' => Auth::user()->id
        ]);
        return redirect()->action(
            'MedicalExamController@view_medical_exam'
        );
    }
}