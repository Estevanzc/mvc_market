<?php

namespace Model;

use Model\VO\UsuarioVO;
use Controller\UsuarioController;

final class UsuarioModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM usuarios";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new UsuarioVO($row["id"], $row["login"], $row["senha"], $row["nivel"], $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM usuarios WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new UsuarioVO($data[0]["id"], $data[0]["login"], $data[0]["senha"], $data[0]["nivel"], $data[0]["foto"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO usuarios VALUES (default, :login, :senha, :nivel, ".(empty($vo->getFoto()) ? "null" : ":foto").")";
        $binds = [
            "login" => $vo->getLogin(),
            "senha" => md5($vo->getSenha()),
            "nivel" => $vo->getNivel(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE usuarios SET login=:login,".(empty($vo->getSenha()) ? "" : " senha=:senha,")." nivel=:nivel".(empty($vo->getFoto()) ? "" : ", foto=:foto")." WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "login" => $vo->getLogin(),
            "nivel" => $vo->getNivel(),
        ];
        if (!empty($vo->getFoto())) {
            $binds["foto"] = $vo->getFoto();
        }
        if (!empty($vo->getSenha())) {
            $binds["senha"] = md5($vo->getSenha());
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new UsuarioController())->deleteFile($vo->getFoto());

        return $db->execute($query, $binds);
    }
    public function doLogin($vo) {
        $db = new Connection();
        $query = "SELECT * FROM usuarios WHERE login=:login and senha=:senha";
        $binds = [
            "login" => $vo->getLogin(),
            "senha" => md5($vo->getSenha())
        ];
        $data = $db->select($query, $binds);
        if (count($data) == 0) {
            return null;
        }
        $_SESSION["usuario"] = new UsuarioVO($data[0]["id"],$data[0]["login"], $data[0]["senha"], $data[0]["nivel"], $data[0]["foto"]);
        return $_SESSION["usuario"];
    }
}