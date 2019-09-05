<?php

namespace App\Repositories\Atividade;

use App\RepositoriesInterface;
use App\Atividade;
use App\Repositories\Atividade\AtividadeRepositoryInterface;

class AtividadeRepositoryEloquent implements AtividadeRepositoryInterface
{
    private $model;
    
    public function __construct(Atividade $atividade)
    {
        $this->model = $atividade;
    }
    
    public function getAll()
    {
        return $this->model->get();
    }
    
    public function get($id)
    {
        return Atividade::find($id);
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

    public function retornaAtividadesPeriodo(array $data)
    {
        return $this->model->where([
            ['data_inicio', '>=', $data['data_inicio']],
            ['data_prazo', '<=', $data['data_prazo']],
            ['user_id', '=', $data['user_id']],
            ['agenda_id', '=', $data['agenda_id']]])->get();
    }

    public function verificaFinalDeSemana(array $data){
        
    }
}