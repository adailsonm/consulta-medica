@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Faça o agendamento da consulta médica
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    @if($method == 'put')
                    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="post">
                        {{ csrf_field() }}                        
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('agendamentos.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input id="descricao" type="text" name="descricao" class="form-control" value="{{ $agendamento->descricao }}"/>
                        </div>

                        <div class="form-group">
                            <label for="data">Data/Hora</label>
                            <input id="data" type="datetime-local" name="data" class="form-control" value="{{ strftime('%Y-%m-%dT%H:%M', strtotime($agendamento->data)) }}"/>
                        </div>                        

                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" class="form-control" id="paciente_id" value="{{ $agendamento->paciente_id }}">
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ $paciente->id == $agendamento->paciente_id ? 'selected="selected"' : ''}}> {{ $paciente->nome }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="medico_id">Médico</label>
                            <select name="medico_id" class="form-control" id="medico_id" value="{{ $agendamento->medico_id }}">
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}" {{ $medico->id == $agendamento->medico_id ? 'selected="selected"' : ''}}> {{ $medico->nome }} </option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group">
                            <label for="especialidade_id">Especialidade</label>
                            <select name="especialidade_id" class="form-control" id="especialidade_id" value="{{ $agendamento->especialidade_id }}">
                                @foreach($especialidades as $especialidade)
                                    <option value="{{ $especialidade->id }}" {{ $especialidade->id == $agendamento->especialidade_id ? 'selected="selected"' : ''}}> {{ $especialidade->nome }} </option>
                                @endforeach
                            </select>
                        </div> 
               

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/agendamentos') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



