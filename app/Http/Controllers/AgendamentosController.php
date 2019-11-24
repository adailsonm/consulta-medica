<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Especialidade;
use App\Paciente;
use App\Medico;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::all();
        $verifyPaciente = Paciente::where('user_id', Auth::user()->id)->first();

        return view('agendamentos.lista')
                ->with('agendamentos', $agendamentos)
                ->with('verifyPaciente', $verifyPaciente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $method = 'post';
        $agendamento = new Agendamento();
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $especialidades = Especialidade::all();
        return view('agendamentos.form')->with('pacientes', $pacientes)
                                        ->with('medicos', $medicos)
                                        ->with('method', $method)
                                        ->with('especialidades', $especialidades)
                                        ->with('agendamento', $agendamento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'descricao' => 'required|min:5',
            'data' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'especialidade_id' => 'required',            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $agendamento = new Agendamento();
            $agendamento->descricao = $request->input('descricao');
            $agendamento->data = $request->input('data');
            $agendamento->paciente_id = $request->input('paciente_id');
            $agendamento->medico_id = $request->input('medico_id');
            $agendamento->especialidade_id = $request->input('especialidade_id');
            $agendamento->save();

            return redirect()->route('agendamentos.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = 'put';
        $agendamento = Agendamento::find($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();   
        $especialidades = Especialidade::all();     
        return view('agendamentos.form')->with('method', $method)
                                        ->with('agendamento', $agendamento)
                                        ->with('pacientes', $pacientes)
                                        ->with('especialidades', $especialidades)
                                        ->with('medicos', $medicos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'descricao' => 'required|min:5',
            'data' => 'required',
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'especialidade_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $agendamento = Agendamento::find($id);
            $agendamento->descricao = $request->input('descricao');
            $agendamento->data = $request->input('data');
            $agendamento->paciente_id = $request->input('paciente_id');
            $agendamento->medico_id = $request->input('medico_id');
            $agendamento->especialidade_id = $request->input('especialidade_id');

            $agendamento->save();

            return redirect()->route('agendamentos.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agendamento = Agendamento::find($id);
        
        $agendamento->delete();

        return redirect()->route('agendamentos.index');
    }
}
