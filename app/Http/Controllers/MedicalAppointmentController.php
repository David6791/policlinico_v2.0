<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MedicalAppointmentController extends Controller
{
    public function index_Appointment(){
        return "hola";
    }
}