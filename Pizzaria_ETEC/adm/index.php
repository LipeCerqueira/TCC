<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>PIZZA ETEC - ADM</title>
<link rel="icon" type="image/png" sizes="32x32" href="view/img/pizzaria_etec_ico.png">
<link rel="stylesheet" type="text/css" href="view/css/view.css" media="all">
<script type="text/javascript" src="view/js/view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="view/img/top.png" alt="">
	<div id="form_container">
	
		<div id="blackSquare">
		<img src="view/img/logo_pizza_etec.png" alt="">
		</div>
		<form id="form_41480" class="appnitro"  method="post" action="controller/controller.php">
			<input type="hidden" name="loginsenha" value="1">
			<div class="form_description">
				<p>Área Administrativa</p>
			</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="login">Login </label>
		<div>
			<input id="element_1" name="login" class="element text medium" type="email" maxlength="255" value="" required/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="senha">Senha </label>
		<div>
			<input id="element_2" name="senha" class="element text medium" type="password" maxlength="255" value="" required/> 
		</div> 
		</li>
			
		<li class="buttons">
			<input type="hidden" name="form_id" value="41480" />  
			<input id="saveForm" class="button_text" type="submit" name="submit" value="Entrar" />
		</li>
			</ul>
		</form>	
		
	</div>
	<img id="bottom" src="view/img/bottom.png" alt="">

<?php 
if(isset($_REQUEST["msg"])){
	$cod = $_REQUEST["msg"];
	require_once "view/msg.php";
	echo "<script>alert('" . $MSG[$cod] ."');</script>";
}


?>

	</body>
</html>