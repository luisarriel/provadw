<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/formProdutos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupo</title>
</head>
<body>
    <div>

        <form action="form_grupo.php" method="GET">

            <p>Trabalho:</p>
            <select name="idtrabalho">
                <?php
                    require_once "conexao.php";

                    $sql = "SELECT * FROM tb_trabalho";

                    $comando = mysqli_prepare($conexao, $sql);

                    mysqli_stmt_execute($comando);

                    $resultados = mysqli_stmt_get_result($comando);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $idtrabalho = $linha['idtrabalho'];
                        $nome = $linha['nome'];

                        echo "<option value='$idtrabalho'>$nome</option>";
                    }
                ?>
            </select>

            <p>Turma:</p>
            <select name="idturma">
                <?php
                    $sql = "SELECT * FROM tb_turma";

                    $comando = mysqli_prepare($conexao, $sql);

                    mysqli_stmt_execute($comando);

                    $resultados = mysqli_stmt_get_result($comando);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $idturma = $linha['idturma'];
                        $nome = $linha['nome'];

                        echo "<option value='$idturma'>$nome</option>";
                    }
                ?>
            </select>

            <input type="submit" value="Listar">

        </form>

        <form action="salvar_grupo.php" method="POST">

            <p>Nome do Grupo:</p>
            <input type="text" name="nomegp">

            <p>Alunos da Turma:</p>

            <?php
                if (isset($_GET['idturma'])) {

                    $idturma = $_GET['idturma'];
                    $idtrabalho = $_GET['idtrabalho'];

                    $sql = "SELECT * FROM tb_aluno WHERE idturma = ?";

                    $comando = mysqli_prepare($conexao, $sql);

                    mysqli_stmt_bind_param($comando, "i", $idturma);

                    mysqli_stmt_execute($comando);

                    $resultados = mysqli_stmt_get_result($comando);

                    while ($linha = mysqli_fetch_array($resultados)) {
                        $idaluno = $linha['idaluno'];
                        $nome = $linha['nome'];

                        echo "<input type='checkbox' name='opcao[]' value='$idaluno'> $nome <br>";
                    }

                    echo "<input type='hidden' name='idtrabalho' value='$idtrabalho'>";
                }
            ?>

            <br>
            <input type="submit" value="Salvar">

        </form>

    </div>
</body>
</html>
