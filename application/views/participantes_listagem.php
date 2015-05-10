<?php if (Helper_Notificacao::hasNotificacoes()) { ?>
    <div class="container">
        <div class="row">
            <?php echo Helper_Notificacao::getNotificacoes(); ?>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <p class="subtitulo">
            Participantes
            <span class="pull-right">Exibindo <?php echo sizeof($participantes); ?> participantes</span>
        </p>
    </div>
</div>

<div id="participantespesquisa" class="container">
    <div class="row">
        <form class="pull-left" name="formpesquisa" action="/listagem" method="get" enctype="multipart/form-data">
            <span class="title">Pesquisar: </span>
            <input type="text" name="nome" />
            <input type="submit" value="Pesquisar" />
        </form>
    </div>
</div>

<div id="participanteslitagem" class="container">
    <div class="row">
        <?php $ultimoperfil = Helper_Participante::getParticipante()->ultimoperfil; ?>
        <p>
            Último Perfil Visitado: <a href="/exibir/<?php echo $ultimoperfil->id; ?>"><?php echo $ultimoperfil->nome; ?></a>
        </p>
    </div>
    <div class="row">
        <ul style="margin-top: -35px;">
            <?php foreach ($participantes as $participante) { ?>
                <li>
                    <a href="/exibir/<?php echo $participante->id; ?>">
                        <figure>
                            <img src="<?php echo URL::base(); ?>imagefly/w240-h320-c/resources/participantes/<?php echo $participante->foto; ?>" />
                        </figure>
                        <dl>
                            <dd>Nome</dd> <dt><?php echo $participante->nome; ?></dt> 
                            <dd>Cidade/UF</dd> <dt><?php echo $participante->cidade->nome . '/' . $participante->cidade->estado->sigla; ?></dt> 
                        </dl>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <?php if (sizeof($participantes) == 0) { ?>
            <span style="text-align: center;">Não foram encontrados participantes</span>
        <?php } ?>
    </div>
</div>