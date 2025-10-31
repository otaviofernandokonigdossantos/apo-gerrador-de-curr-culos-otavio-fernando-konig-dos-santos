<?php
// arquivo: gerador_curriculo.php

// Função para calcular idade
function calcularIdade($nascimento) {
    $nascimento = new DateTime($nascimento);
    $hoje = new DateTime();
    $idade = $hoje->diff($nascimento)->y;
    return $idade;
}

// Criar pasta de uploads se não existir
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Variável para armazenar o caminho da imagem
$fotoPath = '';

// Verifica se o formulário foi enviado
$formEnviado = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($formEnviado && isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $arquivoTmp = $_FILES['foto']['tmp_name'];
    $nomeArquivo = basename($_FILES['foto']['name']);
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    // Gera um nome único para evitar sobrescrever arquivos
    $novoNome = uniqid('foto_') . '.' . $extensao;
    $destino = $uploadDir . $novoNome;

    if (move_uploaded_file($arquivoTmp, $destino)) {
        $fotoPath = $destino;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gerador de Currículo</title>
<style>
    body { font-family: Arial, sans-serif; margin: 40px; }
    h1 { border-bottom: 2px solid #000; }
    .section { margin-top: 20px; }
    .experiencia, .referencia, .formacao { margin-bottom: 10px; }
    .printBtn, .backBtn, .homeBtn { 
        color: white; padding: 10px 15px; 
        border: none; border-radius: 4px; cursor: pointer; margin-bottom: 20px;
        margin-right: 10px;
    }
    .printBtn { background: #4CAF50; }
    .backBtn { background: #555; }
    .homeBtn { background: #2196F3; }
    .campo { margin-bottom: 10px; }
    img.foto {
        max-width: 150px;
        max-height: 150px;
        border-radius: 50%;
        margin-bottom: 15px;
    }
</style>
</head>
<body>

<?php if (!$formEnviado): ?>
<!-- FORMULÁRIO -->
<a href="tela_inicial.php"><button class="homeBtn">⬅ Voltar</button></a><br><br>

<h1>Preencha seus dados</h1>
<form method="post" action="" enctype="multipart/form-data">
    <div class="campo">
        <label>Nome:</label>
        <input type="text" name="nome" required>
    </div>
    <div class="campo">
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>
    <div class="campo">
        <label>Telefone:</label>
        <input type="tel" name="telefone" required>
    </div>
    <div class="campo">
        <label>Data de Nascimento:</label>
        <input type="date" name="nascimento" required>
    </div>

    <div class="campo">
        <label>Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
    </div>

    <h3>Formação Acadêmica</h3>
    <div id="formacoes">
        <div class="campo">
            <input type="text" name="grau[]" placeholder="Grau de Estudo (ex: Ensino Médio, Graduação)">
            <input type="text" name="instituicao[]" placeholder="Instituição">
            <input type="text" name="curso[]" placeholder="Curso">
            <input type="text" name="ano_conclusao[]" placeholder="Ano de Conclusão">
        </div>
    </div>
    <button type="button" onclick="addFormacao()">+ Adicionar Formação</button>

    <h3>Experiências Profissionais</h3>
    <div id="experiencias">
        <div class="campo">
            <input type="text" name="empresa[]" placeholder="Empresa">
            <input type="text" name="cargo[]" placeholder="Cargo">
            <input type="date" name="data_de_inicio[]" placeholder="Data de início">
            <input type="date" name="data_de_encerramento[]" placeholder="Data de encerramento">
        </div>
    </div>
    <button type="button" onclick="addExperiencia()">+ Adicionar Experiência</button>

    <h3>Habilidades</h3>
    <div id="habilidades">
        <div class="campo">
            <input type="text" name="habilidade[]" placeholder="Digite uma habilidade (ex: Comunicação, Liderança)">
        </div>
    </div>
    <button type="button" onclick="addHabilidade()">+ Adicionar Habilidade</button>

    <h3>Referências</h3>
    <div id="referencias">
        <div class="campo">
            <input type="text" name="ref_nome[]" placeholder="Nome">
            <input type="text" name="ref_telefone[]" placeholder="Telefone">
            <input type="email" name="ref_email[]" placeholder="Email">
        </div>
    </div>
    <button type="button" onclick="addReferencia()">+ Adicionar Referência</button>

    <br><br>
    <button type="submit">Gerar Currículo</button>
</form>

<script>
function addFormacao() {
    const div = document.createElement('div');
    div.className = 'campo';
    div.innerHTML = '<input type="text" name="grau[]" placeholder="Grau de Estudo"> ' +
                    '<input type="text" name="instituicao[]" placeholder="Instituição"> ' +
                    '<input type="text" name="curso[]" placeholder="Curso"> ' +
                    '<input type="text" name="ano_conclusao[]" placeholder="Ano de Conclusão">';
    document.getElementById('formacoes').appendChild(div);
}

function addExperiencia() {
    const div = document.createElement('div');
    div.className = 'campo';
    div.innerHTML = '<input type="text" name="empresa[]" placeholder="Empresa"> ' +
                    '<input type="text" name="cargo[]" placeholder="Cargo"> ' +
                    '<input type="date" name="data_de_inicio[]" placeholder="Data de início"> ' +
                    '<input type="date" name="data_de_encerramento[]" placeholder="Data de encerramento">';
    document.getElementById('experiencias').appendChild(div);
}

function addHabilidade() {
    const div = document.createElement('div');
    div.className = 'campo';
    div.innerHTML = '<input type="text" name="habilidade[]" placeholder="Digite uma habilidade">';
    document.getElementById('habilidades').appendChild(div);
}

function addReferencia() {
    const div = document.createElement('div');
    div.className = 'campo';
    div.innerHTML = '<input type="text" name="ref_nome[]" placeholder="Nome"> ' +
                    '<input type="text" name="ref_telefone[]" placeholder="Telefone"> ' +
                    '<input type="email" name="ref_email[]" placeholder="Email">';
    document.getElementById('referencias').appendChild(div);
}

// Preview da imagem antes do envio
const fotoInput = document.getElementById('foto');
fotoInput.addEventListener('change', function() {
    const arquivo = this.files[0];
    if (arquivo) {
        const reader = new FileReader();
        reader.onload = function(e) {
            let img = document.getElementById('previewFoto');
            if(!img){
                img = document.createElement('img');
                img.id = 'previewFoto';
                img.className = 'foto';
                fotoInput.parentNode.appendChild(img);
            }
            img.src = e.target.result;
        }
        reader.readAsDataURL(arquivo);
    }
});
</script>

<?php else: ?>
<!-- CURRÍCULO GERADO -->
<a href="tela_inicial.php"><button class="homeBtn">⬅ Voltar</button></a>
<button class="backBtn" onclick="window.location.href='';">🔙 Voltar ao Início</button>
<button class="printBtn" onclick="window.print();">📄 Baixar / Imprimir Currículo</button>

<?php if ($fotoPath): ?>
    <img src="<?php echo htmlspecialchars($fotoPath); ?>" class="foto">
<?php endif; ?>

<h1><?php echo htmlspecialchars($_POST['nome']); ?></h1>
<p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($_POST['nascimento']); ?></p>
<p><strong>Idade:</strong> <?php echo calcularIdade($_POST['nascimento']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
<p><strong>Telefone:</strong> <?php echo htmlspecialchars($_POST['telefone']); ?></p>

<div class="section">
<h2>Formação Acadêmica</h2>
<?php
if (!empty($_POST['grau'])) {
    for ($i = 0; $i < count($_POST['grau']); $i++) {
        echo "<div class='formacao'>";
        echo "<strong>Grau:</strong> " . htmlspecialchars($_POST['grau'][$i]) . "<br>";
        echo "<strong>Instituição:</strong> " . htmlspecialchars($_POST['instituicao'][$i]) . "<br>";
        echo "<strong>Curso:</strong> " . htmlspecialchars($_POST['curso'][$i]) . "<br>";
        echo "<strong>Ano de Conclusão:</strong> " . htmlspecialchars($_POST['ano_conclusao'][$i]) . "<br>";
        echo "</div>";
    }
}
?>
</div>

<div class="section">
<h2>Experiências Profissionais</h2>
<?php
if (!empty($_POST['empresa'])) {
    for ($i = 0; $i < count($_POST['empresa']); $i++) {
        echo "<div class='experiencia'>";
        echo "<strong>Empresa:</strong> " . htmlspecialchars($_POST['empresa'][$i]) . "<br>";
        echo "<strong>Cargo:</strong> " . htmlspecialchars($_POST['cargo'][$i]) . "<br>";
        echo "<strong>Data de início:</strong> " . htmlspecialchars($_POST['data_de_inicio'][$i]) . "<br>";
        echo "<strong>Data de encerramento:</strong> " . htmlspecialchars($_POST['data_de_encerramento'][$i]) . "<br>";
        echo "</div>";
    }
}
?>
</div>

<div class="section">
<h2>Habilidades</h2>
<ul>
<?php
if (!empty($_POST['habilidade'])) {
    foreach ($_POST['habilidade'] as $hab) {
        echo "<li>" . htmlspecialchars($hab) . "</li>";
    }
}
?>
</ul>
</div>

<div class="section">
<h2>Referências</h2>
<?php
if (!empty($_POST['ref_nome'])) {
    for ($i = 0; $i < count($_POST['ref_nome']); $i++) {
        echo "<div class='referencia'>";
        echo "<strong>Nome:</strong> " . htmlspecialchars($_POST['ref_nome'][$i]) . "<br>";
        echo "<strong>Telefone:</strong> " . htmlspecialchars($_POST['ref_telefone'][$i]) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($_POST['ref_email'][$i]) . "<br>";
        echo "</div>";
    }
}
?>
</div>

<?php endif; ?>

</body>
</html>
