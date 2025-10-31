<?php
include_once('config.php');

// Receber os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $objetivo_proficional = $_POST['objetivo_proficional'];

    // Inserir os dados na tabela
    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, endereco, objetivo_proficional)
            VALUES (?, ?, ?, ?, ?,?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $senha, $telefone, $endereco, $objetivo_proficional);

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
    <link rel="stylesheet" href="curriculo.css">
    
    <title>tela inicial</title>
 <style>
        .message {
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
    </style>
</head>
<body>

    <h2>Imagem do usuario</h2>
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept="image/*">
        <button type="submit">Enviar Imagem</button>
    </form>

    <div id="message" class="message"></div>

    <script>
        const form = document.getElementById('uploadForm');
        const messageDiv = document.getElementById('message');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData();
            const fileInput = document.getElementById('image');

            if (fileInput.files.length === 0) {
                messageDiv.textContent = 'Por favor, selecione uma imagem.';
                messageDiv.className = 'message error';
                return;
            }

            formData.append('image', fileInput.files[0]);

            // Enviar via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    messageDiv.textContent = 'Imagem enviada com sucesso!';
                    messageDiv.className = 'message success';
                } else {
                    messageDiv.textContent = 'Erro ao enviar a imagem.';
                    messageDiv.className = 'message error';
                }
            };

            xhr.onerror = function() {
                messageDiv.textContent = 'Erro na requisição.';
                messageDiv.className = 'message error';
            };

            xhr.send(formData);
        });
    </script>

</body>
</html>

    <a href="tela_inicial.php"><button>voltar</button></a><br><br>
</head>

<body>
    <div id="div1">
        <h1>curriculos clase A</h1>
        <h2>informações do usuario</h2>

        <form action="curriculo.php" method="post"> <div class="campo">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="campo">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="campo">
                <label for="telefone">Número de Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="Digite seu número de telefone" required>
            </div>

            <div class="campo">
                <label for="endereco">Endereço Completo:</label>
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço completo" required>
            </div>
  <div class="campo">
                <label for="objetivo_proficional">digite quais são seus objetivos proficionais:</label>
                <input type="text" id="objetivo_proficional" name="objetivo_proficional" placeholder="Digite seu objetivo proficional" required>
            </div>
            <button type="submit">proximo</button>
        </form>

        <p>Já possui uma conta? <a href="inicio.php">Acesse sua conta</a></p>
    </div>
</body>
</html>