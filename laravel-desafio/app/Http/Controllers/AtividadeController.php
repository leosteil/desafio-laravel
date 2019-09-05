<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;
use App\Services\AtividadeService;
use Symfony\Component\HttpFoundation\Response;

class AtividadeController extends Controller
{
    private $service;
    
    public function __construct(AtividadeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {   
        $atividade = $this->service->getAll();
        
        return response()->json([
            'data' => $atividade
        ], 200);
        
    }
 
    public function show($id)
    {
        $atividade = $this->service->get($id);
        
        if(!$atividade){
            return response()->json([
                'data' => []
            ], 404);
        }

        return response()->json([
            'data' => $atividade
        ], 200);
    }

    public function store(Request $request)
    {
        return response()->json($this->service->store($request->all()));
    }

    public function update(Request $request, $id)
    {


        return response()->json(
            $this->service->update($id, $request->all())
        );
    }

    public function delete($id)
    {
        return response()->json(
            $this->service->destroy($id), 
            Response::HTTP_OK
        );

    }
}
