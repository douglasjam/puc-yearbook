<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Minhaconta extends Template_Site {
    
    public $login_requerido = true;

    public function action_exibe() {


        $participante_id = Helper_Participante::getParticipante()->id;

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            //------------------------------------------------------------------
            // post NÃO submetido, exibe o formulario
            //------------------------------------------------------------------

            $post = Session::instance()->get_once('post', NULL);

            $participante = ORM::Factory('Participante', $participante_id);

            if (!$participante->loaded()) {
                Helper_Notificacao::addNotificacao('erro', 'Participante [' . $participante_id . '] não encontrado, entre em contato com o Administrador');
                $this->redirect('/');
            }

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

            $view = View::Factory('minhaconta');
            $view->set('participante', $participante);
            $view->set('estados', $estados);
            $view->set('cidades', $cidades);
            $this->template->content = $view;
        } else {

            //------------------------------------------------------------------
            // post submetido, salva o cadastro
            //------------------------------------------------------------------

            $post = Request::current()->post();

            $participante = ORM::Factory('Participante', $participante_id);

            try {

                unset($post['id']);
                $participante->values($post);

                if (Upload::not_empty($_FILES['foto'])) {
                    $participante->foto = Helper_Upload::move('resources/participantes/', $_FILES['foto']);
                }

                $participante->save();

                Helper_Notificacao::addNotificacao('sucesso', 'Usuário alterado com sucesso!');
            } catch (ORM_Validation_Exception $e) {
                $erros = $e->errors('models');
                Session::instance()->set('post', $post);
                Helper_Notificacao::addNotificacao('erro', 'Ocorreu um erro ao tentar alterar o usuário', $erros);
            }

            if (isset($erros) && sizeof($erros) > 0)
                $this->redirect(Request::current()->referrer());
            else {
                $participante->reload();
                $this->redirect('/minhaconta');
            }
        }
    }

}
