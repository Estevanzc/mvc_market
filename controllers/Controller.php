<?php

namespace Controller;

abstract class Controller {
    public function __construct($obriga_login = true) {
        if (!isset($_SESSION)) {
            session_start();
            session_regenerate_id();
        }
        if ($obriga_login && !isset($_SESSION["usuario"])) {
            $this->redirect("login.php");
            exit();
        }
    }
    public function uploadFile($file, $old_file = "") {
        if (!empty($old_file)) {
            $this->deleteFile($old_file);
        }
        if (empty($file["name"])) {
            return "";
        }
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() .".". $extension;
        move_uploaded_file($file["tmp_name"], "uploads/" . $nome_arquivo);
        return $nome_arquivo;
    }
    public function deleteFile($file_name) {
        $path = "uploads/" . $file_name;
        unlink($path);
    }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

}