<?php
/*
$cookie_name = "userPizzaEtec";
if(!isset($_COOKIE[$cookie_name])){
    $cookie_name = "userPizzaEtec";
    require_once "model/Ferramentas.class.php";
    $ferr = new Ferramentas();
    $codigoProvCli = $ferr->textoRandomico(10);
    setcookie($cookie_name,$codigoProvCli,time() + (60 * 60),"/");
    echo "Cookie 1 - " . $cookie_name . " está funcionando! ";
}else{
    echo "Cookie 2 - " . $_COOKIE[$cookie_name] . " está funcionando! ";
}
*/

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="view/img/pizzaria_etec_ico.png">
    <title>Pizzaria ETEC</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/estilo2.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">



</head>

<body>

    <div class="container">
        <header>
            <div class="row" style="height: 135px">
                <div class="col-5 pt-4 pl-4">
                    <!-- LOGO -->
                    <img src="view/img/logo_pizza_etec_white.png" alt="logo Pizza Etec">
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
                                            <a href="view/cli_recupass.php">Esqueci minha senha</a> &nbsp; &nbsp; | &nbsp; &nbsp;
                                            <a href="view/cli_register.php">Registrar-se</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Modal -->
                            
                        </div>
                        <!--  FIM login-->


                        <!-- botões login e inscreva-se -->
                        <div class="col-3" sytle="height: 62px;">
                        <button  class="mb-1" alt="Usuario" data-toggle="modal" data-target="#ModalLogin" style="background-color: transparent; border: 1px solid #EEE; cursor: pointer; color: white; font-size: 11px;">Login</button>
                        <br>
                        <a href="view/cli_register.php"><button style="background-color: transparent; border: 1px solid #EEE; cursor: pointer; color: white; font-size: 11px;">Inscreva-se</button></a>
                        </div>
                        <!-- FIM botões login e inscreva-se -->

                        <div class="col-12 pt-4" sytle="height: 62px;">
                            <!-- Menu-->
                            <center>
                            <?php 
                                require_once "model/Manager.php";
                                $dados = pegaMenusSubmenus("r");

                                $keyMenu = array();
                                $keySub = array();

                                if($dados["num"] > 0){
                                    for($i = 0;$i < $dados["num"]; $i++ ){//laço menu
                                        if(isset($dados[$i]["menuId"])){
                                            $reMenu = array_search($dados[$i]["menuNome"],$keyMenu,true);
                                            if($reMenu == ""){
                                                print "<div class='dropdown'>";
                                                print "<a class = 'header dropbtn' href='".$dados[$i]["menuURL"] ."'>" . $dados[$i]["menuNome"] . "</a>";
                                                $keyMenu[$i] = $dados[$i]["menuNome"];
                                                $drop = 0;
                                                for($ii = 0; $ii < $dados["num"];$ii++){
                                                    if(isset($dados[$ii]["subId"])){
                                                    $reSub = array_search($dados[$ii]["subURL"],$keySub,true);
                                                        if($dados[$i]["menuId"] == $dados[$ii]["subId"] && $reSub == ""){
                                                            if($drop == 0){
                                                                print "<div class='dropdown-content'>";
                                                                $drop = 1;
                                                            }
                                                        print "<a href='".$dados[$ii]["subURL"]. "'>" . $dados[$ii]["subNome"]. "</a>";
                                                        $keySub[$i] = $dados[$ii]["subNome"];
                                                        
                                                        }
                                                    }
                                                    
                                                }
                                                if($drop == 1){
                                                    print "</div>";
                                                }
                                                print "</div>";
                                                print"<img src='view/img/point_icon.png'>";

                                            }
                                        }
                                    }
                                }
                            ?>
                            <div class="dropdown">
                                <a class="header dropbtn" href="view.contato.php" >Contato</a>
                            </div>
                            </center>
                            <!-- fim Menu-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Carousel -->
        <div class="row">
            <div class="col-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicadores -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Lista de slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="view/img/pizza_01_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>

                        <div class="carousel-item">
                            <img src="view/img/pizza_02_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>

                        <div class="carousel-item">
                            <img src="view/img/pizza_03_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>
                        <div class="carousel-item">
                            <img src="view/img/pizza_04_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>
                        <div class="carousel-item">
                            <img src="view/img/pizza_05_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>
                        <div class="carousel-item">
                            <img src="view/img/pizza_06_800x400.png" alt="Pizza" class="d-block w-100" width="600">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- FIM Carousel -->

        <!-- Barra Temos a verdadeira pizza italiana -->
        <div class="row">
            <div class="col-9 p-4" style="height: 120px; background-color: #EEEBE3; font-family: Arial, Helvetica, sans-serif; font-size: 22pt; color:#fd7506">
                <center>Venha! Produzimos a verdadeira pizza italiana! <br>Clique e confira!</center>
            </div>
            <div class="col-3 p-4" style="height: 120px; background-color: #EEEBE3;">
                <center><button type="button" class="p-3 rounded shadow" style="background-color: #fd7506; border: 0; cursor: pointer;">Conferir</button></center>
            </div>
        </div>

        <!-- FIM - Barra Temos a verdadeira pizza italiana -->
        <!-- Produtos -->
        <div class="row">
            <div class="col-4 pt-4" style="background-color: #291F20; height: 400px; text-align: center; color: white;"><img src="view/img/service-icon-1_0.png"><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus assumenda cumque, sed sunt animi modi doloremque sequi ab, neque totam earum ducimus molestiae nesciunt facilis adipisci dolorem
                unde est alias.<br><br><button type="button" class="p-1 rounded shadow" style="color: #fd7506; border: 0; cursor: pointer; background-color: #444;">Saiba mais</button></div>
            <div class="col-4 pt-4" style="background-color: #291F20; height: 400px; text-align: center; color: white;"><img src="view/img/service-icon-2.png"><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium porro cum quos aperiam rem ad, a consequatur cupiditate veritatis eius voluptatibus, ex, aliquam facere quia quam atque ipsam.
                Fugit, blanditiis.<br><br><button type="button" class="p-1 rounded shadow" style="color: #fd7506; border: 0; cursor: pointer; background-color: #444;">Saiba mais</button></div>
            <div class="col-4 pt-4" style="background-color: #291F20; height: 400px; text-align: center; color: white;"><img src="view/img/service-icon-3.png"><br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum qui voluptates deserunt iusto eum obcaecati distinctio a exercitationem, neque suscipit numquam facilis consequuntur eveniet
                magnam, natus veritatis, ipsam excepturi iste.<br><br><button type="button" class="p-1 rounded shadow" style="color: #fd7506; border: 0; cursor: pointer; background-color: #444;">Saiba mais</button></div>
        </div>
        <!-- FIM Produtos -->
        <!-- Promoções -->
        <div class="row" style="height: 380px; background-color: #EEEBE3; font-family: Arial, Helvetica, sans-serif; font-size: 22pt; color:#fd7506">
            <div class="col-12 pt-3" style="font-family: Arial, Helvetica, sans-serif; font-size: 14pt; padding-left: 110px;">PROMOÇÕES</div>
            <div class="col-4 pt-3 pb-3" style="font-family: Arial, Helvetica, sans-serif; font-size: 16pt;">
                <center><img src="view/img/pz_01_170x170.png" alt="Promoção" class="rounded-circle" style="border: 5px solid #FFFFFF;"><br>Mussarela<br><br><button type="button" class="btn-danger rounded shadow" style="cursor: pointer;">Comprar</button></center>
            </div>
            <div class="col-4 pt-3 pb-3" style="font-family: Arial, Helvetica, sans-serif; font-size: 16pt;">
                <center><img src="view/img/pz_02_170x170.png" alt="Promoção" class="rounded-circle" style="border: 5px solid #FFFFFF;"><br>Do Chef<br><br><button type="button" class="btn-danger rounded shadow" style="cursor: pointer;">Comprar</button></center>
            </div>
            <div class="col-4 pt-3 pb-3" style="font-family: Arial, Helvetica, sans-serif; font-size: 16pt;">
                <center><img src="view/img/pz_06_170x170.png" alt="Promoção" class="rounded-circle" style="border: 5px solid #FFFFFF;"><br>Tomato<br><br><button type="button" class="btn-danger rounded shadow" style="cursor: pointer;">Comprar</button></center>
            </div>
        </div>
        <!-- FIM Promoções -->
        <!-- Crie Sabor -->
        <div class="row bg-white" style="height: 360px;">
            <div class="col-5 pt-4">
                <center><span class="badge badge-warning">Crie seu sabor:</span><br><br><img src="view/img/seu_sabor_04.jpg" width="350"></center>
            </div>
            <div class="col-2" style="padding-top: 160px;">
                <center><button type="button" class="btn-dark rounded shadow" style="cursor: pointer;">Crie Agora</button></center>
            </div>
            <div class="col-5 pt-4">
                <center>
                    <span class="badge badge-warning">Crie seu sabor:</span><br><br>
                    <img src="view/img/seu_sabor_03.jpg" alt="Seu sabor" width="350">
                </center>
            </div>
        </div>

        <!-- FIM Crie Sabor -->
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
    <script src="view/js/jquery-3.3.1.slim.min.js"></script>
    <script src="view/js/popper.min.js"></script>
    <script src="view/js/bootstrap.min.js"></script>

</body>

</html>