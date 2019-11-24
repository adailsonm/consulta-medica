<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Medico;
use App\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

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
    public function principal()
    {
        $num_pacientes = Paciente::count();
        $num_medicos = Medico::count();
        $verifyPaciente = Paciente::where('user_id', Auth::user()->id)->first();
        $consultas_hoje = DB::table('agendamentos')
                                ->whereDate('data', date('Y-m-d'))
                                ->count();
                                

        return view('home')->with('num_pacientes', $num_pacientes)
                            ->with('num_medicos', $num_medicos)
                            ->with('verifyPaciente', $verifyPaciente)
                            ->with('consultas_hoje', $consultas_hoje);
    }
}
