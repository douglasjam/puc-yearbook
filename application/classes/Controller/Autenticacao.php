<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Autenticacao extends Template_Site {

    public $login_requerido = false;

    public function action_index() {
        $this->redirect('/login');
    }

    public function action_login() {

        // Se já estiver logado
        if (Session::instance()->get('participante_id') != NULL) {
            $this->redirect('/minhaconta');
        } else if ($_POST) {
            // Trata submissao de POST

            $post = Request::current()->post();

            $participante = $post['participante'];
            $senha = $post['senha'];

            $participante = ORM::Factory('Participante')
                    ->where('login', '=', $participante)
                    ->where('senha', '=', $senha)
                    ->find();

            if ($participante->loaded()) {

                Session::instance()->set('participante_id', $participante->id);

                if (isset($post['lembrarusuario'])) {
                    Cookie::set('participante', $post['participante']);
                } else {
                    Cookie::delete('participante');
                }

                Helper_Notificacao::addNotificacao('sucesso', 'Login efetuado com sucesso!');
                $this->redirect('/listagem');
            } else {
                Helper_Notificacao::addNotificacao('erro', 'O usuário/senha inválidos!');
                $this->redirect('/login');
            }
        }

        $view = View::Factory('/login');
        $this->template->content = $view;
    }

    public function action_logout() {

        if (Helper_Participante::isLogged() != NULL) {
            Session::instance()->destroy();
            Helper_Notificacao::addNotificacao('sucesso', 'Logout efetuado com sucesso');
        }

        $this->redirect('/login');
    }

    public function action_logoutseguro() {

        if (Helper_Participante::isLogged() != NULL) {
            Session::instance()->destroy();
            Cookie::delete('participante');

            Helper_Notificacao::addNotificacao('sucesso', 'Logout <b>SEGURO</b> efetuado com sucesso');
        }

        $this->redirect('/login');
    }

}
