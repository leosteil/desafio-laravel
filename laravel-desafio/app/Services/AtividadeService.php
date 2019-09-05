<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\ValidationAtividade;
use App\Repositories\Atividade\AtividadeRepositoryInterface;
use Illuminate\Http\Request;

class AtividadeService
{
    private $repo;
    
    public function __construct(AtividadeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    
    private function isWeekend(array $data) {
        if( date('N', strtotime($data['data_inicio'])) >= 6 || date('N', strtotime($data['data_prazo'])) >= 6){
            return true;
        }else{
            return false;
        }
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }
    
    public function get($id)
    {
        return $this->repo->get($id);
    }
    
    
    public function store(array $data)
    {

        $validator = Validator::make($data, ValidationAtividade::RULE_ATIVIDADE);
        if ($validator->fails()) {
            return $validator->messages();
        }

        $atividadesPeriodo = $this->repo->retornaAtividadesPeriodo($data);
        
        if($this->isWeekend($data)){
            return "['message' => 'Data Inicio ou Data Prazo é um final de semana']";   
        }else if (!$atividadesPeriodo->first()){ 
            return $this->repo->store($data);   
        }else{
            return "['message' => 'Estas datas sobrepoem outra atividade desta pessoa para esta agenda']";   
        }
        
        return $this->repo->store($data);
    }
    
    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationAtividade::RULE_ATIVIDADE);
        if ($validator->fails()) {
            return $validator->messages();
        }
        
        return $this->repo->update($id, $data);
    }
    
    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}