<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barber Style</title>
        <link rel="stylesheet" href="css/Index.css">
    </head>
    <body>
        <div class="container-form">
            <img class="imgLogo" src="img/LogoOficial.png"/>
            <form class="f_Login" action="login_proc.php" method="post">
                <?php
                    if(isset($_GET['erro'])){
                        if($_GET['erro'] == 1){
                            echo '<strong>Senha está errada!</strong>';
                        }else{
                            echo '<strong>Login incorreto!</strong>';
                        }
                        echo '</br>';
                    }
                ?>
                <label for="t_Login">
                   Usuário:<input type="text" name="login" id="t_Login" class="input-login" required>
                </label>
                <label for="t_Senha">
                   Senha:<input type="password" name="senha" id="t_Senha" class="input-login" required>
                </label>
                <div class="container-botoes">
                    <button type="reset" class="btn-action reset">Limpar</button>
                    <button type="submit" class="btn-action submit">Entrar</button>
                </div>
            </form>
        </div>
    </body>
</html>