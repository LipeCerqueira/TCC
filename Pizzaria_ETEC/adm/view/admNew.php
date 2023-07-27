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
    <script>
        function voltar(){
            location.href = "admList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <h3>Administradores do Sistema</h3>
        <h4>Novo Administrador</h4> 
    </div>

    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="AdmNew">
            <input type="hidden" name="adm_new" value="1">
            <label for="Nome">Nome</label><br>
            <input type="text" name="nome" value="" class="formBasico"><br>
            <label for="email">E-mail</label><br>
            <input type="email" name="email" value="" class="formBasico"><br>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha" value="" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" selected>Ativo</option>
                <option value="0" >Inativo</option>
            </select><br><br>
            <label for="poder">Poder</label><br>
            <select name="poder" id="poder" class="formBasico">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select><br><br>
            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

</body>
</html>