<?php
    if(isset($_POST['usuario']) || isset($_POST['senha'])) {
        if(strlen($_POST['usuario']) == 0) {
            echo "Preencha seu email";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha a sua senha";
        } else {
            header("Location: menu.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login PDV</title>
        <link rel="stylesheet" href="estilo/estilo-login.css">
    </head>
    <body>
        <section>
            <div class="imgBx">
                <img src="imagem/pdv-fiscal.jpg">    
            </div> 

            <div class="contenteBx">
                <div class="formBx">
                    <h2>Login PDV Fiscal</h2>
                    <form action="" method="POST">
                        <div class="inputBx">
                            <span>Usuario</span>
                            <input type="text" name="usuario">    
                        </div>  
                        <div class="inputBx">
                            <span>Senha</span>
                            <input type="password" name="senha">   
                        </div>    
                        <div class="lembrar">
                            <label><input type="checkbox" name=""> Lembrar me</label>       
                        </div> 
                        <div class="inputBx">
                            <input type="submit" value="Entrar" name="">
                        </div>
                    </form>    
                </div>            
            </div>   
        </section>    
    </body>
</html>