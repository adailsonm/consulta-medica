<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
