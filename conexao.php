<?php
    $hostname = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados = "clientes";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }
    else
        echo "Conectado ao Banco de Dados";


?>
