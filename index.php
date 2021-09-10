<?php
session_start()
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bulma.min.css">

    <style>
        body {
            background-image: url('images/background.jpg');


        }
    </style>

    <title>Cadastro de Usuários</title>
</head>

<body>


    <?php if (isset($_SESSION['mensagem'])) { ?>

        <div class="notification is-success">
            <button class="delete"></button>
        <?php
        echo $_SESSION['mensagem'] = "Cadastrado com sucesso";
        unset($_SESSION['mensagem']);
        
    }
        ?>
        </div>
    <?php if (isset($_SESSION['mensagemErro'])) { ?>

        <div class="notification is-danger">
            <button class="delete"></button>
        <?php
        echo $_SESSION['mensagemErro'] = "Já existe um e-mail/whatsApp cadastrados!";
        unset($_SESSION['mensagemErro']);
        
    }
        ?>
        </div>

        <section class="section">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-half">

                        <h1 class="title has-text-centered">Cadastramento de Contato</h1>


                        <form action="contato_cadastrado.php" method="POST">
                            <div class="field">
                                <label class="label">Nome Completo:</label>
                                <div class="control">
                                    <input name="nomeCompleto" class="input is-rounded " type="text" placeholder="Ex.: João Silva" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">E-mail:</label>
                                <div class="control">
                                    <input name="email" class="input is-rounded" type="email" placeholder="Ex.: Informe o seu melhor e-mail" required>
                                </div>

                            </div>

                            <div class="field">
                                <label class="label">WhatsApp:</label>
                                <div class="control">
                                    <input name="whatsApp" class="input is-rounded" type="tel" placeholder="Ex.: Informe seu WhatsApp!" pattern="[0-9]{2}[9]{1}[0-9]{8}" required>
                                </div>
                            </div>

                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button class="button is-primary is-rounded">Enviar</button>
                                    <button class="button is-danger is-rounded" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="content has-text-centered">
                <p> TODOS OS DIREITOS RESERVADOS A LUANA - CONTATOS₢</p>
                <p>

                    <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                </p>
            </div>
        </footer>

</body>



</html>