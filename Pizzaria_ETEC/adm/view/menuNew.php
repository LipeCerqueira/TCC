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
            location.href = "menuList.php";
        }
    </script>
</head>
<body>
    <div id="titulo">
        <h3>Administração de Menu & Submenu</h3>
        <h4>Novo Menu ou Submenu</h4> 
    </div>

    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="AdmNew">
            <?php 
                if(isset($_POST["menu"])){
                    echo "<b>Novo Menu</b><br><br>";
                
            ?>
            <input type="hidden" name="menu_new" value="1">
            <label for="Nome">Nome do Menu</label><br>
            <input type="text" name="nome" value="" class="formBasico"><br>
            <label for="url">URL</label><br>
            <input type="text" name="url" value="" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" selected>Ativo</option>
                <option value="0" >Inativo</option>
            </select><br><br>
            <label for="replica">Replicacar ajustando para todos os "folders"</label><br>
            <input type="checkbox" name="replica" value="1" checked><br> <br>
            <?php 
                }else{
                    echo "<b>Novo SubMenu</b><br><br>";
                    require_once "../model/Menu.class.php";
                    $submenu = new Menu();
                    $dados = $submenu->listaTabela("menu");
                    if(count($dados) != 0){              
            ?>
            <input type="hidden" name="submenu_new" value="1">
            <label for="Nome">ID menu:</label><br>
            <select name="idmenu" id="idmenu" class="formBasico">
                <?php 
                    $nome = "";
                    for($i = 0; $i < count($dados);$i++){
                        if($nome != $dados[$i]["nome"]){
                            echo "<option value=\"{$dados[$i]['id']}\">{$dados[$i]['id']} - {$dados[$i]['nome']}</option>";   
                        }
                        $nome = $dados[$i]["nome"];
                    }
                ?>
            </select><br>
            <label for="Nome">Nome do SubMenu</label><br>
            <input type="text" name="nomesub" value="" class="formBasico"><br>
            <label for="url">URL</label><br>
            <input type="text" name="url" value="" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" selected>Ativo</option>
                <option value="0" >Inativo</option>
            </select><br><br>
            <label for="replica">Replicacar ajustando para todos os "folders"</label><br>
            <input type="checkbox" name="replica" value="1" checked><br><br>

            <?php 
                    }else{
                        echo "Não há registros na tabela<br><br><br>";
                    }     
            }
            ?>

            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

</body>
</html>