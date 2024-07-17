<?php

header("content-type: text/html;charset=utf-8");

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname ="bancobiblioteca";


//Criar a conexao
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

mysqli_query($conexao, "SET NAMES 'UTF8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

mysqli_query($conn, "SET NAMES 'UTF8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

 ?>
