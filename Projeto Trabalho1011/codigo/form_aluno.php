<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/formProdutos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
</head>
<body>
    <div>
        <form action="salvar_aluno.php" method="POST" enctype="multipart/form-data" >
            <p>Nome do Aluno:</p><input  type="text" name="nome">
            <p>Turma:</p>
            <select name="idturma">
            <?php
                require_once "conexao.php";

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
            <p>Foto:</p><input type="file" name="foto"> <br><br><br> <br>
    

            <input type="submit" value="Salvar">         
        </form>
    </div>
</body>

</html>