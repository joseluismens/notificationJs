<?php

namespace App\Controllers;
use App\Models\ticket;

class TicketController extends BaseController
{

	public function __construct(){


	}
	public function index()
	{	
		$ticket = new Ticket();
		$datos= $ticket->listar();
		
	
		
		return view('listado',["datos"=>$datos]);
	}	
	public function create(){
		$data=[
			"description"=> $_POST['description'],
			"estado"=> $_POST['estado'],
		];
		$ticket= new Ticket();
		$response= $ticket->insertar($data);
		return redirect()->to(base_url().'/');


	}
	public function getTicket($id) {
		$data = ["id" => $id];
		$ticket = new Ticket();
		$response = $ticket->obtenerTicket($data);

		$datos = ["datos" => $response];

		return view('actualizar', $datos);
	}
	public function update(){
		$id = $_POST['id'];
		$datos=[
			"description" => $_POST['description'],
			"estado" => $_POST['estado'],
		];
	
		$ticket = new Ticket();
		$response = $ticket->actualizar($datos,$id);
		
		
		return redirect()->to(base_url().'/');


	}
	public function delete($id){
		$ticket = new Ticket();
		$response=$ticket->eliminar($id);

		return redirect()->to(base_url().'/');
	}

}
