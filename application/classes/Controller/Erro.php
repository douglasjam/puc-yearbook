<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Erro extends Template_Site {

    public $login_requerido = false;

    public function action_404() {

        $view = View::Factory('/erro404');
        $this->template->content = $view;
    }

}
