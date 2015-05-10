<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atividade Aberta 5 - Douglas Antunes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
        foreach ($styles as $file => $type)
            echo HTML::style($file, array('media' => $type)), PHP_EOL
            ?>

        <?php
        foreach ($scripts as $file)
            echo HTML::script($file), PHP_EOL
            ?>

    </head>
    <body>
        <header id="titulo" class="container">
            <div class="row">
                <h1><a href="/">Atividade 6 - Yearbook</a></h1>
            </div>
        </header>

        <nav id="menu" class="container">
            <div class="row">
                <ul>
                    <li><a href="/">Home</a></li>
                    <?php if (Helper_Participante::isLogged()) { ?>
                        <li><a href="/minhaconta">Minha Conta</a></li>
                        <li><a href="/logout">Logout</a></li>
                        <li><a href="/logoutseguro">Logout Seguro</a></li>
                    <?php } else { ?>
                        <li><a href="/cadastrar">Cadastrar</a></li>
                        <li><a href="/login">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

        <?php echo $content; ?>

        <footer id="rodape" class="container">
            <div class="row">
                <a target="_blank" href="http://validator.w3.org/check?uri=http%3A%2F%2Fdjar.com.br%2Fpospuc%2Fatividade05%2Findex.html">
                    <img style="border:0;width:88px;height:31px" src="/media/imagens/w3c-valid-html.jpg" alt="HTML válido!" />
                </a>

                <a target="_blank" href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS válido!" />
                </a>
            </div>
        </footer>
    </body>
</html>
