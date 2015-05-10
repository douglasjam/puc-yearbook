<script>
    $(document).ready(function() {

        $('#estado_id').change(function() {
            $.getJSON('/ajax/getcidades/' + $(this).val(), function(json) {
                $('#cidade_id').html(json.select);
            });
        });
    });
</script>
<?php if (Helper_Notificacao::hasNotificacoes()) { ?>
    <div class="container">
        <div class="row">
            <?php echo Helper_Notificacao::getNotificacoes(); ?>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="row">
        <form name="formcadastro" action="/cadastrar" method="post" enctype="multipart/form-data">

            <p class="subtitulo">
                Cadastrar Participante
            </p>

            <div style="float: left;">

                <p>
                    <label for="login">Login</label>
                    <input type="text" name="login" value="<?php echo $participante->login; ?>" />
                </p>
                
                
                <p>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" value="<?php echo $participante->senha; ?>" />
                </p>
                
                <p>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" value="<?php echo $participante->nome; ?>" />
                </p>

                <p>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" value="<?php echo $participante->email; ?>" />
                </p>

                <p>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" value="" accept="image/*" />
                </p>

                <p>
                    <label for="estado_id">Estado</label>
                    <?php echo Form::select('estado_id', $estados, $participante->cidade->estado_id, array('id' => 'estado_id')); ?>
                </p>


                <p>
                    <label for="cidade_id">Cidade</label>
                    <?php echo Form::select('cidade_id', $cidades, $participante->cidade_id, array('id' => 'cidade_id')); ?>
                </p>


                <p>
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao"><?php echo $participante->descricao; ?></textarea>
                </p>

            </div>

            <p>
                <input type="submit" value="Cadastrar Participante" />
            </p>

        </form>
    </div>
</div>