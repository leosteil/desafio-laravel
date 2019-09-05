<?php

namespace App\Repositories\Agenda;

use App\Agenda;
use Illuminate\Http\Request;

interface AgendaRepositoryInterface
{
    public function __construct(Agenda $agendas);
    
    public function getAll();
	
	public function get(Request $request, $id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}