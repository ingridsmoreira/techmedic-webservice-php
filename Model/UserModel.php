<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
require PROJECT_ROOT_PATH .'/vendor/autoload.php';
use ImageKit\ImageKit;
use ImageKit\Url\Url;  


class UserModel extends Database
{
    
    public function getUser($id)
    {
        return $this->select("SELECT id, nome, email, telefone, photoUrl FROM usuarios WHERE id = ?", ["i", $id]);
    }

    public function createUser($nome, $email, $telefone, $senha)
    {
        $id = $this->insert("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)", ["ssss", $nome, $email, $telefone, $senha]);
        return $this->getUser($id);
    }

    public function updateUser($id, $nome, $email, $telefone, $senha, $photoUrl)
    {
        $stringBuilder = "";
        $setStmt = "";
        $params = [];
        if($nome !== ""){
            $stringBuilder .= "s";
            $setStmt .= " nome = ?";
            array_push($params, $nome);
        }
        if($email !== ""){
            $stringBuilder .= "s";
            $setStmt !== "" ? $setStmt .= ", " : "";
            $setStmt .= " email = ? ";
            array_push($params, $email);
        }
        if($telefone !== ""){
            $stringBuilder .= "s";
            $setStmt !== "" ? $setStmt .= ", " : "";
            $setStmt .= " telefone = ?";
            array_push($params, $telefone);
        }
        if($senha !== ""){
            $stringBuilder .= "s";
            $setStmt !== "" ? $setStmt .= ", " : "";
            $setStmt .= " senha = ?";
            array_push($params, $senha);
        }
        if($photoUrl !== ""){
            $stringBuilder .= "s";
            $setStmt !== "" ? $setStmt .= ", " : "";
            $setStmt .= " photoUrl = ?";
            array_push($params, $photoUrl);
        }
        $stringBuilder .= "i";
        array_push($params, $id);
        array_unshift($params, $stringBuilder);
        $this->update("UPDATE usuarios SET ". $setStmt ." WHERE id = ?", $params);
        return $this->getUser($id);
    }

    public function uploadImage($file, $fileName)
    {
        $imageKit = new ImageKit(
            'public_54VzFp3UNxL8NF7RxUbICMeubSI=',
            'private_3fZjg74PfHWStxutgRsNQw1cXR0=',
            'https://ik.imagekit.io/techmedic'
        );
        $image = $imageKit->upload(
            array(
                "file" => $file,
                "fileName" => $fileName,
            )
        );
        return $image->result->url;
    }

    public function loginUser($email, $senha)
    {
        $user = $this->select("SELECT id, nome, email, telefone, photoUrl FROM usuarios WHERE email = ? AND senha = ?", ["ss", $email, $senha]);
        if (count($user) == 0) {
            return false;
        }
        return $user;
    }
}
?>