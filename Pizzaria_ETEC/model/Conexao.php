<?php

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "db_pizzaria";

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checkando a conexao
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>