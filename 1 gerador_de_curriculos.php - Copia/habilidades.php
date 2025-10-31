<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habilidades = $_POST['habilidades'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (habilidades,)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $habilidades, );

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="habilidades.css">
    
    <title>tela de login</title>
 
    <a href="tela_inicial.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>curriculos clase A</h1>
        <h2>informações do usuario</h2>

        <form action="habilidades.php" method="post"> <div class="campo">
                <label for="habilidades">digite suas habilidades:</label>
                <input type="text" id="habilidades" name="habilidades" placeholder="Digite suas habilidades" required>
            </div>

          
            <button type="submit">proximo</button>
        </form>
</body>
</html>