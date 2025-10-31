<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instituicao = $_POST['instituicao'];
    $curso = $_POST['curso'];
    $grau = $_POST['grau'];
    $data_de_inicio = $_POST['data_de_incio'];
    $data_de_enceramento = $_POST['data_de_enceramento'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (instituicao, curso, grau, data_de_inicio, data_de_enceramento)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $instituicao, $curso, $grau, $data_de_inicio, $data_de_enceramento);

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
    <link rel="stylesheet" href="formacao.css">
    
    <title>tela de login</title>
 
    <a href="tela_inicial.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>curriculos clase A</h1>
        <h2>informações do usuario</h2>

        <form action="formacao.php" method="post"> <div class="campo">
                <label for="instituicao">Nome da instituição que estudou:</label>
                <input type="text" id="instituicao" name="instituicao" placeholder="Digite o neme da instituicao" required>
            </div>

            <div class="campo">
                <label for="curso">qual foi seu curso:</label>
                <input type="text" id="curso" name="curso" placeholder="Digite qual seu curso" required>
            </div>

            <div class="campo">
                <label for="grau">qual o seu grau de estudo:</label>
                <input type="text" id="grau" name="grau" placeholder="Digite seu grau " required>
            </div>

            <div class="campo">
                <label for="data_de_inicio">digite em que data iniciou :</label>
                <input type="data" id="data_de_inicio" name="data_de_inicio" placeholder="Digite a data de inicio" required>
            </div>

              <div class="campo">
                <label for="data_de_enceramento">digite em que data en encerou:</label>
                <input type="data" id="data_de_enceramento" name="data_de_enceramento" placeholder="Digite a data de enceramento" required>
            </div>

            <button type="submit">proximo</button>
        </form>
    </div>
</body>
</html>