<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class CalendarioModel extends Database{
    public function getCalendario($id){
        return $this->select("SELECT * FROM calendario WHERE id = ?", ["i", $id]);
    }

    public function getUserCalendario($userId){
        return $this->select("SELECT * FROM calendario WHERE userId = ?", ["i", $userId]);
    }

    public function getMedicoCalendario($medicoId){
        return $this->select("SELECT * FROM calendario WHERE medicoId = ? AND data >= CURDATE()", ["i", $medicoId]);
    }

    public function criarCalendario($medicoId, $userId, $data){
        return $this->insert("INSERT INTO calendario (medicoId, userId, data) VALUES (?, ?, ?)", ["iis", $medicoId, $userId, $data]);
    }

    public function deleteCalendario($id)
    {
        return $this->delete("DELETE FROM calendario WHERE id = ?", ["i", $id]);
    }
} 
?>