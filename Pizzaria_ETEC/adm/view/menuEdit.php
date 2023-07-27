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
            location.href="menuList.php";
        }
    </script>
</head>
<body>
    <?php 
        if(!isset($_REQUEST["id"])){
            ?>  
                <form action="menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR01">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
        require_once "../model/Manager.php";
        $dados = array();
        if($_REQUEST["destino"] == "menu"){
            $dados = pegaRegMenu($_REQUEST["id"]);
        }else{
            $dados = pegaRegSubMenu($_REQUEST["id"]);
        }

        if($dados["result"] == 0){
            ?>  
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD06">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
    ?>

    <div id="titulo">
        <h3>Administração de Menu & Submenu</h3>
        <h4>Edição de Registros</h4> 
    </div>

    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="menuEdit">
            <?php 
                if(isset($_REQUEST["destino"]) && $_REQUEST["destino"] == "menu"){
                    echo "<b>Edição de Registro da Tabela Menu</b><br><br>";
                
            ?>
            <input type="hidden" name="menu_edit" value="1">
            <input type="hidden" name="id" value="<?=$_REQUEST["id"];?>">
            <label for="Folder">Folder</label><br>
            <select name="folder" id="folder" class="formBasico">
                <option value="r" <?php echo $dados['folder'] == 'r' ?"selected":"" ?>>Root</option>
                <option value="v" <?php echo $dados['folder'] == 'v' ?"selected":"" ?>>View</option>
            </select><br>
            <label for="Nome">Nome do Menu</label><br>
            <input type="text" name="nome" value="<?=$dados['nome'];?>" class="formBasico"><br>
            <label for="url">URL</label><br>
            <input type="text" name="url" value="<?=$dados['url'];?>" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" <?php echo $dados['status'] == 1 ? "selected" : ""?>>Ativo</option>
                <option value="0" <?php echo $dados['status'] == 0 ? "selected" : ""?>>Inativo</option>
            </select><br><br>
            <?php 
                }else{
                    echo "<b>Edição de Registro da Tabela do SubMenu</b><br><br>";                     
            ?>
            <input type="hidden" name="submenu_edit" value="1">
            <input type="hidden" name="id" value="<?=$_REQUEST["id"];?>">
            <label for="Folder">Folder</label><br>
            <select name="folder" id="folder" class="formBasico">
                <option value="r" <?php echo $dados['folder'] == 'r' ?"selected":"" ?>>Root</option>
                <option value="v" <?php echo $dados['folder'] == 'v' ?"selected":"" ?>>View</option>
            </select><br>
            
            <label for="Nome">ID menu:</label><br>
            <select name="idmenu" id="idmenu" class="formBasico">
                <?php 
                   require_once "../model/Menu.class.php";
                   $menu = new Menu();
                   $mdados = $menu->pegaTodosMenus(); 
                   for($i = 0;$i < count($mdados);$i++){
                ?>
                    <option value="<?=$mdados[$i]["id"];?>" 
                    <?php 
                        $mdados[$i]['id'] == $dados['idmenu'] ? "selected" : ""
                    ?>>
                        <?php  echo $mdados[$i]['folder'] . " - " . $mdados[$i]['nome'];?>
                    </option>
                <?php 
                    }
                ?>
            </select><br>
            <label for="Nomesub">Nome do SubMenu</label><br>
            <input type="text" name="nomesub" value="<?=$dados['nomesub'];?>" class="formBasico"><br>
            <label for="url">URL</label><br>
            <input type="text" name="url" value="<?=$dados['url'];?>" class="formBasico"><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" <?php echo $dados['status'] == 1 ? "selected" : ""?>>Ativo</option>
                <option value="0" <?php echo $dados['status'] == 0 ? "selected" : ""?>>Inativo</option>
            </select><br><br>
            <?php     
            }
            ?>

            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

</body>
</html>