<?php

namespace Controller;

abstract class Controller {
    public function __construct($obriga_login = false, $restricted = false) {
        if (!isset($_SESSION)) {
            session_start();
            session_regenerate_id();
        }
        if ($obriga_login && !isset($_SESSION["usuario"])) {
            $this->redirect("login.php");
            exit();
        }
        if ($restricted) {
            if ($_SESSION["usuario"]->getNivel() < 2) {
                $this->redirect("index.php");
                exit();
            }
        }
    }
    public function uploadFile($file, $old_file = "") {
        $this->deleteFile($old_file);
        
        if (empty($file["name"])) {
            return "";
        }
        $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() .".". $extension;
        move_uploaded_file($file["tmp_name"], "uploads/" . $nome_arquivo);
        return $nome_arquivo;
    }
    public function deleteFile($file_name) {
        if(!empty($file_name)) {
            $path = "uploads/" . $file_name;
            unlink($path);
        }
    }

    public function redirect($url) {
        header("Location: " . $url);
    }

    public function loadView($view, $data = []) {
        extract($data);
        include("views/" . $view . ".php");
    }

}