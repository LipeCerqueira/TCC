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
        function confirmPizzaDelete(id){
            var resp = confirm("Tem certeza que deseja apagar se registro?\nRecomendamos que apenas mude o 'status' para 'inativo'.");
            if(resp == true){
                location.href="../controller/controller.php?pizzasdelete=1&id=" + id;
            }else{
                return null;
            }
        }
    </script>
</head>
<body>
    <div id="titulo">
       <h3>Administração de Produtos - Pizzas</h3>
        <h4>Listagem</h4>    
    </div>
    <div id="admTabela">
        <?php 
            require_once "../model/Manager.php";
            $dados = listaPizzas();
        ?>
        <table class = "tabelaAdm">
            <tr>
                <td style="text-align: left;">
                    <form name="formNew" action="pizzasNew.php" method="post">
                            <input type="hidden" name="new" value="1">
                            <input type="submit" name="sbmt" value="Adicionar Pizza" style="background-color: #5cd65c;">
                      
                    </form>
                </td>
            </tr>
        </table>
        <table class = "tabelaAdm">
            <?php 
                if($dados["result"]  == 0){
                    echo "<tr><td>Não há registro na base de dados de pizzas!</td></tr>";
                }else{
            ?>
            <tr>
                <th class="tabelaAdmTh">ID</th>
                <th class="tabelaAdmTh">Nome</th>
                <th class="tabelaAdmTh">Ingred</th>
                <th class="tabelaAdmTh">Pr Med</th>
                <th class="tabelaAdmTh">Pr Gra</th>
                <th class="tabelaAdmTh">D/S</th>
                <th class="tabelaAdmTh">Promoção</th>
                <th class="tabelaAdmTh">Desconto %</th>
                <th class="tabelaAdmTh">Novidade</th>
                <th class="tabelaAdmTh">Caros</th>
                <th class="tabelaAdmTh">Status</th>
                <th class="tabelaAdmTh">&nbsp;</th>
                <th class="tabelaAdmTh">&nbsp;</th>
            </tr>
            <?php 
                for($i = 1;$i <=$dados["num"];$i++){
                    echo "<tr>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["id"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["nome"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["ingredientes"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["preco_med"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["preco_gra"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["doce_salgado"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["promocao"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["desc_promocao"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["novidade"]."</td>";
                        echo "<td class=\"tabelaAdmTd\">".$dados[$i]["carousel"]."</td>";
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
                        <button onclick="confirmPizzaDelete(<?=$dados[$i]['id'];?>)"  style="background-color: #ff6666;">Deletar</button>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                }
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