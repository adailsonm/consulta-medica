<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }


    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
