<?php 
namespace App\Models;
use CodeIgniter\Model;

class Ticket extends Model{
    protected $table= 'tickets';
    protected $primarykey ='id';
    protected $useAutoIncrement = true;
    protected $returnType= 'array';
    protected $allowedFields = ['description', 'estado'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function listar(){
        $tickets = $this->db->query("SELECT * FROM tickets");
			return $tickets->getResult();
    }
    public function insertar($data){
        $tickets= $this->db->table('tickets');
        $tickets->insert($data);
        return $this->db->insertID();

    }
    public function obtenerTicket($id){
        $ticket=$this->db->table('tickets');
        $ticket->where($id);
        return $ticket->get()->getResultArray();
    }
    public function actualizar($datos, $id){
        $tickets = $this->db->table('tickets');
        $tickets->set($datos);

        $tickets->where('id',$id);
        return $tickets->update();
    }
    public function eliminar($data){
        $ticket=$this->db->table('tickets');
        $ticket->where('id',$data);

        return $ticket->delete();
    }

}
