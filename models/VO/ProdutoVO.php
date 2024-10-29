<?php

namespace Model\VO;

final class ProdutoVO extends VO {

    private $nome;
    private $descricao;
    private $preco;
    private $id_categorias;
    private $foto;

    public function __construct($id = 0, $nome = "", $descricao = "", $preco = 0, $id_categorias =  0,  $foto = "") {
        parent::__construct($id);
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->foto = $foto;
        $this->id_categorias = $id_categorias;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
    public function getId_categorias() {
        return $this->id_categorias;
    }

    public function setId_categorias($id_categorias) {
        $this->id_categorias = $id_categorias;
    }
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

}