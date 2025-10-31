<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerador de curriculos clase A</title>
    <link rel="stylesheet" href="tela_inicial.css">
    <script>barra-p.js</script>
    <div>
      <br>
    <h1>gerador de currículos clase A</h1>
    <a href="inicio.php"><button>voltar</button></a><br><br>  

        </div>
</head>
<header>
    <nav>
        <ul>
          <li><a href="curriculo.php">pessoal</a></li>
          <li><a href="formacao.php">formação academica</a></li>
          <li><a href="experiencia.php">experiência</a></li>
          <li><a href="habilidades.php">habilidades</a></li>
        </ul>
    </nav>
<body>
  <header>
    <nav>
        <ul>
          <li><a href="curriculo.php">começar</a></li>

        </ul>
    </nav>
    <div>
    <form action="#" method="post">
                <input type="text" name="search" id="search" placeholder="BUSCAR" required>
                <button type="submit"><i class="fas fa search"></i></button>
    </form>
    </div>
</header>

<section>
<?php


?>
  
    <style>
     /* cards.css */

.card {
  /* Estilos para todos os cards */
  border: 1px solid #ccc;
  padding: 20px;
  margin: 10px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
 
  
}

.card-header {
  /* Estilos para o cabeçalho do card */
  font-weight: bold;
  margin-bottom: 10px;
}

section {
  /* Estilos para a seção de conteúdo */
  display: flex;
  flex-wrap: wrap;
}

img {
  /* Estilos para a imagem */
  max-width: 100%;
  height: 200px;
  margin-right: 10px;
}
.certo{
  display: grid;
  grid-template-columns: auto auto auto auto;
  margin-inline: center;
  flex-wrap: wrap;
}
button{
  background-color: orangered;

}
    </style>
</head>
<body>
<div class="certo">
<?php
include_once('config.php');



$conexao->close();
?>


</body>

</body>
</html>