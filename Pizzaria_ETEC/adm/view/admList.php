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
        function confirmDelete(id){
            var resp = confirm("Tem certeza que deseja apagar se registro?");
            if(resp == true){
                location.href="../controller/controller.php?adm_delete=1&id=" + id;
            }else{
                return null;
            }
        }
    </script>
</head>
<body>
    <div id="titulo">
       <h3>Administradores do Sistema</h3>
        <h4>Listagem</h4>    
    </div>
    <div id="admTabela">
        <?php 
            require_once "../model/Manager.php";
            $dados = listaAdms();
        ?>
        <table class = "tabelaAdm" st>
            <tr>
                <td style="text-align: left;">
                    <form name="formNew" action="admNew.php" method="post">
                            <input type="hidden" name="new" value="1">
                            <input type="submit" name="sbmt" value="Adicionar Administrador" style="background-color: #5cd65c;">
                      
                    </form>
                </td>
            </tr>
        </table>
        <table class = "tabelaAdm">
            <tr>
                <th class="tabelaAdmTh">ID</th>
                <th class="tabelaAdmTh">Nome</th>
                <th class="tabelaAdmTh">Email</th>
                <th class="tabelaAdmTh">Data</th>
                <th class="tabelaAdmTh">Poder</th>
                <th class="tabelaAdmTh">Status</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
                for($i = 1;$i <=$dados["num"];$i++){
                    echo "<tr>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["id"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["nome"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["email"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["datahora"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["poder"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">";
                        if($dados[$i]["status"] ==1){
                            echo "Ativo";
                        }else{
                            echo "Inativo";                           
                        }
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <form name="formEdit" action="admEdit.php" method="post">
                            <input type="hidden" name="id" value="<?=$dados[$i]['id']?>">
                            <input type="submit" name="sbmt" value="Editar" style="background-color: #ffdd99;">
                      
                        </form>
                        <?php
                        echo "</td>";
                        echo "<td>";
                        ?>
                        <button onclick="confirmDelete(<?=$dados[$i]['id'];?>)"  style="background-color: #ff6666;">Deletar</button>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                }
                ?>
        </table>
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