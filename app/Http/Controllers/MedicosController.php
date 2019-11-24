<?php

namespace App\Http\Controllers;

use App\Medico;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Especialidade;

use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return view('medicos.lista')->with('medicos', $medicos);
    }

    // API
    public function listaMedicos(){
        $medicos = Medico::all();
        return response()->json($medicos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $method = 'post';
        $medico = new Medico();
        $user = new User();

        $especialides = Especialidade::all();
        return view('medicos.form')->with('method', $method)
                                    ->with('especialidades', $especialides)
                                    ->with('user', $user)
                                     ->with('medico', $medico);
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
            'nome' => 'required|min:3',
            'crm' => 'required',
            'telefone' => 'required',
            'especialidade_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $medico = new Medico();
            $user = new User();

            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->telefone = $request->input('telefone'); 
            $user->name = $request->input('nome');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('senha'));
            $user->save();
            $medico->user_id = $user->id;
            $medico->especialidade_id = $request->input('especialidade_id');
            $medico->save();

            return redirect()->route('medicos.index');
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
        $medico = Medico::with(['especialidade', 'user'])->find($id);
        $especialidades = Especialidade::all();
        return view('medicos.form')->with('method', $method)
        ->with('medico', $medico)
        ->with('especialidades', $especialidades);
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
            'nome' => 'required|min:3',
            'crm' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'especialidade_id' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $medico = Medico::find($id);
            $medico->nome = $request->input('nome');
            $medico->crm = $request->input('crm');
            $medico->user->email = $request->input('email');
            $medico->telefone = $request->input('telefone');
            $medico->especialidade_id = $request->input('especialidade_id');
            $medico->save();

            return redirect()->route('medicos.index');
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
        $medico = Medico::find($id);
        
        $medico->delete();
        
        return redirect()->route('medicos.index');
    }
}
