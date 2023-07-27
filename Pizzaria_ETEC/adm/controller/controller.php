<?php 
session_start();


if(!isset($_SESSION["ADM-ID"])  || empty($_SESSION["ADM-ID"])){

    if(isset($_REQUEST["loginsenha"])){

        if(empty($_REQUEST["login"]) || empty($_REQUEST["senha"])){
            session_destroy();
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR01">
                </form>
                <script>
                     document.getElementById('myForm').submit();
                </script>
            <?php
                
        }else{//tem dados digitados
            //verificação de anti-injection
            require_once "../model/Ferramentas.php";
            $respLogin = antiInjection($_REQUEST["login"]);
            $respSenha = antiInjection($_REQUEST["senha"]);
            if($respLogin == 0 || $respSenha == 0 ){//tentativa de injection
                session_destroy();
                ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR11">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
                <?php
            }
    
        //autenticando o login e a senha do usuario
        require_once "../model/Ferramentas.php";
        $senhaHash = hash256($_REQUEST["senha"]);
        
        require_once "../model/Manager.php";
        $dados = dadosAdministrador($_REQUEST["login"], $senhaHash);
        if($dados["result"] == 1){//tudo certo
            $_SESSION["ADM-ID"] = $dados["id"];
            $_SESSION["ADM-NOME"] = $dados["nome"];
            $_SESSION["ADM-EMAIL"] = $dados["email"];
            $_SESSION["ADM-PODER"] = $dados["poder"];

            ?>
                <form action="../view/adm.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="result" value= "validade">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 

            

        }else{
            session_destroy();
            ?>
                <form action="../index.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR02">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
            }
        }
    }

}else{// POSSUI SESSÃO

  if(isset($_REQUEST["adm_new"])){
    $dados["nome"] = $_REQUEST["nome"];
    $dados["email"] = $_REQUEST["email"];
    require_once "../model/Ferramentas.php"; 
    $dados["senha"] = hash256($_REQUEST["senha"]);
    $dados["poder"] = $_REQUEST["poder"];
    $dados["status"] = $_REQUEST["status"];
    require_once  "../model/Manager.php";
    $resp = admNew($dados);
    if($resp==1){//tudo certo
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 
    }else{//ERRO DE INSERT
        ?>
            <form action="..admList/.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD02">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 

    }
  }  

  if(isset($_REQUEST["adm_edit"])){
    $dados["id"] = $_REQUEST["id"];
    $dados["nome"] = $_REQUEST["nome"];
    $dados["email"] = $_REQUEST["email"];
    $dados["senha"] = "";
    if(isset($_REQUEST["senha"]) || $_REQUEST["senha"] !=""){
        require_once "../model/Ferramentas.php"; 
        $dados["senha"] = hash256($_REQUEST["senha"]);
    }
    $dados["poder"] = $_REQUEST["poder"];
    $dados["status"] = $_REQUEST["status"];
    require_once  "../model/Manager.php";
    $resp = admEdit($dados);
    if($resp==1){//tudo certo
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 
    }else{//ERRO DE INSERT
        ?>
            <form action="../admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD02">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 

    }

  }

  if(isset($_REQUEST["adm_delete"])){
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = admDelete($id);
    if($result==1){//tudo certo
        ?>
            <form action="../view/admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD54">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 
    }else{//falha ao deletar
        ?>
            <form action="../admList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD04">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 
  }

}
    if(isset($_REQUEST["adm_mudarSenha"])){
        if($_REQUEST["senha1"] == "" || $_REQUEST["senha2"] == ""){
            ?>
                <form action="../view/admChangePassw.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR01">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }

        if($_REQUEST["senha1"] != $_REQUEST["senha2"]){
            ?>
                <form action="../view/admChangePassw.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "FR04">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }

        $dados["id"] = $_REQUEST["id"];
        require_once "../model/Ferramentas.php"; 
        $dados["senha"] = hash256($_REQUEST["senha1"]);  
        require_once "../model/Manager.php";
        $result = admMudarSenha($dados);
        
        if($result==1){//tudo certo
            ?>
                <form action="../view/admList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD50">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }else{//falha ao deletar
            ?>
                <form action="../admList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD03">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
      }
    }

    if(isset($_REQUEST["menu_new"])){
        $dados["folder"] = "v";
        $dados["nome"] = $_REQUEST["nome"];
        $dados["url"] = $_REQUEST["url"];
        $dados["status"] = $_REQUEST["status"];
        $dados["replica"] = $_REQUEST["replica"];
        require_once "../model/Manager.php";
        $resp = menuNew($dados);
        if($resp == 1){//tudo certo
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD50">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 

        }else{//falha
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD02">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
    }

    if(isset($_REQUEST["submenu_new"])){
        $dados["idmenu"] = $_REQUEST["idmenu"];
        $dados["folder"] = "v";
        $dados["nomesub"] = $_REQUEST["nomesub"];
        $dados["url"] = $_REQUEST["url"];
        $dados["status"] = $_REQUEST["status"];
        $dados["replica"] = $_REQUEST["replica"];
        require_once "../model/Manager.php";
        $resp = submenuNew($dados);
        if($resp == 1){//tudo certo
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD50">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 

        }else{//falha
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD02">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
    }

    if(isset($_REQUEST["menu_edit"])){
        $dados["id"] = $_REQUEST["id"];
        $dados["folder"] = $_REQUEST["folder"];
        $dados["nome"] = $_REQUEST["nome"];
        $dados["url"] = $_REQUEST["url"];
        $dados["status"] = $_REQUEST["status"];
        require_once "../model/Manager.php";
        $resp = menuEdit($dados);
        if($resp == 1){//tudo certo
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD53">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 

        }else{//falha
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD03">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
    }

    if(isset($_REQUEST["submenu_edit"])){
        $dados["id"] = $_REQUEST["id"];
        $dados["folder"] = $_REQUEST["folder"];
        $dados["idmenu"] = $_REQUEST["idmenu"];
        $dados["nomesub"] = $_REQUEST["nomesub"];
        $dados["url"] = $_REQUEST["url"];
        $dados["status"] = $_REQUEST["status"];
        require_once "../model/Manager.php";
        $resp = submenuEdit($dados);
        if($resp == 1){//tudo certo
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD53">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 

        }else{//falha
            ?>
                <form action="../view/menuList.php" name="form" id="myForm" method="post">
                    <input type="hidden" name="msg" value= "BD03">
                </form>
                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php 
        }
    }
}


if(isset($_REQUEST["menu_delete"])){
    require_once "../model/Manager.php";
    $resp = menuDelete($_REQUEST["id"]);
    if($resp == 1){
        ?>
            <form action="../view/menuList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD54">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
    }else{
        ?>
            <form action="../view/menuList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD04">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}

if(isset($_REQUEST["submenu_delete"])){
    require_once "../model/Manager.php";
    $resp = submenuDelete($_REQUEST["id"]);
    if($resp == 1){
        ?>
            <form action="../view/menuList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD54">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
    }else{
        ?>
            <form action="../view/menuList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "BD04">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}

if(isset($_REQUEST["pizzasNew"])){
    require_once "../model/Manager.php";
    require_once "../model/Ferramentas.php";
    if($_REQUEST["nome"] == "" || $_REQUEST["ingredientes"] == "" || $_REQUEST["preco_med"] == "" || $_REQUEST["preco_gra"] == "" || $_FILES["img_peq"] == "" || $_FILES["img_med"] == "" || $_FILES["img_gra"] == ""   ){
        ?>
            <form action="../view/pizzasList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "FR01">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php  
    }

    if($_FILES["img_gra"]["size"] > 1000000){
        ?>
            <form action="../view/pizzasList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "FR17">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php 
    }

    $extPeq = validaExtImg($_FILES["img_peq"]["name"]);
    $extMed = validaExtImg($_FILES["img_med"]["name"]);
    $extGra = validaExtImg($_FILES["img_gra"]["name"]);

    if($extPeq == 0 || $extMed == 0 || $extGra == 0){
        ?>
            <form action="../view/pizzasList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value= "FR19">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
    }


    $nome = $_REQUEST["nome"];
    $ingredientes = $_REQUEST["ingredientes"];
    $preco_med = str_replace(",", ".",$_REQUEST["preco_med"]);
    $preco_gra = str_replace(",", ".",$_REQUEST["preco_gra"]);
    $doce_salgado = $_REQUEST["doce_salgado"];
    $promocao = $_REQUEST["promocao"];
    $desc_promocso = $_REQUEST["desc_promocao"];
    $novidade = $_REQUEST["novidade"];


    //pizza_peq_xxxxxxxx_120X120 . ext

    $str = geradorStringRandom(8);
    $extPeq = pegaExtensao($_FILES["Img_peq"]["name"]);
    $extMed = pegaExtensao($_FILES["Img_med"]["name"]);
    $extGra = pegaExtensao($_FILES["Img_gra"]["name"]);
    $img_peq_name = "pizza_" . $str . "_120X120." . $extPeq;
    $img_med_name = "pizza_" . $str . "_280X280." . $extMed;
    $img_gra_name = "pizza_" . $str . "_800X400." . $extGra;
    $imgPath = "../../view/imgPizzas";

    move_uploaded_file($_FILES["img_peq"]["tmp_name"],$imgPath . $img_peq_name);
    move_uploaded_file($_FILES["img_med"]["tmp_name"],$imgPath . $img_med_name);
    move_uploaded_file($_FILES["img_gra"]["tmp_name"],$imgPath . $img_gra_name);

}
   
?>