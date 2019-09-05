<?php

namespace App\Repositories\Atividade;

use App\Atividade;

interface AtividadeRepositoryInterface
{
    public function __construct(Atividade $atividade);
    
    public function getAll();
	
	public function get($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);

	public function retornaAtividadesPeriodo(array $data);
	
	public function verificaFinalDeSemana(array $data);
}