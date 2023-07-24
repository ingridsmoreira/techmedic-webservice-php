<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");
// incluindo as configuracoes principais
require_once PROJECT_ROOT_PATH . "/inc/config.php";
// incluindo os controller da API
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";
// incluindo os models
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";
require_once PROJECT_ROOT_PATH . "/Model/MedicoModel.php";
require_once PROJECT_ROOT_PATH . "/Model/CalendarioModel.php";
require_once PROJECT_ROOT_PATH . "/Model/NotificacoesModel.php";
?>