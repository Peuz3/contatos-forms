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
    <title>Cadastro de Usuários</title>

    
     

    
</head>
<body>
<?php if(isset($_SESSION['mensagem'])){ ?>

<div class="notification is-success">
    <button class="delete"></button>
    <?php 
        echo $_SESSION['mensagem'] = "Cadastrado com sucesso";
        unset( $_SESSION['mensagem']);  }                 
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
                                <input name="nomeCompleto" class="input is-rounded" type="text" 
                                    placeholder="Ex.: João Silva" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">E-mail:</label>
                            <div class="control">
                                <input name="email" class="input is-rounded" type="email" 
                                    placeholder="Ex.: Informe o seu melhor e-mail" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">WhatsApp:</label>
                            <div class="control">
                                <input name="whatsApp" class="input is-rounded" type="text" 
                                    placeholder="Ex.: (61) 15012-3094" required>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-primary is-rounded">Enviar</button>
                                <button class="button is-danger is-rounded" type="reset">Limpar</button>
                            </div>    
                        </div>
                    </form> 
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>