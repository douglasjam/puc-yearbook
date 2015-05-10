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
        </p>
    </div>
</div>

<div id="participantesexibe" class="container">
    <div class="row">

        <?php if (!Helper_String::isNull($participante->foto)) { ?>
            <a target="_blank" href="/resources/participantes/<?php echo $participante->foto; ?>">
                <img style="padding: 10px;" src="/imagefly/w250-h250-c/resources/participantes/<?php echo $participante->foto; ?>" />
            </a>
        <?php } ?>

        <dl>
            <dd>Nome</dd> <dt><?php echo $participante->nome; ?></dt> 
            <dd>Cidade/UF</dd> <dt><?php echo $participante->cidade->nome . '/' . $participante->cidade->estado->sigla; ?></dt> 
            <dd>E-mail</dd> <dt><?php echo $participante->email; ?></dt> 
            <dd>Descrição</dd> <dt><?php echo $participante->descricao; ?></dt> 
        </dl>
    </div>
    <div class="row">
        <a href="/listagem">Voltar a Listagem</a>
    </div>
</div>