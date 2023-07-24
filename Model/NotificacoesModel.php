<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class NotificacoesModel extends Database
{
    public function getUserNotificacoes($userId)
    {
        return $this->select("SELECT * FROM notificacoes WHERE userId = ?", ["i", $userId]);
    }

    public function vizualizarNotificacoes($userId)
    {
        return $this->update("UPDATE notificacoes SET vista = 1 WHERE userId = ?", ["i", $userId]);
    }

    public function criarNotificacao($userId, $data, $icone, $msg)
    {
        return $this->insert("INSERT INTO notificacoes (userId, data, icone, mensagem) VALUES (?, ?, ? , ?)", ["isss", $userId, $data, $icone, $msg]);
    }

    public function deleteUserNotificacoes($userId)
    {
        return $this->delete("DELETE FROM notificacoes WHERE userId = ?", ["i", $userId]);
    }
}