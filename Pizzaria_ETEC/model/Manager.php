<?php

function pegaMenusSubmenus($folder){
    require_once "Conexao.php";
    $sql = "SELECT menu.id AS menuId, menu.nome AS menuNome, menu.url AS menuURL, submenu.idmenu AS subId, submenu.nomesub AS subNome, submenu.url AS subURL FROM menu INNER JOIN submenu ON menu.id = submenu.idmenu WHERE menu.folder = '{$folder}' AND menu.status = 1";
    $result =$conn->query($sql);
    $dados = array();
    if($result ->num_rows > 0){   
        $dados["result"] = 1;
        $i = 0;
        while($row = $result->fetch_assoc()){
            $dados[$i]["menuId"] = $row["menuId"];
            $dados[$i]["menuNome"] = $row["menuNome"];
            $dados[$i]["menuURL"] = $row["menuURL"];
            $dados[$i]["subId"] = $row["subId"];
            $dados[$i]["subNome"] = $row["subNome"];
            $dados[$i]["subURL"] = $row["subURL"];
            $i++;
        }

        $sql = "SELECT MAX(ID) from menu";
        $r = $conn->query($sql);
        $row = $r->fetch_assoc();
        $dados["num"] = $row["MAX(ID)"];
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}


?>