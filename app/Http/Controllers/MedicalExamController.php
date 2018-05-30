<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicalExamController extends Controller
{
    public function view_medical_exam(){
        $query = "select * from medical_exam";
        $rows=\DB::select(\DB::raw($query));
        return view('medical_exam.index_medical_exam')->with('list',$rows);
    }
}