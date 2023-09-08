<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function HomeColaborador(){
        return view('HomeColaborador');
    }

    public function Atendimento(){
        return view('Atendimento');
    }

    public function PainelAtendimento(){
        return view('PainelAtendimento');
    }
}
