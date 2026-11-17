<?php
$nome = $_GET['nometurma'];

$sql = "INSERT INTO tb_turma (nome) VALUES ('$nome');";

require_once "conexao.php";
mysqli_query($conexao, $sql);

header("Location: form_aluno.php");
?>