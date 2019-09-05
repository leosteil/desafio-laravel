<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\Repositories\Agenda\AgendaRepositoryInterface;
use App\ValidationAgenda;
use Illuminate\Http\Request;

class AgendaService
{
    private $repo;
    
    public function __construct(AgendaRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    
    public function getAll()
    {
        return $this->repo->getAll();
    }
    
    public function get(Request $request, $id)
    {
        return $this->repo->get($request, $id);
    }
    
    public function store(array $data)
    {
        $validator = Validator::make($data, ValidationAgenda::RULE_AGENDA);
        if ($validator->fails()) {
            $validator->errors();
        }
        
        return $this->repo->store($data);
    }
    
    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationAgenda::RULE_AGENDA);
        if ($validator->fails()) {
            $validator->errors();
        }
        
        return $this->repo->update($id, $data);
    }
    
    public function destroy($id)
    {   
        return $this->repo->destroy($id);
    }
}