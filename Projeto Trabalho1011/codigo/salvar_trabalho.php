<?php
$nome = $_GET['nometrabalho'];
$valor = $_GET['valor'];
$descricao = $_GET['descricao'];

$sql = "INSERT INTO tb_trabalho (nome, valor, descricao) VALUES ('$nome', '$valor', '$descricao');";

require_once "conexao.php";
mysqli_query($conexao, $sql);

header("Location: form_escolher.php");
?>