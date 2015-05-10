<?php if (Helper_Notificacao::hasNotificacoes()) { ?>
    <div class="container">
        <div class="row">
            <?php echo Helper_Notificacao::getNotificacoes(); ?>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <p>Bem vindo ao YearBook, sistema web construido pelo aluno Douglas Antunes do curso de pós graduação Desenvolvimento de Aplicações Web da PUC Minas.</p>
        <p>Esta aplicação é relacionada a atividade 6, onde é requisitado o desenvolvimento de uma aplicação que simula um yearbook, com as funções de cadastro, pesquisa e autenticação.</p>
        <p>Caso ainda não tenha seu cadastro, <a href="/cadastrar">clique aqui</a> para se cadastrar</p>
    </div>
</div>

<div id="previaparticipantes" class="container">
    <h4>Confira alguns usuários que já estão conosco</h4>
    <div class="row">
        <ul>
            <?php foreach ($participantes as $participante) { ?>
                <li>
                    <a href="/exibir/<?php echo $participante->id; ?>">
                        <figure>
                            <img src="<?php echo URL::base(); ?>imagefly/w220-h340-c/resources/participantes/<?php echo $participante->foto; ?>" />
                            <figcaption><?php echo $participante->nome; ?></figcaption>
                        </figure>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>