<?php 
require_once "admVerifSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Etec</title>
    <link rel="stylesheet" href="css/estilo1.css">
</head>
<body>
    <div id="titulo">
        <h3>Administradores do Sistema</h3>
        <h4>Mudar Senha</h4>
    </div>
    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="AdmNew">
            <input type="hidden" name="adm_mudarSenha" value="1">
            <input type="hidden" name="id" value="<?=$_SESSION["ADM-ID"];?>">
            <label for="senha">Senha</label><br>
            <input type="password" name="senha1" value="" required class="formBasico"><br>
            <br><br>
            <label for="senha">Senha- digite novamente</label><br>
            <input type="password" name="senha2" value="" required class="formBasico"><br>
            <br><br>
            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

    <?php 

if(isset($_REQUEST["msg"])){
	$cod = $_REQUEST["msg"];
	require_once "msg.php";
	echo "<script>alert('" . $MSG[$cod] ."');</script>";
}
?>

</body>
</html>