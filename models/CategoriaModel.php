<?php

namespace Model;

use Model\VO\CategoriaVO;

final class CategoriaModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM pro_categorias";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CategoriaVO($row["id"], $row["nome"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM pro_categorias WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CategoriaVO($data[0]["id"], $data[0]["nome"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO pro_categorias VALUES (default, :nome)";
        $binds = [
            "nome" => $vo->getNome()
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE pro_categorias SET nome=:nome WHERE id = :id";
        $binds = [
            "nome" => $vo->getNome()
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM pro_categorias WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }



}