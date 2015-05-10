<?php if (Helper_Notificacao::hasNotificacoes()) { ?>
    <div class="container">
        <div class="row">
            <?php echo Helper_Notificacao::getNotificacoes(); ?>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <form name="formlogin" action="/login" method="post" enctype="multipart/form-data">

            <p>
                <label for="participante">Participante</label>
                <input type="text" name="participante" value="<?php echo Cookie::get('participante'); ?>" />
            </p>

            <p>
                <label for="senha">Senha</label>
                <input type="password" name="senha" formname='formlogin' value="" />
            </p>

            <p>
                <label for="lembrarusuario">Lembrar Usuário</label>
                <input type="checkbox" name="lembrarusuario" value="" > 
            </p>
            
            <p>
                Ainda não tem login? <a href="/cadastrar">Clique aqui</a> e cadastre-se!
            </p>
            <p>
                <input type="submit" value="Entrar" />
            </p>

        </form>
    </div>
</div>