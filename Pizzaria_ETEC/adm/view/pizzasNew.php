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
            location.href = "pizzasList.php";
        }

        function enviarForm(){
           if(document.pizzasNew.nome.value == "" || document.pizzasNew.nome.value.length < 5){
                alert("preencha campo NOME corretamente");
                document.pizzasNew.nome.focus();
                return false;
           }
           
           if(document.pizzasNew.ingredientes.value == "" || document.pizzasNew.ingredientes.value.length < 5){
                alert("preencha campo INGREDIENTES corretamente");
                document.pizzasNew.ingredientes.focus();
                return false;
           }

           if(document.pizzasNew.preco_med.value == ""){
                alert("preencha campo PREÇO da pizza média corretamente");
                document.pizzasNew.preco_med.focus();
                return false;
           }

           if(document.pizzasNew.preco_gra.value == ""){
                alert("preencha campo PREÇO da pizza grande corretamente");
                document.pizzasNew.preco_gra.focus();
                return false;
           }

           if(document.pizzasNew.desc_promocao.value.length < 3){
                var str = document.pizzasNew.desc_promocao.value;
                var result = str.indexOf("%") > -1;
                if(result == true){
                    alert("Não coloque porcentagem no desconto promocional!");
                    document.pizzasNew.desc_promocao.focus();
                    return false;
                }     
           }
        
           return true;
        }


    </script>
</head>
<body>
    <div id="titulo">
    <h3>Administração de Produtos - Pizzas</h3>
        <h4>Nova Pizza</h4>  
    </div>

    <div id="admForm">
        <form action="../controller/controller.php" method="post" name="pizzasNew" enctype="multipart/form-data"  onsubmit="return enviarForm()">
            <input type="hidden" name="pizzas_new" value="1">
            <label for="Nome">Nome:</label><br>
            <input type="text" name="nomepizza" value="" class="formBasico" required><br>
            <label for="Ingredientes">Ingredientes:</label><br>
            <textarea name="ingredientes" style="height:80px;" rows="6" class="formBasico" required></textarea><br><br>
            <label for="pre_med">Preço da Pizza Média</label><br>
            <input type="text" name="pre_med" value="" class="formBasico" required><br>
            <label for="pre_gra">Preço da Pizza Grande</label><br>
            <input type="text" name="pre_gra" value="" class="formBasico" required><br>
            <label for="doce_salgada">Pizza doce ou salgada</label><br>
            <select name="doce_salgada" id="doce_salgada" class="formBasico">
                <option value="1" selected>Salgado</option>
                <option value="0" >Doce</option>
            </select><br><br>
            <label for="promocao">Promoção</label><br>
            <input type="radio" name="promocao" value="0" checked>Sem Promoção<br>
            <input type="radio" name="promocao" value="1">Em Promoção<br><br></br>
            
            <label for="desc_promocao">Desconto de Promoção</label><br>
            <span class="textoExplica">(Desconto serve para pizzas médias e grandes.Use porcentagem, mas não coloque o símbolo.Exemplo: se 13%. Caso não exista desconto, deixe o 'hífen')</span><br>
            <input type="text" name="desc_promocao" value="" class="formBasico"><br><br>

            <label for="novidade">Novidade</label><br>
            <input type="radio" name="novidade" value="0" checked>Não é novidade.<br>
            <input type="radio" name="novidade" value="1" >Sim, é novidade.<br><br>
            
            <label for="img_peq">Imagem Pequena(120x120)</label><br>
            <input type="file" name="img_peq" value="" required><br><br>
            <label for="img_med">Imagem Média(280x280)</label><br>
            <input type="file" name="img_med" value="" required><br><br>
            <label for="img_gra">Imagem Grande (Carousel: 800x400. Máximo 1 mb)</label><br>
            <input type="file" name="img_gra" value="" required><br><br>
            <label for="status">Status</label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" selected>Ativo</option>
                <option value="0" >Inativo</option>
            </select><br><br>
            <input type="submit" name="sbmt" value="Enviar" class="formBasico"><br><br>
        </form>
        <button class="btnVoltar" id="btnVoltar" onclick="voltar();">&larr;</button>
    </div>

</body>
</html>