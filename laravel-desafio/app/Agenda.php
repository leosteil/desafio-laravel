<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Atividade;

class Agenda extends Model
{
    protected $fillable = ['nome'];

    public function atividades()
    {
        return $this->hasMany('App\Atividade');
    }

}
