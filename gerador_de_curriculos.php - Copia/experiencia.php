<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST['empresa'];
    $cargo = $_POST['cargo'];
    $data_de_inicio = $_POST['data de inicio'];
    $data_de_enceramento = $_POST['data de enceramento'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (empresa, cargo, data_de_inicio, data_de_enceramento)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $empresa, $cargo, $data_de_inicio, $data_de_enceramento, );

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
    <link rel="stylesheet" href="experiencia.css">
    
    <title>tela de login</title>
 
    <a href="tela_inicial.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>curriculos clase A</h1>
        <h2>informações do usuario</h2>

        <form action="experiencia.php" method="post"> <div class="campo">
                <label for="empresa">empresa onde trabalhou:</label>
                <input type="text" id="empresa" name="empresa" placeholder="Digite o nome da empresa" required>
            </div>

            <div class="campo">
                <label for="cargo">qual foi cargo que ja trabalhou:</label>
                <input type="cargo" id="cargo" name="cargo" placeholder="Digite qual e seu cargo" required>
            </div>

            <div class="campo">
                <label for="data_de_inicio">data que iniciou na empresa:</label>
                <input type="data" id="data_de_inicio" name="data_de_inicio" placeholder="Digite a data de inicio" required>
            </div>

            <div class="campo">
                <label for="data_de_enceramento">data que saiu da empresa:</label>
                <input type="data" id="data_de_enceramento " name="data_de_enceramento" placeholder="Digite a data de enceramento" required>
            </div>

            <button type="submit">proximo</button>
        </form>

    </div>
</body>
</html>