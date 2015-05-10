<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Participantes extends Template_Site {

    public $login_requerido = true;

    public function action_index() {
        $this->redirect('/listagem');
    }

    public function action_listagem() {

        $pesqnome = Request::current()->query('nome');

        $participantes = ORM::factory('Participante');


        if (isset($pesqnome) && $pesqnome != '')
            $participantes = $participantes->where('nome', 'like', '%' . $pesqnome . '%');

        $participantes = $participantes->find_all();


        $view = View::Factory('participantes_listagem');
        $view->set('participantes', $participantes);
        $this->template->content = $view;
    }

    public function action_exibir() {

        $participante_id = Request::current()->param('id');

        $participante = ORM::factory('Participante', $participante_id);

        if (!$participante->loaded()) {
            Helper_Notificacao::addNotificacao('erro', 'Não foi encontrado o participante ' . $participante_id);
            $this->redirect('/listagem');
        }

        Helper_Participante::atualizaUltimoPerfilVisitado($participante_id);


        $view = View::Factory('participantes_exibe');
        $view->set('participante', $participante);
        $this->template->content = $view;
    }

}
