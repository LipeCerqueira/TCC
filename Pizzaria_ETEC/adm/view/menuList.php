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
        function confirmDeleteMenu(id){
            var resp = confirm("Tem certeza que deseja apagar se registro?");
            if(resp == true){
                location.href="../controller/controller.php?menu_delete=1&id=" + id;
            }else{
                return null;
            }
        }

        function confirmDeleteSubmenu(id){
            var resp = confirm("Tem certeza que deseja apagar se registro?");
            if(resp == true){
                location.href="../controller/controller.php?submenu_delete=1&id=" + id;
            }else{
                return null;
            }
        }
    </script>
</head>
<body>
    <div id="titulo">
       <h3>Administração dos Menus e Submenus</h3>
        <h4>Listagem</h4>    
    </div>

    <!-- --------------------------------------------------------------INICIO MENU ---------------------------------------------------------->
    <div id="admTabela">
        <?php 
            require_once "../model/Menu.class.php";
            $menu = new Menu();
            $dados = $menu->listaTabela("menu");
        ?>
        <table class = "tabelaAdm">
            <tr>
                <td style="text-align: left;">
                    <form name="formNew" action="menuNew.php" method="post">
                            <input type="hidden" name="menu" value="ok">
                            <input type="submit" name="sbmt" value="Adicionar Menu" style="background-color: #5cd65c;">
                    </form>
                </td>
            </tr>
        </table>
        <table class = "tabelaAdm">
        <?php 
               if(count($dados)==0){
                echo "<tr><td>A tabela não possui registros do Menu.</tr></td>";
               }else{
            
            ?>
            <tr>
                <th class="tabelaAdmTh">ID</th>
                <th class="tabelaAdmTh">Folder</th>
                <th class="tabelaAdmTh">Nome</th>
                <th class="tabelaAdmTh">URL</th>
                <th class="tabelaAdmTh">Data</th>
                <th class="tabelaAdmTh">Status</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
                for($i = 0;$i < count($dados);$i++){
                    echo "<tr>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["id"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["folder"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["nome"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["url"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["datahora"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">";
                        if($dados[$i]["status"] ==1){
                            echo "Ativo";
                        }else{
                            echo "Inativo";                           
                        }
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <form name="formEdit" action="menuEdit.php" method="post">
                            <input type="hidden" name="id" value="<?=$dados[$i]['id']?>">
                            <input type="hidden" name="destino" value="menu">
                            <input type="submit" name="sbmt" value="Editar" style="background-color: #ffdd99;">
                        </form>
                        <?php
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <button onclick="confirmDeleteMenu(<?=$dados[$i]['id'];?>)"  style="background-color: #ff6666;">Deletar</button>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                }
                }
                ?>
        </table>
        <!------------------------------------------------------------- FIM MENU ------------------------------------------------------------->

        <br><br><br>

        <!---------------------------------------------------------- INICIO SUBMENU ---------------------------------------------------------->

        <div id="admTabela">
        <?php 
            require_once "../model/Menu.class.php";
            $sdados = $menu->listaTabela("submenu");
        ?>
        <table class = "tabelaAdm">
            <tr>
                <td style="text-align: left;">
                    <form name="formNew" action="menuNew.php" method="post">
                            <input type="hidden" name="submenu" value="ok">
                            <input type="submit" name="sbmt" value="Adicionar SubMenu" style="background-color: #5cd65c;">
                    </form>
                </td>
            </tr>
        </table>
        <table class = "tabelaAdm">
        <?php 
               if(count($sdados)==0){
                echo "<tr><td>A tabela não possui registros do Submenu.</tr></td>";
               }else{
            
            ?>
            <tr>
                <th class="tabelaAdmTh">ID</th>
                <th class="tabelaAdmTh">Folder</th>
                <th class="tabelaAdmTh">IdMenu</th>
                <th class="tabelaAdmTh">NomeSub</th>
                <th class="tabelaAdmTh">URL</th>
                <th class="tabelaAdmTh">Data</th>
                <th class="tabelaAdmTh">Status</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
                for($i = 0;$i < count($sdados);$i++){
                    echo "<tr>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["id"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["folder"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["idmenu"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["nomesub"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["url"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$sdados[$i]["datahora"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">";
                        if($sdados[$i]["status"] ==1){
                            echo "Ativo";
                        }else{
                            echo "Inativo";                           
                        }
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <form name="formEdit" action="menuEdit.php" method="post">
                            <input type="hidden" name="id" value="<?=$sdados[$i]['id']?>">
                            <input type="hidden" name="destino" value="submenu">
                            <input type="submit" name="sbmt" value="Editar" style="background-color: #ffdd99;">
                        </form>
                        <?php
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <button onclick="confirmDeleteSubmenu(<?=$sdados[$i]['id'];?>)"  style="background-color: #ff6666;">Deletar</button>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                }
                }
                ?>
        </table>
        <!--------------------------------------------------------- FIM SUBMENU ---------------------------------------------------------------->
        
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