<?php
defined('SYSPATH') or die('No direct script access.');

class Template_Site extends Controller_Template {

    public $template = '/template';
    public $login_requerido = true;

    public function before() {

        parent::before();

        if ($this->login_requerido && !Helper_Participante::isLogged()) {
            Helper_Notificacao::addNotificacao('alerta', 'Para acessar essa página é necessário efetuar login!');
            $this->redirect('/login');
        }

        if ($this->auto_render) {

            $this->template->content = '';
            $this->template->styles = array();
            $this->template->scripts = array();
        }
    }

    public function after() {

        if ($this->auto_render) {

            $styles = array(
                'http://necolas.github.io/normalize.css/3.0.1/normalize.css' => 'screen',
                'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css' => 'screen',
                '/media/css/bijou.min.css' => 'screen',
                '/media/css/site.css' => 'screen',
            );

            $scripts = array(
                'http://code.jquery.com/jquery-1.11.0.min.js',
                'http://code.jquery.com/ui/1.10.3/jquery-ui.js',
                '/media/js/site.js',
            );

            $this->template->styles = array_merge($this->template->styles, $styles);
            $this->template->scripts = array_merge($this->template->scripts, $scripts);
        }

        parent::after();
    }

}
