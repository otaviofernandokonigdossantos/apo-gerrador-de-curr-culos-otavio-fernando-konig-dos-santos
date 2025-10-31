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
    $data_de_nascimento = $_POST['data_de_nascimento'];
    $idade = $_POST['idade'];

    // Corrigido o número de campos (8 colunas e 8 valores)
    $sql = "INSERT INTO curriculo 
            (nome, email, senha, telefone, endereco, objetivo_proficional, data_de_nascimento, idade)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssss", $nome, $email, $senha, $telefone, $endereco, $objetivo_proficional, $data_de_nascimento, $idade);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao cadastrar usuário: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
    <link rel="stylesheet" href="curriculo.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .campo {
            margin-bottom: 10px;
        }
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

    <a href="tela_inicial.php"><button>⬅ Voltar</button></a><br><br>

    <div id="div1">
        <h1>Currículos Classe A</h1>
        <h2>Informações do Usuário</h2>

        <form action="curriculo.php" method="post">
            <div class="campo">
                <label for="nome">Nome Completo:</label><br>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="campo">
                <label for="email">E-mail:</label><br>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            </div>

            <div class="campo">
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="campo">
                <label for="telefone">Número de Telefone:</label><br>
                <input type="tel" id="telefone" name="telefone" placeholder="Digite seu número de telefone" required>
            </div>

            <div class="campo">
                <label for="endereco">Endereço Completo:</label><br>
                <input type="text" id="endereco" name="endereco" placeholder="Digite seu endereço completo" required>
            </div>

            <div class="campo">
                <label for="objetivo_proficional">Objetivo Profissional:</label><br>
                <input type="text" id="objetivo_proficional" name="objetivo_proficional" placeholder="Digite seu objetivo profissional" required>
            </div>

            <div class="campo">
                <label for="data_de_nascimento">Data de Nascimento:</label><br>
                <input type="date" id="data_de_nascimento" name="data_de_nascimento" required>
            </div>

            <div class="campo">
                <label for="idade">Idade:</label><br>
                <input type="text" id="idade" name="idade" placeholder="Idade automática" readonly>
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        // Calcula a idade automaticamente ao selecionar a data de nascimento
        document.getElementById('data_de_nascimento').addEventListener('change', function() {
            const dataNasc = new Date(this.value);
            const hoje = new Date();
            let idade = hoje.getFullYear() - dataNasc.getFullYear();
            const mes = hoje.getMonth() - dataNasc.getMonth();
            if (mes < 0 || (mes === 0 && hoje.getDate() < dataNasc.getDate())) {
                idade--;
            }
            document.getElementById('idade').value = idade + ' anos';
        });
    </script>

</body>
</html>