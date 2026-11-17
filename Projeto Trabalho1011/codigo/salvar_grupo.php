<?php
require_once "conexao.php";

$nomegp = $_POST['nomegp'];
$idtrabalho = $_POST['idtrabalho'];
$alunos = $_POST['opcao'];

// Cadastrar o grupo
$sql = "INSERT INTO tb_grupo (nome, idtrabalho) VALUES (?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "si", $nomegp, $idtrabalho);

mysqli_stmt_execute($comando);

// Pegar o ID do grupo
$idgrupo = mysqli_insert_id($conexao);

// Cadastrar os alunos no grupo
foreach ($alunos as $idaluno) {

    $sql = "INSERT INTO tb_aluno_grupo (idaluno, idgrupo) VALUES (?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "ii", $idaluno, $idgrupo);

    mysqli_stmt_execute($comando);
}

header("Location: form_grupo.php");
?>
