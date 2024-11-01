<?php

namespace Model;

use Model\VO\ProdutoVO;
use Controller\ProdutoController;

final class ProdutoModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT p.id, p.nome, p.descricao, p.preco, c.nome as id_categorias, p.foto FROM produtos p join pro_categorias c on c.id = p.id_categorias";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ProdutoVO($row["id"], $row["nome"], $row["descricao"], $row["preco"], $row["id_categorias"],  $row["foto"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM produtos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new ProdutoVO($data[0]["id"], $data[0]["nome"], $data[0]["descricao"], $data[0]["preco"], $data[0]["id_categorias"],  $data[0]["foto"]);
    }

    public function insert($vo) {
        $db = new Connection();
        if (empty($vo->getFoto())) {
            $query = "INSERT INTO produtos VALUES (default, :nome, :descricao, :preco, :id_categorias)";
            $binds = [
                "nome" => $vo->getNome(),
                "descricao" => $vo->getDescricao(),
                "preco" => $vo->getPreco(),
                "id_categorias" => $vo->getId_categorias()
            ];
        } else {
            $query = "INSERT INTO produtos VALUES (default, :nome, :descricao, :preco, :id_categorias, :foto)";
            $binds = [
                "nome" => $vo->getNome(),
                "descricao" => $vo->getDescricao(),
                "preco" => $vo->getPreco(),
                "id_categorias" => $vo->getId_categorias(),
                "foto" => $vo->getFoto()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        if (empty($vo->getFoto())) {
            $query = "UPDATE produtos SET nome=:nome, descricao=:descricao, preco=:preco, id_categorias=:id_categorias WHERE id = :id";
            $binds = [
                "nome" => $vo->getNome(),
                "descricao" => $vo->getDescricao(),
                "preco" => $vo->getPreco(),
                "id_categorias" => $vo->getId_categorias()
            ];
        } else {
            $query = "UPDATE produtos SET nome=:nome, descricao=:descricao, preco=:preco, id_categorias=:id_categorias, foto=:foto WHERE id = :id";
            $binds = [
                "nome" => $vo->getNome(),
                "descricao" => $vo->getDescricao(),
                "preco" => $vo->getPreco(),
                "id_categorias" => $vo->getId_categorias(),
                "foto" => $vo->getFoto()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM produtos WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        (new ProdutoController())->deleteFile(($this->selectOne($vo->getId()))->getFoto());

        return $db->execute($query, $binds);
    }



}