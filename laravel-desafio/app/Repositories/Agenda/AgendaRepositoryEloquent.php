<?php

namespace App\Repositories\Agenda;

use App\RepositoriesInterface;
use App\Agenda;
use App\Repositories\Agenda\AgendaRepositoryInterface;
use Illuminate\Http\Request;

class AgendaRepositoryEloquent implements AgendaRepositoryInterface
{
    private $model;
    
    public function __construct(Agenda $agenda)
    {
        $this->model = $agenda;
    }
    
    public function getAll()
    {
        return $this->model->with('atividades')->get();
    }
    
    public function get(Request $request, $id)
    {
        $inicio = $request->get('data_inicio1');
        $fim = $request->get('data_inicio2');

        if($inicio && $fim){
            return $this->model->with(['atividades' => function ($query) use ($id, $inicio, $fim){
                $query->where('data_inicio', '>=', $inicio)->where('data_prazo', '<=', $fim);
            }])->where('id', '=', $id)->get();
        }else{
            return $this->model->with('atividades')->find($id);    
        }
    }
    
    public function store(array $data)
    {
        return $this->model->create($data);
    }
    
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }
    
    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}