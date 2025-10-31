<<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $habilidades = $_POST['habilidades'];
    
    // Separar múltiplas habilidades, caso o usuário tenha colocado vírgulas
    $habilidades_array = array_map('trim', explode(',', $habilidades));

    // Inserir cada habilidade na tabela
    $sql = "INSERT INTO habilidades (habilidade) VALUES (?)";
    $stmt = $conexao->prepare($sql);

    foreach ($habilidades_array as $habilidade) {
        if (!empty($habilidade)) {
            $stmt->bind_param("s", $habilidade);
            if (!$stmt->execute()) {
                echo "Erro ao cadastrar habilidade: " . $stmt->error . "<br>";
            }
        }
    }

    echo "Habilidades cadastradas com sucesso!";
    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Habilidades</title>
    <link rel="stylesheet" href="habilidades.css">
</head>
<body>
    <a href="tela_inicial.php"><button>Voltar</button></a><br><br>

    <div id="div1">
        <h1>Currículos Classe A</h1>
        <h2>Informações do Usuário</h2>

        <form action="habilidades.php" method="post">
            <div class="campo">
                <label for="habilidades">Digite suas habilidades (separadas por vírgula):</label>
                <input type="text" id="habilidades" name="habilidades" placeholder="Ex: HTML, CSS, PHP" required>
            </div>
            <button type="submit">enviar</button>
        </form>
    </div>
</body>
</html>