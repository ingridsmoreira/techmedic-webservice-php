<?php
class NotificacoesController extends BaseController{
    // "notificacoes/get" Endpoint - Get notificacoes do usuario
    public function getAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $notificacoesModel = new NotificacoesModel();
                $userId = '';
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                $notificacoes = $notificacoesModel->getUserNotificacoes($userId);
                $responseData = json_encode($notificacoes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // enviar saida
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // "notificacoes/vizualizar" Endpoint - Vizualiza notificacoes do usuario
    public function vizualizarAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'PUT') {
            try {
                $notificacoesModel = new NotificacoesModel();
                $userId = '';
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                $notificacoes = $notificacoesModel->vizualizarNotificacoes($userId);
                $responseData = json_encode($notificacoes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // enviar saida
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

// "notificacoes/create" Endpoint - Cria notificacoes para usuario
    public function createAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $notificacoesModel = new NotificacoesModel();
                $userId = '';
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                $data = '';
                if (isset($arrQueryStringParams['data']) && $arrQueryStringParams['data']) {
                    $data = $arrQueryStringParams['data'];
                }
                $icone = '';
                if (isset($arrQueryStringParams['icone']) && $arrQueryStringParams['icone']) {
                    $icone = $arrQueryStringParams['icone'];
                }
                $msg = '';
                if (isset($arrQueryStringParams['msg']) && $arrQueryStringParams['msg']) {
                    $msg = $arrQueryStringParams['msg'];
                }
                $notificacoes = $notificacoesModel->criarNotificacao($userId, $data, $icone, $msg);
                $responseData = json_encode($notificacoes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // enviar saida
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function deleteAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'DELETE') {
            try {
                $notificacoesModel = new NotificacoesModel();
                $userId = '';
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                $notificacoes = $notificacoesModel->deleteUserNotificacoes($userId);
                $responseData = json_encode($notificacoes);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // enviar saida
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }

    }
} 
?>