<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Template_Site {

    public $login_requerido = false;

    public function action_getcidades() {

        $this->auto_render = false;

        $estado_id = Request::current()->param('id');


        $retorno = array();

        $estados = ORM::factory('Cidade')
                ->where('estado_id', '=', $estado_id)
                ->order_by('nome', 'asc')
                ->find_all()
                ->as_array('id', 'nome');

        $retorno['json'] = $estados;

        $retorno['select'] = '<option value="">-- Selecione --</option>' . PHP_EOL;

        foreach ($estados as $chave => $valor) {
            $retorno['select'] .= '<option value="' . $chave . '">' . $valor . '</option>' . PHP_EOL;
        }

        echo json_encode($retorno);
    }

}
