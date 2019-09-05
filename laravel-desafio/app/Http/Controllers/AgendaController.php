<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Services\AgendaService;

class AgendaController extends Controller
{

    private $service;
    
    public function __construct(AgendaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }
 
    public function show(Request $request, $id)
    {
        return response()->json($this->service->get($request, $id));
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

    public function delete(Request $request, $id)
    {
        return response()->json(
            $this->service->destroy($id)
        );
    }
}
