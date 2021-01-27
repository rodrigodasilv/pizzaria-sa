<?php

$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$msg = "";
$link = "../../../index.php?folder=app/security/login/&file=frmlogin.php";

if($usuario==""){
    $msg="Por favor, preencha o campo usuário!";
}else if($senha==""){
    $msg="Por favor, preencha o campo senha!";
}else{

    include ("../database/connection.php");
    
    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario";
    $stm_sql=$db_connection->prepare($sql);
    $stm_sql->bindParam(':usuario',$usuario);
    $stm_sql->execute();
    $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

    if($stm_sql->rowcount()!==0){

        foreach($users as $user){

            $senha_db = $user['senha'];

            if (password_verify($senha, $senha_db)) {
                session_start();
                $_SESSION['user'] = $usuario;
                $_SESSION['idsessao'] = session_id();
                $link = "../../../index.php?folder=app/&file=home.php";
            } else {
                $msg="Usuário ou senha incorretos!";
            }
        }
    }else{
        $msg="Usuário ou senha incorretos!";
    }
}
    header("Location: " . $link . "&mensagem=" . $msg );
?>