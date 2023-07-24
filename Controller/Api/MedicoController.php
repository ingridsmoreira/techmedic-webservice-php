<?php
class MedicoController extends BaseController{
    // "medico/get" Get medico pelo ID
    public function getAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $medicoModel = new MedicoModel();
                $medicoId = '';
                $especialidade = '';
                if (isset($arrQueryStringParams['medicoId']) && $arrQueryStringParams['medicoId']) {
                    $medicoId = $arrQueryStringParams['medicoId'];
                }
                if (isset($arrQueryStringParams['especialidade']) && $arrQueryStringParams['especialidade']) {
                    $especialidade = $arrQueryStringParams['especialidade'];
                }
                $medico = $medicoModel->getMedico($medicoId, $especialidade);
                $responseData = json_encode($medico);
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

    // "medico/all" Get all medicos
    public function allAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $medicoModel = new MedicoModel();
                $medicos = $medicoModel->getAllMedicos();
                $responseData = json_encode($medicos);
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