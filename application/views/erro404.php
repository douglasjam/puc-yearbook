<?php if (Helper_Notificacao::hasNotificacoes()) { ?>
    <div class="container">
        <div class="row">
            <?php echo Helper_Notificacao::getNotificacoes(); ?>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        A página requisita não existe, tente voltar para a página principal <a href="/">clicando aqui</a>
    </div>
</div>