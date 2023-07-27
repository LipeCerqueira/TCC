<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="img/pizzaria_etec_ico.png">
    <title>Pizzaria ETEC</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">




</head>

<body>

    <div class="container">
        <header>
            <div class="row" style="height: 135px">
                <div class="col-5 pt-4 pl-4">
                    <!-- LOGO -->
                    <img src="img/logo_pizza_etec_white.png" alt="logo Pizza Etec">
                </div>
                <div class="col-7 pt-4">
                    <!-- cesta/login e menu -->
                    <div class="row">
                        <div class="col-5" sytle="height: 62px;">
                            <!-- cesta -->
                            <center><button alt="logo Pizza Etec" style="background-color: transparent; border: 0; cursor: pointer;"><i class="fas fa-shopping-cart fa-2x" style="color:white;"></i><span class="badge badge-danger">4</span></button></center>
                        </div>
                        <div class="col-4 text-right" sytle="height: 62px;">
                            <!--  login-->
                            <button alt="Usuario" data-toggle="modal" data-target="#ModalLogin" style="background-color: transparent; border: 0; cursor: pointer;"><i class="far fa-user fa-2x" style="color:white;"></i></button>
                            </i>

                            <!-- Modal -->
                            <div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">Login</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" id="loginUser" method="POST">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Endereço de email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
                                                    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Senha</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                                </div>
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Lembre-se de mim.</label><br>

                                                </div>
                                                <button type="submit" class="btn btn-primary">Logar</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="cli_recupass.php">Esqueci minha senha</a> &nbsp; &nbsp; | &nbsp; &nbsp;
                                            <a href="cli_register.php">Registrar-se</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- botões login -->
                        <div class="col-3" sytle="height: 62px;">
                        <button  class="mb-1" alt="Usuario" data-toggle="modal" data-target="#ModalLogin" style="background-color: transparent; border: 1px solid #EEE; cursor: pointer; color: white; font-size: 11px;">Login</button>
                        <br><br>
                        
                        </div>
                        <!-- FIM botões login  -->
                        <div class="col-12 pt-4" sytle="height: 62px;">
                            <!-- Menu-->
                            <center>
                                <a class="header" href="../index.php">Início</a> <img src="img/point_icon.png"> <a class="header" href="#">Pizzas</a> <img src="img/point_icon.png"> <a class="header" href="#">Bebidas</a> <img src="img/point_icon.png"> <a class="header"
                                    href="#">Outros Produtos</a> <img src="img/point_icon.png"> <a class="header" href="#">Contato</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- Formulário Registro de Novo Cliente -->
        <div class="row">
            <div class="col-2 p-4" style="min-height: 550px; background-color: #EEEBE3; font-family: Arial, Helvetica, sans-serif; font-size: 16pt; color:#fd7506">
                <center>Registre-se</center>
            </div>
            <div class="col-10 p-4" style="min-height: 550px; background-color: #EEEBE3;">
                <?php
                if(!isset($_POST["cod"])){
                ?>
                <!-- INÍCIO FORM STEP 1-->
                <form class="needs-validation" action="../controller/adm_regClient.php" id="cli_register" validate onsubmit="return validaForm(this);" method="post">
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="cod" value="<?=$_COOKIE[$cookie_name];?>">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Primeiro nome</label>
                            <input type="text" class="form-control" id="validationTooltip01" name="nome" placeholder="Nome" value="" required  >
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Sobrenome</label>
                            <input type="text" class="form-control" id="validationTooltip02"  name="sobrenome"  placeholder="Sobrenome" value=""  required>
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipNascimento">Nascimento</label>
                            <div class="input-group">

                                <input type="date" class="form-control"  name="nasc"  id="validationTooltipNascimento" placeholder="Nascimento" aria-describedby="validationTooltipNascimentoPrepend"  required>
                                <div class="invalid-tooltip">
                                    Por favor, insira a data de seu nascimento.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipEmail1">E-mail</label>
                            <input type="email" class="form-control"  name="email1"  id="validationTooltipEmail1" placeholder="E-mail"  required>
                            <div class="invalid-tooltip">
                                Por favor, informe seu e-mail.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipEmail1">E-mail</label>
                            <input type="email" class="form-control"  name="email2"  id="validationTooltipEmail2" placeholder="E-mail"  required>
                            <div class="invalid-tooltip">
                                Por favor, informe seu e-mail.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltipPassword">Senha</label>
                            <input type="password" class="form-control"  name="password"  id="validationTooltipPassword" placeholder="Senha"  required>
                            <div class="invalid-tooltip">
                                Por favor, informe sua senha.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipCPF">CPF</label>
                            <input type="number" class="form-control"  name="cpf" id="validationTooltipCPF" placeholder="CPF" value=""   required>
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipGenero">Gênero</label><br>
                            <input type="radio"  name="genero" id="gridRadios1" value="masc" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Masculino
                            </label>
                            <input type="radio" name="genero" id="gridRadios1" value="fem">
                            <label class="form-check-label" for="gridRadios1">
                                Feminino
                            </label>
                        </div>


                    </div>
                    <button class="btn btn-primary" type="submit" onclick="sendMeail()">Enviar</button>
                </form>


                    <!-- FIM FORM STEP 1--> 
                <?php

                }elseif(isset($_POST["cod"]) && $_POST["step"] == 1){ // retorno de informação devido a injection

                    

                ?>
                <!-- INÍCIO FORM STEP 1 COM RETORNO DE INJECTION -->


                <form class="needs-validation" action="../controller/adm_regClient.php" id="cli_register" validate onsubmit="return validaForm(this);" method="post">
                <input type="hidden" name="step" value="1">
                <input type="hidden" name="cod" value="<?php print $_COOKIE[$cookie_name];?>">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Primeiro nome</label>
                            <input type="text" class="form-control" id="validationTooltip01" name="nome" placeholder="Nome" value="<?php print $_POST["nome"];?>"  >
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Sobrenome</label>
                            <input type="text" class="form-control" id="validationTooltip02"  name="sobrenome"  placeholder="Sobrenome" value="<?php print $_POST["sobrenome"];?>"  >
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipNascimento">Nascimento</label>
                            <div class="input-group">

                                <input type="date" class="form-control"  name="nasc"  id="validationTooltipNascimento" placeholder="Nascimento" aria-describedby="validationTooltipNascimentoPrepend" value="<?php print $_POST["nasc"];?>"  >
                                <div class="invalid-tooltip">
                                    Por favor, insira a data de seu nascimento.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipEmail1">E-mail</label>
                            <input type="email" class="form-control"  name="email1"  id="validationTooltipEmail1" placeholder="E-mail" value="<?php print $_POST["email1"];?>" >
                            <div class="invalid-tooltip">
                                Por favor, informe seu e-mail.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipEmail1">E-mail</label>
                            <input type="email" class="form-control"  name="email2"  id="validationTooltipEmail2" placeholder="E-mail" value="<?php print $_POST["email2"];?>" >
                            <div class="invalid-tooltip">
                                Por favor, informe seu e-mail.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltipPassword">Senha</label>
                            <input type="password" class="form-control"  name="password"  id="validationTooltipPassword" placeholder="Senha"  value="<<?php print $_POST["password"];?>">
                            <div class="invalid-tooltip">
                                Por favor, informe sua senha.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipCPF">CPF</label>
                            <input type="number" class="form-control"  name="cpf" id="validationTooltipCPF" placeholder="CPF" value="<?php print $_POST["cpf"]; ?>"   >
                            <div class="valid-tooltip">
                                Tudo certo!
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipGenero">Gênero</label><br>
                            <input type="radio"  name="genero" id="gridRadios1" value="masc" <?php if($_POST['genero'] == "masc"){ print "checked";}  ?>>
                            <label class="form-check-label" for="gridRadios1">
                                Masculino
                            </label>
                            <input type="radio" id="gridRadios1" value="fem" <?php if($_POST['genero'] == "fem"){ print "checked"; } ?>>
                            <label class="form-check-label" for="gridRadios1">
                                Feminino
                            </label>
                        </div>


                    </div>
                    <button class="btn btn-primary" type="submit" onclick="sendMeail()">Enviar</button>
                </form>

                <!-- FIM FORM STEP 1 COM RETORNO DE INJECTION -->
                <?php

                    

                }elseif(isset($_GET["cod"]) && $_GET["step"] == 2){
                    /*
                        retirar as informações de "tbl_cliente_temp" e passar para "tbl_cliente" e "tbl_cliente_email" e apagar dados do usuario temporário da tabela "tbl_cliente_temp";
                    */
                    $cod = $_GET["cod"];
                    print $cod;
                    ?>
                    <!-- FORM DE ENDEREÇO E TELEFONE DO CLIENTE -->
                    olá novo cliente! 
                    <?php

                }else{
                    print "ERRO DE GET OU POST";
                }
                ?>
            </div>

        </div>

        <!-- FIM - Formulário Registro de Novo Cliente -->

        <!-- Rodapé -->
        <div class="row" style="height: 250px;">
            <div class="col-6 pt-3 pl-5">Direitos Resevados &copy; 2021</div>
            <div class="col-6 pt-3 pr-5" style="text-align: right;">
                <i class="fab fa-twitter-square fa-2x"></i>
                <i class="fab fa-google-plus-square fa-2x"></i>
                <i class="fab fa-facebook-square fa-2x"></i>
                <i class="fas fa-share-alt-square fa-2x"></i>
            </div>
        </div>
        <!-- FIM Rodapé -->
        <!-- FIM do container -->
    </div>



    <!-- Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script>


    function isValidCPF(cpf) {
        if (typeof cpf !== "string") return false
        cpf = cpf.replace(/[\s.-]*/igm, '')
        if (
            !cpf ||
            cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999" 
        ) {
            return false
        }
        var soma = 0
        var resto
        for (var i = 1; i <= 9; i++) 
            soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i)
        resto = (soma * 10) % 11
        if ((resto == 10) || (resto == 11))  resto = 0
        if (resto != parseInt(cpf.substring(9, 10)) ) return false
        soma = 0
        for (var i = 1; i <= 10; i++) 
            soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i)
        resto = (soma * 10) % 11
        if ((resto == 10) || (resto == 11))  resto = 0
        if (resto != parseInt(cpf.substring(10, 11) ) ) return false
        return true
    }

    function validaForm(frm) {

    //Verifica se o campo nome foi preenchido e
    //contém no mínimo três caracteres.
    if(frm.nome.value == "" || frm.nome.value == null || frm.nome.value.lenght < 3) {
        alert("Por favor, escreva o seu nome.");
        frm.nome.focus();
        return false;
    }

    if(frm.sobrenome.value == "" || frm.sobrenome.value == null || frm.sobrenome.value.lenght < 3) {
        alert("Por favor, escreva seu sobrenome.");
        frm.sobrenome.focus();
        return false;
    }

    if(frm.nasc.value == "" || frm.nasc.value == null || frm.nasc.value.lenght < 3) {
        alert("Por favor, informe sua data de nascimento.");
        frm.sobrenome.focus();
        return false;
    }

    //o campo e-mail precisa de conter: "@", "." e não pode estar vazio
    if(frm.email1.value.indexOf("@") == -1 ||
      frm.email1.value == "" ||
      frm.email1.value == null) {
        alert("Por favor, indique um e-mail válido.");
        frm.email1.focus();
        return false;
    }


    if(frm.email2.value.indexOf("@") == -1 ||
      frm.email2.value == "" ||
      frm.email2.value == null) {
        alert("Por favor, escreva novamente seu e-mail.");
        frm.email2.focus();
        return false;
    }else{
        if(frm.email2.value != frm.email1.value){
            alert("Os e-mails informados são diferentes. Por favor, corrija!");
            return false;
        }
    }


    if(frm.password.value == "" || frm.password.value == null || frm.password.value.length < 6){
        alert("Por favor, informe sua senha com pelo menos seis caracteres");
        frm.password.focus();
        return false;
    }
    
    var cpf = isValidCPF(frm.cpf.value);
    if(cpf == false){
        alert("CPF inválido!");
        frm.cpf.focus();
        return false;
    }
    

    var escolhaGenero = -1; 

    for(x = frm.genero.length -1; x > -1; x--) {
        if(frm.genero[x].checked) {            
           escolhaGenero = x; 
        }
    }

    if(escolhaGenero == -1) {
        alert("Informe seu gênero.");
        frm.genero[0].focus();
        return false;
    }
   
}

</script>

</body>

</html>