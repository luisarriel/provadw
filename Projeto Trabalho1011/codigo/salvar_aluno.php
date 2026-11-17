<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$idturma = $_POST['idturma'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "fotos_user/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO tb_aluno (nome, idturma, foto) VALUES (?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "sis", $nome, $idturma, $novo_nome);

mysqli_stmt_execute($comando);

header("Location: form_trabalho.php");
?>