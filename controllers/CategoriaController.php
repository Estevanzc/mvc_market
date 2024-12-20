<?php

namespace Controller;

use Model\CategoriaModel;
use Model\ProdutoModel;
use Model\VO\CategoriaVO;
use Model\VO\ProdutoVO;

final class CategoriaController extends Controller {

    public function list() {
        $model = new CategoriaModel();
        $data = $model->selectAll(new CategoriaVO());
        $produto = (new ProdutoModel)->selectAll(new ProdutoVO());

        $this->loadView("listaCategorias", [
            "categorias" => $data,
            "produtos" => $produto
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;
        echo ($id);

        if(!empty($id)) {
            $model = new CategoriaModel();
            $vo = new CategoriaVO($id);
            $categoria = $model->selectOne($vo);
        } else {
            $categoria = new CategoriaVO();
        }
        $this->loadView("formCategoria", [
            "categoria" => $categoria
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new CategoriaModel();
        $vo = new CategoriaVO($id, $_POST["nome"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("categorias.php");
    }

    public function remove() {
        $vo = new CategoriaVO($_GET["id"]);
        $model = new CategoriaModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("categorias.php");
    }

}