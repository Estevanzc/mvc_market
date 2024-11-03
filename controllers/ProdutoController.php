<?php

namespace Controller;

use Model\ProdutoModel;
use Model\CategoriaModel;
use Model\VO\ProdutoVO;
use Model\VO\CategoriaVO;

final class ProdutoController extends Controller {

    private $index_access;

    public function __construct($obriga_login = false, $restricted = false, $index_access = false) {
        parent::__construct($obriga_login, $restricted);
        $this->index_access = $index_access;
    }

    public function list() {
        $model = new ProdutoModel();
        $data = $model->selectAll(new ProdutoVO());

        $this->loadView(($this->index_access ? "publicProdutos" : "listaProdutos"), [
            "produtos" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;
        if(!empty($id)) {
            $model = new ProdutoModel();
            $vo = new ProdutoVO($id);
            $produto = $model->selectOne($vo);
        } else {
            $produto = new ProdutoVO();
        }
        $categoria = (new CategoriaModel())->selectAll(new CategoriaVO());

        $this->loadView("formProduto", [
            "produto" => $produto,
            "categorias" => $categoria
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
        $this->redirect("produtos.php");
    }

    public function remove() {
        echo($_GET["id"]);
        $vo = new ProdutoVO($_GET["id"]);
        $model = new ProdutoModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("produtos.php");
    }

}