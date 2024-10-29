<?php

namespace Controller;

use Model\ProdutoModel;
use Model\VO\ProdutoVO;

final class ProdutoController extends Controller {

    public function list() {
        $model = new ProdutoModel();
        $data = $model->selectAll(new ProdutoVO());

        $this->loadView("listaProdutos", [
            "produtos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new ProdutoModel();
            $vo = new ProdutoVO();
            $produto = $model->selectOne($vo);
        } else {
            $produto = new ProdutoVO();
        }

        $this->loadView("formProduto", [
            "produto" => $produto
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new ProdutoModel();
        $nome_arquivo = $this->uploadFile($_FILES["foto"], empty($id) ? "" : $model->selectOne(new ProdutoVO($id))->getFoto());
        $vo = new ProdutoVO($id, $_POST["nome"], $_POST["descricao"], $_POST["preco"], $_POST["id_categorias"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("produto.php");
    }

    public function remove() {
        $vo = new ProdutoVO($_GET["id"]);
        $model = new ProdutoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("produtos.php");
    }

}