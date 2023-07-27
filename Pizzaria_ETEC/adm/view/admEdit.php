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
    <?php 
        if(!isset($_REQUEST["id"])){
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR08">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php
            exit();
        }

        require_once "../model/Manager.php";
        $dados = pegaAdm($_REQUEST["id"]);
        if($dados["result"] == 0){
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD06">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php
            exit();
        }
        
    ?>
    <div id="titulo">
        <h3>Administradores do Sistema</h3>
        <h4>Editar Registro de Administrador</h4>
    </div>
    
    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="AdmNew">
            <input type="hidden" name="adm_edit" value="1">
            <input type="hidden" name="id" value="<?=$dados['id'];?>">
            <label for="Nome">Nome</label><br>
            <input type="text" name="nome" value="<?=$dados['nome'];?>" class="formBasico"><br>
            <label for="email">E-mail</label><br>
            <input type="email" name="email" value="<?=$dados['email'];?>" class="formBasico"><br>
            <label for="senha"><u>Nova</u> Senha(<i>Não obrigatório</i>)</label><br>
            <input type="password" name="senha" value="" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" <?php echo $dados["status"] == 1 ? "selected":""?>>Ativo</option>
                <option value="0" <?php echo $dados["status"] == 0 ? "selected":""?>>Inativo</option>
            </select><br><br>
            <label for="poder">Poder</label><br>
            <select name="poder" id="poder" class="formBasico">
                <option value="1" <?php echo $dados["poder"] == 1 ? "selected":""?>>1</option>
                <option value="2" <?php echo $dados["poder"] == 2 ? "selected":""?>>2</option>
                <option value="3" <?php echo $dados["poder"] == 3 ? "selected":""?>>3</option>
                <option value="4" <?php echo $dados["poder"] == 4 ? "selected":""?>>4</option>
                <option value="5" <?php echo $dados["poder"] == 5 ? "selected":""?>>5</option>
                <option value="6" <?php echo $dados["poder"] == 6 ? "selected":""?>>6</option>
                <option value="7" <?php echo $dados["poder"] == 7 ? "selected":""?>>7</option>
                <option value="8" <?php echo $dados["poder"] == 8 ? "selected":""?>>8</option>
                <option value="9" <?php echo $dados["poder"] == 9 ? "selected":""?>>9</option>
            </select><br><br>
            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

</body>
</html>