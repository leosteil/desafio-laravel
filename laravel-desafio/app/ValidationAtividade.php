<?php

namespace App;

use Illuminate\Validation\Rule;

class ValidationAtividade
{
    const RULE_ATIVIDADE = [
        'titulo' => 'required',
        'descricao' => 'required',
        'status' => 'in:Aguardando Inicio,Iniciada,Pausada,Finalizada',
        'data_inicio' => 'required',
        'data_prazo' => 'required',
        'user_id'=>'required|exists:users,id',
        'agenda_id'=>'required|exists:agendas,id'
    ];
}