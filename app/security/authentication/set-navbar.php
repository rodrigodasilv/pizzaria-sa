<?php

session_start();
if(!isset($_SESSION['user'])){
    $login="
    <ul class='navbar-nav ml-auto float-right text-right pr-3'>
        <li class='nav-item'>
            <a class='nav-link prompt_font text-light' href='index.php?folder=app/security/login/&file=frmlogin.php'>ADMINISTRAÇÃO</a>
        </li>
    </ul>";
}else{
    // Se o usuário estiver logado, as opções de adm aparecem na navbar
  $admTools="
  <ul class='navbar-nav ml-auto float-right text-right pr-3'>
    <li class='nav-item'>
        <a class='nav-link text-light prompt_font' href='index.php?folder=app/users/&file=frmins.php'>Usuários</span></a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-light prompt_font' href='index.php?folder=app/flavors/&file=frmins.php'>Sabores</span></a>
    </li>
    <li class='nav-item'>
        <a class='nav-link text-light prompt_font' href='index.php?folder=app/prices/&file=frmins.php'>Preços</span></a>
    </li>
    <li class='nav-item'>
        <a class='text-logout nav-link prompt_font' href='app/security/authentication/logout.php'>Sair</a>
    </li>
  </ul>";
}

?>