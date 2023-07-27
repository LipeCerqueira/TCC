<?php

    function dadosAdministrador($email, $senha){
        require_once "Conexao.php";
        $sql = "SELECT * FROM administrador WHERE email = '$email' AND senha = '$senha' AND status = 1";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $dados = array();
            $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
                $dados["id"] = $row["id"];
                $dados["nome"] = $row["nome"];
                $dados["email"] = $row["email"];
                $dados["senha"] = $row["senha"];
                $dados["poder"] = $row["poder"];
            }
            $conn->close();
            return $dados;

        }else{
          $dados["result"] = 0;
          $conn->close();
          return $dados;

        }
    }

    function listaAdms(){
        require_once "Conexao.php";
        $sql = "SELECT * FROM administrador";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados[$i]["id"] = $row["id"];
                $dados[$i]["nome"] = $row["nome"];
                $dados[$i]["email"] = $row["email"];
                $dados[$i]["datahora"] = $row["datahora"];
                $dados[$i]["senha"] = $row["senha"];
                $dados[$i]["poder"] = $row["poder"];
                $dados[$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;

        }else{
          $dados["result"] = 0;
          $conn->close();
          return $dados;

        
        }
    }

    function admNew($dados){
        require_once "Conexao.php";
        $sql = "INSERT INTO administrador (nome,email,senha,datahora,poder,status) VALUES ('{$dados["nome"]}', '{$dados["email"]}','{$dados["senha"]}', now(),'{$dados["poder"]}','{$dados["status"]}')";
        $result = $conn->query($sql);
        if($result == true){
            $conn->close();
            return 1;
        }else{
            $conn->close();
             return 0;   
        }
    }

    function pegaAdm($id){
        require_once "Conexao.php";
        $sql = "SELECT * FROM administrador WHERE id = {$id}";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $dados = array();
            $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
                $dados["id"] = $row["id"];
                $dados["nome"] = $row["nome"];
                $dados["email"] = $row["email"];
                $dados["poder"] = $row["poder"];
                $dados["status"] = $row["status"];

            }
            $conn->close();
            return $dados;
        
        }else{
            $dados["result"] =0;
            $conn->close();
            return $dados;
        }
    }

    function admEdit($dados){
        require_once "Conexao.php";
        $sql = "";
        if(!isset($dados["senha"]) || $dados["senha"] == ""){
            $sql = "UPDATE administrador set nome = '{$dados["nome"]}', email = '{$dados["email"]}',poder = {$dados["poder"]}, status = {$dados["status"]} WHERE id = {$dados["id"]}";
        }else{
            $sql = "UPDATE administrador set nome = '{$dados["nome"]}', email = '{$dados["email"]}',senha= '{$dados["senha"]}',poder = {$dados["poder"]},status = {$dados["status"]} WHERE id = {$dados["id"]}";
        }
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function admDelete($id){
        require_once "Conexao.php";
        $sql="DELETE FROM administrador WHERE id = {$id}";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function admMudarSenha($dados){
        require_once "Conexao.php";
        $sql="UPDATE administrador set senha = '{$dados["senha"]}' WHERE id = {$dados["id"]}";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    
    function menuList(){
        require_once "Conexao.php";
        $sql = "SELECT * FROM menu";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados[$i]["id"] = $row["id"];
                $dados[$i]["folder"] = $row["folder"];
                $dados[$i]["nome"] = $row["nome"];
                $dados[$i]["url"] = $row["url"];
                $dados[$i]["datahora"] = $row["datahora"];
                $dados[$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;

        }else{
          $dados["result"] = 0;
          $conn->close();
          return $dados;

        
        }
     }
    
    function submenuList(){
        require_once "Conexao.php";
        $sql = "SELECT * FROM submenu";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados[$i]["id"] = $row["id"];
                $dados[$i]["folder"] = $row["folder"];
                $dados[$i]["idmenu"] = $row["idmenu"];
                $dados[$i]["nomesub"] = $row["nomesub"];
                $dados[$i]["url"] = $row["url"];
                $dados[$i]["datahora"] = $row["datahora"];
                $dados[$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;

        }else{
          $dados["result"] = 0;
          $conn->close();
          return $dados;

        
        }
     }

     function menuNew($dados){
        require_once "Conexao.php";
        $sql = "INSERT INTO menu(folder,nome,url,datahora,status)VALUES('{$dados["folder"]}', '{$dados["nome"]}', '{$dados["url"]}', now(), '{$dados["status"]}');";
        $result = $conn->query($sql);
        if($result == true){//tudo certo
           
            if(isset($dados["replica"]) && ($dados["replica"] == 1 )){
                $dados["folder"] = "r";
                $dados["url"] = "view/" . $dados["url"];
                $sql = "INSERT INTO menu(folder,nome,url,datahora,status)VALUES('{$dados["folder"]}', '{$dados["nome"]}', '{$dados["url"]}', now(), '{$dados["status"]}');";
                $result = $conn->query($sql);
                
                if($result == true){
                    $conn->close();
                    return 1;
                }
            
            }else{//não é para replicar
                $conn->close();
                return 1;
            }
        
        }else{
            $conn->close();
            return 0;

        }
     }

     function submenuNew($dados){
        require_once "Conexao.php";
        $sql = "INSERT INTO submenu(folder,idmenu,nomesub,url,datahora,status)VALUES('{$dados["folder"]}',{$dados["idmenu"]},'{$dados["nomesub"]}', '{$dados["url"]}', now(), '{$dados["status"]}');";
        $result = $conn->query($sql);
        if($result == true){//tudo certo
           
            if(isset($dados["replica"]) && ($dados["replica"] == 1 )){
                $dados["idmenu"] = $dados["idmenu"] + 1;
                $dados["folder"] = "r";
                $dados["url"] = "view/" . $dados["url"];
                $sql = "INSERT INTO submenu(folder,idmenu,nomesub,url,datahora,status)VALUES('{$dados["folder"]}',{$dados["idmenu"]},'{$dados["nomesub"]}', '{$dados["url"]}', now(), '{$dados["status"]}');";
                $result = $conn->query($sql);
                
                if($result == true){
                    $conn->close();
                    return 1;
                }
            
            }else{//não é para replicar
                $conn->close();
                return 1;
            }
        
        }else{
            $conn->close();
            return 0;

        }
     }

     function pegaRegMenu($id){
        $dados = array();
        require_once "Conexao.php";
        $sql = "SELECT  * FROM menu WHERE id = {$id}";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $dados["result"]  = 1;
            while($row = $result->fetch_assoc()){
                $dados["id"] = $row["id"];
                $dados["folder"] = $row["folder"];
                $dados["nome"] = $row["nome"];
                $dados["url"] = $row["url"];
                $dados["datahora"] = $row["datahora"];
                $dados["status"] = $row["status"];   
            }
            $conn->close();
            return $dados;
        }else{
            $dados["result"]  = 0;
            $conn->close();
            return $dados;
        }

     }


     function pegaRegSubMenu($id){
        $dados = array();
        require_once "Conexao.php";
        $sql = "SELECT  * FROM submenu WHERE id = {$id}";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $dados["result"]  = 1;
            while($row = $result->fetch_assoc()){
                $dados["id"] = $row["id"];
                $dados["folder"] = $row["folder"];
                $dados["idmenu"] = $row["idmenu"];
                $dados["nomesub"] = $row["nomesub"];
                $dados["url"] = $row["url"];
                $dados["datahora"] = $row["datahora"];
                $dados["status"] = $row["status"];     
            }
            $conn->close();
            return $dados;
        }else{
            $dados["result"]  = 0;
            $conn->close();
            return $dados;
        }

     }

     function menuEdit($dados){
        require_once "Conexao.php";
        $sql = "UPDATE menu SET folder = '{$dados["folder"]}', nome = '{$dados["nome"]}', url = '{$dados["url"]}', status = {$dados["status"]} WHERE id = {$dados["id"]}";
        $result = $conn->query($sql);
        if($result == true){//tudo certo
           
            if($dados["status"] == 0){
                $sql = "UPDATE submenu SET status = 0 WHERE id = {$dados["id"]}";
                $result = $conn->query($sql);
                if($result == true){
                    $conn->close();
                    return 1;
                }
            }else{
                $conn->close();
                return 1;
            }

        }else{
            $conn->close();
            return 0;
        }
    }

    function submenuEdit($dados){
        require_once "Conexao.php";
        $sql = "UPDATE submenu SET folder = '{$dados["folder"]}', idmenu = {$dados["idmenu"]}, nomesub = '{$dados["nomesub"]}', url = '{$dados["url"]}', status = {$dados["status"]} WHERE id = {$dados["id"]}";
        $result = $conn->query($sql);
        if($result == true){//tudo certo 
            $conn->close();
                return 1;
        }else{
            $conn->close();
            return 0;
        }
    }

    function menuDelete($id){
        require_once "Conexao.php";
        $sql = "SELECT id FROM submenu WHERE idmenu = {$id}";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $dados = array();
            $i = 0;
            while($row = $result->fetch_assoc()){
                $dados[$id]["id"] = $row["id"];
                $i++;
            }

            for($ii = 0;$ii < $i;$ii++){
                $sql = "DELETE FROM submenu WHERE id = {$dados[$id]["id"]}";
                $result = $conn->query($sql);
            }
            if($result == true){
                $sql = "DELETE FROM menu WHERE id = {$id}";
                $result = $conn->query($sql);
                if($result == true){
                    $conn->close();
                    return 1;
                }else{
                    $conn->close();
                    return 0;
                } 
            }  
        }else{
            $sql = "DELETE FROM menu WHERE id = {$id}";
            $result = $conn->query($sql);
            if($result == true){
                $conn->close();
                return 1;
            }else{
                $conn->close();
                return 0;
            } 
        }
    }


    function submenuDelete($id){
        require_once "Conexao.php";
        $sql = "DELETE FROM submenu WHERE id = {$id}";
        $result = $conn->query($sql);
        if($result == true){
            $conn->close();
            return 1;
        }else{
            $conn->close();
            return 0;
        }
    }

    function listaPizzas(){
        require_once "Conexao.php";
        $sql = "SELECT * FROM pizzas";
        $result = $conn->query($sql);
        $dados= array();
        $i = 0;
        if($result->num_rows > 0){
            $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
                $dados[$i]["id"] = $row["id"];
                $dados[$i]["nome"] = $row["nome"];
                $dados[$i]["ingredientes"] = $row["ingredientes"];
                $dados[$i]["preco_med"] = $row["preco_med"];
                $dados[$i]["preco_gra"] = $row["preco_gra"];
                $dados[$i]["doce_salgado"] = $row["doce_salgado"];
                $dados[$i]["promocao"] = $row["promocao"];
                $dados[$i]["desc_promocao"] = $row["desc_promocao"];
                $dados[$i]["novidade"] = $row["novidade"];
                $dados[$i]["carousel"] = $row["carousel"];
                $dados[$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;
        }else{
            $dados["result"] = 0;
            $conn->close();
            return $dados;

        }
    }
?>