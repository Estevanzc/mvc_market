<?php
require_once("Connection_cfg.php");
require_once("vendor/autoload.php");

$controller = new Controller\ProdutoController(false, false, true);
$controller->list();