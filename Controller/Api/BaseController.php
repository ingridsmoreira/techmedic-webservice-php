<?php
class BaseController
{
    /** 
* __call metodo magico. 
*/
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
    /** 
* GET elementos da URI. 
* 
* @return array 
*/
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
        return $uri;
    }
    /** 
* Get parametros para querystring. 
* 
* @return array 
*/
    protected function getQueryStringParams()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
    /** 
* Get parametros para json. 
* 
* @return array 
*/
    protected function getJsonParams()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        return $data;
    }
    /** 
* Envia saida da API. 
* 
* @param mixed $data 
* @param string $httpHeader 
*/
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
        echo $data;
        exit;
    }
}
?>