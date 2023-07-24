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
        $this->insert("INSERT INTO calendario (medicoId, userId, data) VALUES (?, ?, ?)", ["iis", $medicoId, $userId, $data]);
        return $this->getUserCalendario($userId);
    }

    public function deleteCalendario($id)
    {
        $calend = $this->getCalendario($id);
        $this->delete("DELETE FROM calendario WHERE id = ?", ["i", $id]);
        return $this->getUserCalendario($calend[0]["userId"]);
    }
} 
?>