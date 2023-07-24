<?php
class CalendarioController extends BaseController
{
    // "calendario/get" - Endpoint Get calendario do user pelo  id do calendario
    public function getAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $calendarioModel = new CalendarioModel();
                $id = '';
                if (isset($arrQueryStringParams['id']) && $arrQueryStringParams['id']) {
                    $id = $arrQueryStringParams['id'];
                }
                $calendario = $calendarioModel->getCalendario($id);
                $responseData = json_encode($calendario);
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
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
    // "calendario/getUser" - Endpoint Get calendario do user pelo  userId
    public function getUserAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $calendarioModel = new CalendarioModel();
                $userId = '';
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                $calendario = $calendarioModel->getUserCalendario($userId);
                $responseData = json_encode($calendario);
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
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // "calendario/getMedico" - Endpoint Get calendario do medico pelo  medicoId
    public function getMedicoAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $calendarioModel = new CalendarioModel();
                $medicoId = '';
                if (isset($arrQueryStringParams['medicoId']) && $arrQueryStringParams['medicoId']) {
                    $medicoId = $arrQueryStringParams['medicoId'];
                }
                $calendario = $calendarioModel->getMedicoCalendario($medicoId);
                $responseData = json_encode($calendario);
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
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    // "calendario/create" - Endpoint para criar calendario
    public function createAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $calendarioModel = new CalendarioModel();
                $medicoId = '';
                $userId = '';
                $data = '';
                if (isset($arrQueryStringParams['medicoId']) && $arrQueryStringParams['medicoId']) {
                    $medicoId = $arrQueryStringParams['medicoId'];
                }
                if (isset($arrQueryStringParams['userId']) && $arrQueryStringParams['userId']) {
                    $userId = $arrQueryStringParams['userId'];
                }
                if (isset($arrQueryStringParams['data']) && $arrQueryStringParams['data']) {
                    $data = $arrQueryStringParams['data'];
                }
                $calendario = $calendarioModel->criarCalendario($medicoId, $userId, $data);
                $responseData = json_encode($calendario);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';

            }
        }
        // enviar saida
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
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
                $calendarioModel = new CalendarioModel();
                $id = '';
                if (isset($arrQueryStringParams['id']) && $arrQueryStringParams['id']) {
                    $id = $arrQueryStringParams['id'];
                }
                $calendario = $calendarioModel->deleteCalendario($id);
                $responseData = json_encode($calendario);
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