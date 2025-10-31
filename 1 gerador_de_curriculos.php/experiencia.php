<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST['empresa'];
    $cargo = $_POST['cargo'];
    $data_de_inicio = $_POST['data_de_inicio'];
    $data_de_enceramento = $_POST['data_de_enceramento'];

    // Inserir os dados na tabela correta
    $sql = "INSERT INTO experiencia (empresa, cargo, data_de_inicio, data_de_enceramento)
            VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $empresa, $cargo, $data_de_inicio, $data_de_enceramento);

    if ($stmt->execute()) {
        echo "Experiência cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar experiência: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="experiencia.css">
    <title>Experiência Profissional</title>
</head>
<body>
    <a href="tela_inicial.php"><button>Voltar</button></a><br><br>
    <div id="div1">
        <h1>Currículos Classe A</h1>
        <h2>Informações do Usuário</h2>

        <form action="experiencia.php" method="post">
            <div class="campo">
                <label for="empresa">Empresa onde trabalhou:</label>
                <input type="text" id="empresa" name="empresa" placeholder="Digite o nome da empresa" required>
            </div>

            <div class="campo">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" placeholder="Digite seu cargo" required>
            </div>

            <div class="campo">
                <label for="data_de_inicio">Data de início:</label>
                <input type="date" id="data_de_inicio" name="data_de_inicio" required>
            </div>

            <div class="campo">
                <label for="data_de_enceramento">Data de encerramento:</label>
                <input type="date" id="data_de_enceramento" name="data_de_enceramento" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>