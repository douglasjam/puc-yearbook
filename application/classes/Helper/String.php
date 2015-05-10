<?php

defined('SYSPATH') or die('No direct script access.');

class Helper_String {

    public static function toStringEquacaoNome($variavel, $enc = 'UTF-8'){
        
        $variavel = self::removeAcentos($variavel, $enc);
        $variavel = strtolower($variavel);

        $restritos = array(
            '' => '/!|,|"/',
            '' => '/\)|\(/',
            '_' => '/ |:|\/|\+/',
            'p' => '/%/'
        );

        return preg_replace($restritos, array_keys($restritos), htmlentities($variavel, ENT_NOQUOTES, $enc));
    }
    
    public static function toURL($variavel, $enc = 'UTF-8') {

        $variavel = self::removeAcentos($variavel, $enc);
        $variavel = strtolower($variavel);

        $restritos = array(
            '' => '/!|,|"/',
            '-' => '/ |:|\+/'
        );

        return preg_replace($restritos, array_keys($restritos), htmlentities($variavel, ENT_NOQUOTES, $enc));
    }

    public static function removeAcentos($variavel, $enc = 'UTF-8') {
        $acentos = array(
            'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
            'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
            'C' => '/&Ccedil;/',
            'c' => '/&ccedil;/',
            'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
            'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
            'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
            'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
            'N' => '/&Ntilde;/',
            'n' => '/&ntilde;/',
            'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
            'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
            'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
            'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
            'Y' => '/&Yacute;/',
            'y' => '/&yacute;|&yuml;/',
            'a.' => '/&ordf;/',
            'o.' => '/&ordm;/',
        );

        return strtolower(preg_replace($acentos, array_keys($acentos), htmlentities($variavel, ENT_NOQUOTES, $enc)));
    }

    public static function getWords($string, $wordsParam = 1) {

        $words = $wordsParam;
        $pos = 0;

        while ($words >= 1) {
            $pos = strpos($string, ' ', $pos);
            $pos++;
            $words--;
        }

        $retorno = substr($string, 0, $pos);
        if (in_array(self::getLastWord($retorno), self::getListPronomes()))
            $retorno = self::getWords($string, $wordsParam + 1);

        if (trim($retorno) == '')
            return trim($string);
        else
            return trim($retorno);
    }

    public static function getLastWord($string) {

        $out = preg_split('/\s+/', trim($string));
        return $out[count($out) - 1];
    }

    public static function getParametrosToString($parametros = array()) {

        $retorno = '';

        foreach ($parametros as $chave => $valor) {
            $retorno .= $chave . ' => "' . $valor . '",';
        }

        $retorno = substr($retorno, 0, -1);


        return $retorno;
    }

    public static function isNull($value) {

        if (!isset($value) || $value == null || $value == '')
            return true;
        else
            return false;
    }

    public static function getListPronomes() {
        return array('DA', 'DAS', 'DE', 'DO', 'DOS', 'E');
    }

    public static function upper($string) {
        return strtoupper(strtr($string, "áéíóúâêôãõàèìòùç", "ÁÉÍÓÚÂÊÔÃÕÀÈÌÒÙÇ"));
    }

}

?>