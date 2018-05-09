<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class EmergenciesController extends Controller
{
    public function index_emergency(){
        //return "Holas Como estas";
        return view('admin.index_emergencies');
    }
}