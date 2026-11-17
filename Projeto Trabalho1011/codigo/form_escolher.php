<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/formProdutos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha de trabalho</title>
</head>
<body>
    <div>
        <form action="form_grupo.php" method="GET">
            <p>Trabalho:</p>
            <select name="trabalho">
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
            <input type="submit" value="Avançar">         
        </form>
    </div>
</body>

</html>