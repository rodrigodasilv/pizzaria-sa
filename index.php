<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puro Sapore</title>
    <link rel="shortcut icon" href="assets/imgs/icons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/imgs/icons/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,700&display=swap" rel="stylesheet">
</head>
<!-- Começo da barra de navegação -->
<?php
include ("app/security/authentication/set-navbar.php");
?>
<nav class="navbar sticky-top navbar-dark bg-themed navbar-expand-lg">
    <a class="navbar-brand" href="index.php?folder=app/&file=home.php">
        <img src="assets/imgs/log-1.png" width="100" height="100" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav float-right text-right pr-3">
            <li class="nav-item">
                <a class="nav-link prompt_font" href="index.php?folder=app/&file=home.php">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link prompt_font" href="index.php?folder=app/&file=home.php#cardapio">Cardápio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link prompt_font" href="index.php?folder=app/&file=home.php#precos">Preços</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link prompt_font" href="index.php?folder=app/&file=home.php#contato">Contato</span></a>
            </li>
            </ul>
            <?php
              if(isset($admTools)){
                echo $admTools;
              }else{
                echo $login;
              }
            ?>
    </div>
</nav>
<!-- Fim da barra de navegação -->
<body>
  <?php

  if(isset($_GET['folder']) && isset($_GET['file'])){
    if(@!include $_GET['folder'].$_GET['file']){
      echo "Desculpe, mas essa URL não existe: " . $_GET['folder'].$_GET['file']."!";
    }
  }else{
    header ("Location: index.php?folder=app/&file=home.php");
    //Se não tiver clicado em nenhum página manda direto pra home
  }
  ?>
</body>
</html>
