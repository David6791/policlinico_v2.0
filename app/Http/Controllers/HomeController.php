<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query2 = "select * from tipo_usuarios order by id_tipo asc";
        $rows2=\DB::select(\DB::raw($query2));
        return view('home')->with('row',$rows2);
    }
}
