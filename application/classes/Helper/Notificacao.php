<?phpdefined('SYSPATH') or die('No direct script access.');class Helper_Notificacao {    public static function hasNotificacoes() {        return (Session::instance()->get('notificacoes', NULL) != null);    }    public static function addNotificacao($tipo, $mensagem, array $itens = null) {        $notificacoes = Session::instance()->get('notificacoes');        $mensagem = $mensagem;        if ($notificacoes == NULL)            $notificacoes = array();        $notificacoes[$tipo][$mensagem] = null;        if ($itens != null)            $notificacoes[$tipo][$mensagem] = $itens;        Session::instance()->set('notificacoes', $notificacoes);    }    public static function removeNotificacao($tipo, $mensagem, array $itens = null) {        $notificacoes = Session::instance()->get('notificacoes');        if ($notificacoes == NULL)            $notificacoes = array();        unset($notificacoes[$tipo][$mensagem]);        Session::instance()->set('notificacoes', $notificacoes);    }    public static function getNotificacoes() {        $notificacoes = Session::instance()->get_once('notificacoes');        $retorno = '';        if ($notificacoes != NULL) {            echo '<ul class="notificacoes">';            foreach ($notificacoes as $tipo => $mensagens) {                foreach ($mensagens as $mensagem => $filhos) {                    if ($tipo == 'sucesso')                        $tipo = 'alert-success';                    else if ($tipo == 'erro')                        $tipo = 'alert-error';                    else if ($tipo == 'info')                        $tipo = 'alert-info';                    else if ($tipo == 'alerta') {                        $tipo = 'alert-yellow';                    }                    echo '<li class="' . $tipo . '">';                    echo $mensagem;                    if ($filhos != null) {                        echo '<ul>';                        foreach ($filhos as $filho) {                            echo '<li>' . ucfirst($filho) . '</li>';                        }                        echo '</ul>';                    }                    echo '</li>';                }            }            echo '</ul>';        }        return $retorno;    }}?>