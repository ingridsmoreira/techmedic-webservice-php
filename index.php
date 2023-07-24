<?php
require __DIR__ . "/inc/bootstrap.php";
require __DIR__ . "/inc/headers.php";
require __DIR__ . "/utils/password.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );




if ( !isset($uri[2])) {
    header("HTTP/1.1 404 nao possui url completa");
    exit();
}
$strMethodName = $uri[2] . 'Action';
switch($uri[1]){
    case 'user':
        require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";
        $userObjFeedController = new UserController();
        $userObjFeedController->{$strMethodName}();
        break;
    case 'medico':
        require PROJECT_ROOT_PATH . "/Controller/Api/MedicoController.php";
        $medicoObjFeedController = new MedicoController();
        $medicoObjFeedController->{$strMethodName}();
        break;
    case 'calendario':
        require PROJECT_ROOT_PATH . "/Controller/Api/CalendarioController.php";
        $calendarioObjFeedController = new CalendarioController();
        $calendarioObjFeedController->{$strMethodName}();
        break;
    case 'notificacoes':
        require PROJECT_ROOT_PATH . "/Controller/Api/NotificacoesController.php";
        $notificacaoObjFeedController = new NotificacoesController();
        $notificacaoObjFeedController->{$strMethodName}();
        break;
    default:
        header("HTTP/1.1 404 url nao existe");
        exit();
}
?>