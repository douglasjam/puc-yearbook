<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Cadastrar extends Template_Site {

    public $login_requerido = false;

    public function action_exibe() {

        // se já estiver logado redireciona para a minha conta
        if (Helper_Participante::isLogged()) {
            Helper_Notificacao::addNotificacao('sucesso', 'Você já está cadastrado e logado em nosso sistema!');
            $this->redirect('/minhaconta');
        }


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            //------------------------------------------------------------------
            // post NÃO submetido, exibe o formulario
            //------------------------------------------------------------------

            $post = Session::instance()->get_once('post', NULL);

            $participante = ORM::Factory('Participante');

            // Caso o atributo POST esteja preenchido, é advindo de um
            // erro na alteração/inserção, sendo assim atualizamos o objeto
            // com o $post armazenado na SESSION

            if ($post != NULL) {
                unset($post['id']);
                $participante->values($post);
            }
            
            $estados = ORM::Factory('Estado')
                    ->order_by('nome', 'asc')
                    ->find_all()
                    ->as_array('id', 'nome');
            
            $estados = array(null => '-- Selecione --') + $estados;
            
            
            $cidades = ORM::Factory('Cidade')
                    ->order_by('nome', 'asc')
                    ->where('estado_id', '=', $participante->cidade->estado_id)
                    ->find_all()
                    ->as_array('id', 'nome');

            $cidades = array(null => '-- Selecione --') + $cidades;

            $view = View::Factory('cadastrar_formulario');
            $view->set('participante', $participante);
            $view->set('estados', $estados);
            $view->set('cidades', $cidades);
            $this->template->content = $view;
        } else {

            //------------------------------------------------------------------
            // post submetido, salva o cadastro
            //------------------------------------------------------------------

            $post = Request::current()->post();

            $participante = ORM::Factory('Participante');

            try {

                unset($post['id']);
                $participante->values($post);

                if (Upload::not_empty($_FILES['foto'])) {
                    $participante->foto = Helper_Upload::move('resources/participantes/', $_FILES['foto']);
                }

                $participante->save();

                Helper_Notificacao::addNotificacao('sucesso', 'Participante cadastrado com sucesso, agora você pode efetuar login!');
                $this->redirect('/login');
            } catch (ORM_Validation_Exception $e) {

                $erros = $e->errors('models');
                Session::instance()->set('post', $post);
                Helper_Notificacao::addNotificacao('erro', 'Ocorreu um erro ao tentar cadastrar o participante', $erros);
                $this->redirect('/cadastrar');
            }
        }
    }

}
