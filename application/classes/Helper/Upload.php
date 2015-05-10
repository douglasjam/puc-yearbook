<?php

defined('SYSPATH') or die('No direct script access.');

class Helper_Upload {

    public static function type(array $file, array $allowed) {
        if ($file['error'] !== UPLOAD_ERR_OK)
            return TRUE;

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        return in_array($ext, $allowed);
    }

    public static function move($diretorio, $arquivo) {

        // caso o upload tenha sido feito, migra pra pasta e atualiza o objeto
        if (Upload::not_empty($arquivo)) {
            // Envia o arquivo para o diretório downloads
            Upload::$default_directory = $diretorio;

            // cria o diretorio se já não existir
            if (!is_dir($diretorio)) {
                mkdir($diretorio);
            }

            $filename = Helper_String::toURL($arquivo['name']);
            $novoArquivo = strtolower(date('YmdHisu', time()) . rand(10000, 99999) . '_' . $filename);
            Upload::save($arquivo, $novoArquivo);
            return $novoArquivo;
        } else {
            return null;
        }
    }

    public static function delete($diretorio, $arquivo) {
        return unlink(strtolower($diretorio) . '/' . strtolower($arquivo));
    }

    public static function file_exists($diretorio, $arquivo) {
        return file_exists($diretorio . '/' . $arquivo);
    }

    public static function isImage($path) {
        if (!getimagesize(getcwd() . $path)) {
            return false;
        } else {
            return true;
        }
    }

}

?>