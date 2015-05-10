<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Inicio extends Template_Site {

    public $login_requerido = false;

    public function action_index() {

        if (Helper_Participante::isLogged())
            $this->redirect('/listagem');

        $participantes = ORM::factory('Participante')
                ->order_by(DB::expr('RAND()'))
                ->limit(5)
                ->find_all();

        $view = View::Factory('/inicio');
        $view->set('participantes', $participantes);
        $this->template->content = $view;
    }

}
