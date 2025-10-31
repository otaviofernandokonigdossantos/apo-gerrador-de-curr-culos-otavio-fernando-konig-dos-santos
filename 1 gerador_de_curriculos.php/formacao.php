<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $instituicao = $_POST['instituicao'] ?? null;
    $curso = $_POST['curso'] ?? null;
    $grau = $_POST['grau'] ?? null;
    $data_de_inicio = $_POST['data_de_inicio'] ?? null;
    $data_de_encerramento = $_POST['data_de_encerramento'] ?? null;

    // Verifica se todos os campos estão preenchidos antes de inserir
    if ($instituicao && $curso && $grau && $data_de_inicio && $data_de_encerramento) {
        // Inserir os dados na tabela
        $sql = "INSERT INTO formacao (instituicao, curso, grau, data_de_inicio, data_de_encerramento)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssss", $instituicao, $curso, $grau, $data_de_inicio, $data_de_encerramento);

        if ($stmt->execute()) {
            echo "<p style='color:green; font-weight:bold;'>Formação cadastrada com sucesso!</p>";
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar formação: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conexao->close();
    } else {
        echo "<p style='color:red;'>Por favor, preencha todos os campos.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formacao.css">
    <title>Formação Acadêmica</title>
</head>

<body>
    <a href="tela_inicial.php"><button>Voltar</button></a><br><br>

    <div id="div1">
        <h1>Currículos Classe A</h1>
        <h2>Informações de Formação</h2>

        <form action="formacao.php" method="post">

            <div class="campo">
                <label for="instituicao">Nome da instituição:</label>
                <input type="text" id="instituicao" name="instituicao" placeholder="Digite o nome da instituição" required>
            </div>

            <div class="campo">
                <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" placeholder="Digite o nome do curso" required>
            </div>

            <div class="campo">
                <label for="grau">Grau de estudo:</label>
                <input type="text" id="grau" name="grau" placeholder="Digite seu grau de estudo" required>
            </div>

            <div class="campo">
                <label for="data_de_inicio">Data de início:</label>
                <input type="date" id="data_de_inicio" name="data_de_inicio" required>
            </div>

            <div class="campo">
                <label for="data_de_encerramento">Data de encerramento:</label>
                <input type="date" id="data_de_encerramento" name="data_de_encerramento" required>
            </div>

            <button type="submit">enviar</button>
        </form>
    </div>
</body>
</html>