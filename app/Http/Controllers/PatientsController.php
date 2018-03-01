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
        return view('admin.form_patients');
        
    }
}