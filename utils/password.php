<?php

class Password
{
    public function encryptString($string)
    {
        $ciphering = "AES-128-CTR";
        $encryption_iv = '1234567891011121';
        $encryption_key = "TCC2023PUCMINAS";
        $options = 0;
        return openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
    }

}
?>