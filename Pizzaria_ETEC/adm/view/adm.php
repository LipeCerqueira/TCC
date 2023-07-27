<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZA ETEC</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/pizzaria_etec_ico.png">
    <link rel="stylesheet" href="css/estilo1.css">
    <script>
        function ExecutaLogout(){
            var resp = confirm('Deseja sair do sistema?');
            if(resp == true){ 
                location.href="admLogout.php";
            }else{
                return null;
            }
        }
    </script>
</head>
<body>
    <div id="header">
        <div id="logo">
            <img src="img/logo_pizza_etec_white.png" alt="logomarca" style="margin: 25px 0px 0px 25px">
        </div>
        <div id="meioVazio">&nbsp;</div>
        <div id="dadosUsuario">
            Nome: <?= $_SESSION["ADM-NOME"];?><br>
            E-mail:<?= $_SESSION["ADM-EMAIL"];?><br>
            Poder:<?= $_SESSION["ADM-PODER"];?><br>
            <button onclick="ExecutaLogout();">Logout</button>
        </div>
    </div>
    <div id="container">
        <div id="menu">
            <br>
            <?php 
            if($_SESSION["ADM-PODER"] >= 7 ){
                ?>
                    <a href="pizzasList.php" target="screen" class="linkMenu">Pizzas</a><br><br>
                <?php 
            }

            if($_SESSION["ADM-PODER"] == 9 ){
            ?>
                <a href="menuList.php" target="screen" class="linkMenu">Menu & Submenus</a><br><br>
            <?php 
            }
            ?>
            <hr>
            <?php 
                if($_SESSION["ADM-PODER"] == 9 ){
            ?>
                <a href="admList.php" target="screen" class="linkMenu">Administradores</a><br><br>
            <?php 
            }
            ?>
            <a href="admChangePassw.php" target="screen" class="linkMenu">Mudar Senha</a><br><br>
        </div>
        <div id="apres">
        <iframe name="screen" id="screen" width="100%" height="1180px" src="bemvindo.php" style="border: 0px;"></iframe>
        </div>
    </div>
    
</body>
</html>