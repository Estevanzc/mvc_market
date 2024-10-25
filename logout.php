<?php

require_once("Connection_cfg.php");
require_once("vendor/autoload.php");

$controller = new Controller\LoginController();
$controller->logout();