<?php

namespace Model;

use Model\VO\UsuarioVO;

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
        if (empty($vo->getFoto())) {
            $query = "INSERT INTO usuarios VALUES (default, :login, :senha, :nivel)";
            $binds = [
                "login" => $vo->getLogin(),
                "senha" => $vo->getSenha(),
                "nivel" => $vo->getNivel(),
            ];
        } else {
            $query = "INSERT INTO usuarios VALUES (default, :login, :senha, :nivel, :foto)";
            $binds = [
                "login" => $vo->getLogin(),
                "senha" => $vo->getSenha(),
                "nivel" => $vo->getNivel(),
                "foto" => $vo->getFoto()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        if (empty($vo->getFoto())) {
            $query = "UPDATE usuarios SET login=:login, senha=:senha, nivel=:nivel WHERE id = :id";
            $binds = [
                "login" => $vo->getLogin(),
                "senha" => $vo->getSenha(),
                "nivel" => $vo->getNivel(),
            ];
        } else {
            $query = "UPDATE usuarios SET login=:login, senha=:senha, nivel=:nivel, foto=:foto WHERE id = :id";
            $binds = [
                "login" => $vo->getLogin(),
                "senha" => $vo->getSenha(),
                "nivel" => $vo->getNivel(),
                "foto" => $vo->getFoto()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}