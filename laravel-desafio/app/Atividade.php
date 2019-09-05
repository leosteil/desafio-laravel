<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agenda;

class Atividade extends Model
{
    
    protected $fillable = ['titulo', 'descricao', 'status', 'data_inicio', 'data_prazo', 'data_conclusao', 'user_id', 'agenda_id'];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }
}
