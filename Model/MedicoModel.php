<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class MedicoModel extends Database
{
    public function getMedico($id, $especialidade)
    {
        if($id !== ''){
            return $this->select("SELECT * FROM medico WHERE id = ?", ["i", $id]);
        }else if($especialidade !== ''){
            return $this->select("SELECT * FROM medico WHERE especialidade = ?", ["s", $especialidade]);
        }        
    }

    public function getAllMedicos()
    {
        return $this->select("SELECT * FROM medico");
    }
} 
?>