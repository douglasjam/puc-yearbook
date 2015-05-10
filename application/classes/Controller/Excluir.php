<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Excluir extends Template_Site {

    public $login_requerido = true;

    public function action_excluir() {

        $participante = Helper_Participante::getParticipante();
        $participante->delete();
        Session::instance()->destroy();
        Cookie::delete('participante');
        Helper_Notificacao::addNotificacao('sucesso', 'Perfil excluido do Yearbook com sucesso');
        $this->redirect('/login');
    }

}
