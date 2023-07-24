<?php

class UserController extends BaseController
{
    /** 
     * "/user/get" Endpoint - Get User pelo Id 
     */
    public function getAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();
                $id = '';
                if (isset($arrQueryStringParams['id']) && $arrQueryStringParams['id']) {
                    $id = $arrQueryStringParams['id'];
                }
                $user = $userModel->getUser($id);
                $responseData = json_encode($user);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // envia saida
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
    /** 
     * "/user/create" Endpoint - Criar User 
     */
    public function createAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $nome = '';
                if (isset($arrQueryStringParams['nome']) && $arrQueryStringParams['nome']) {
                    $nome = $arrQueryStringParams['nome'];
                }
                $email = '';
                if (isset($arrQueryStringParams['email']) && $arrQueryStringParams['email']) {
                    $email = $arrQueryStringParams['email'];
                }
                $numero = '';
                if (isset($arrQueryStringParams['numero']) && $arrQueryStringParams['numero']) {
                    $numero = $arrQueryStringParams['numero'];
                }
                $senha = '';
                if (isset($arrQueryStringParams['senha']) && $arrQueryStringParams['senha']) {
                    $senha = $arrQueryStringParams['senha'];
                    $password = new Password();
                    $senha = $password->encryptString($senha);
                }
                $user = $userModel->createUser($nome, $email, $numero, $senha);
                $responseData = json_encode($user);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // envia saida
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
    /** 
     * "/user/login" Endpoint - Entrar
     */
    public function loginAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $userModel = new UserModel();
                $email = '';
                if (isset($arrQueryStringParams['email']) && $arrQueryStringParams['email']) {
                    $email = $arrQueryStringParams['email'];
                }
                $senha = '';
                if (isset($arrQueryStringParams['senha']) && $arrQueryStringParams['senha']) {
                    $senha = $arrQueryStringParams['senha'];
                }
                $password = new Password();
                $senha = $password->encryptString($senha);
                $user = $userModel->loginUser($email, $senha);
                $responseData = json_encode($user);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // envia saida
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
    /** 
     * "/user/update/" Endpoint - Atualizar User
     */
    public function updateAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getJsonParams();
        if (strtoupper($requestMethod) == 'PUT') {
            try {
                $userModel = new UserModel();
                $id = '';
                if (isset($arrQueryStringParams['id']) && $arrQueryStringParams['id']) {
                    $id = $arrQueryStringParams['id'];
                }
                $nome = '';
                if (isset($arrQueryStringParams['nome']) && $arrQueryStringParams['nome']) {
                    $nome = $arrQueryStringParams['nome'];
                }
                $email = '';
                if (isset($arrQueryStringParams['email']) && $arrQueryStringParams['email']) {
                    $email = $arrQueryStringParams['email'];
                }
                $numero = '';
                if (isset($arrQueryStringParams['numero']) && $arrQueryStringParams['numero']) {
                    $numero = $arrQueryStringParams['numero'];
                }
                $senha = '';
                if (isset($arrQueryStringParams['senha']) && $arrQueryStringParams['senha']) {
                    $senha = $arrQueryStringParams['senha'];
                    $password = new Password();
                    $senha = $password->encryptString($senha);
                }
                $photoUrl = '';
                if (isset($arrQueryStringParams['photoUrl']) && $arrQueryStringParams['photoUrl']) {
                    $photoUrl = $arrQueryStringParams['photoUrl'];
                }
                $user = $userModel->updateUser($id, $nome, $email, $numero, $senha, $photoUrl);
                $responseData = json_encode($user);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor, entre em contato com o suporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Método não suportado';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // envia saida
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
}