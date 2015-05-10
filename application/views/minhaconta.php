<script>
    $(document).ready(function() {

        $('#estado_id').change(function() {
            $.getJSON('/ajax/getcidades/' + $(this).val(), function(json) {
                $('#cidade_id').html(json.select);
            });
        });

        $("#dialog-excluir").dialog({
            resizable: false,
            height: 140,
            autoOpen: false,
            modal: true,
            buttons: {
                "Excluir perfil": function() {
                    $(this).dialog("close");
                    window.location = '/excluir';
                },
                Cancelar: function() {
                    $(this).dialog("close");
                }
            }
        });
        
        $('#btn-excluir').click(function() {
            $("#dialog-excluir").dialog("open");
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
        <form name="formcadastro" action="/minhaconta" method="post" enctype="multipart/form-data">

            <?php echo Form::hidden('id', $participante->id); ?>

            <p class="subtitulo">
                Minha Conta
            </p>

            <div style="float: left;">

                <p>
                    <label>Login</label>
                    <input type="text" value="<?php echo $participante->login; ?>" disabled="disabled"/>
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
                    <label for="foto">Capa</label>
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


            <div style="float: left;">
                <?php if (!Helper_String::isNull($participante->foto)) { ?>
                    <a target="_blank" href="/resources/participantes/<?php echo $participante->foto; ?>">
                        <img style="padding: 10px;" src="/imagefly/w220-h340-c/resources/participantes/<?php echo $participante->foto; ?>" />
                    </a>
                <?php } ?>

            </div>

            <p>
                <input type="submit" value="Alterar Conta" />
            </p>

        </form>
    </div>
    <div class="row">
        <a id="btn-excluir" href="#">Desejo excluir meu perfil</a>
    </div>
</div>

<div id="dialog-excluir" title="Excluir perfil?">
    <p>Tem certeza que deseja excluir o seu perfil? Esta ação não tem volta!</p>
</div>