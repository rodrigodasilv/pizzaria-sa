<?php
  $email     = $_POST['email'];
  $usuario   = $_POST['usuario'];
  $senha     = $_POST['senha'];
  $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
  $msg = "";
  $link = "index.php?folder=app/users/&file=frmins.php";
  include ("app/security/database/connection.php");


  if($email==""){
    $msg = "Preencha o campo e-mail.";
  }elseif($usuario==""){
    $msg = "Preencha o campo usuário.";
  }elseif($senha==""){
    $msg = "Preencha o campo senha.";
  }else{

    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':usuario', $usuario);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){
      $sql = "INSERT INTO usuarios (id, usuario, senha, email) VALUES (:id, :usuario, :senha, :email)";

      $stm_sql = $db_connection->prepare($sql);

      $id         = null;

      $stm_sql->bindParam(':id', $id);
      $stm_sql->bindParam(':usuario', $usuario);
      $stm_sql->bindParam(':senha', $senha_criptografada);
      $stm_sql->bindParam(':email', $email);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
      }else{
        $msg = "Falha ao cadastrar!";
      }
    }else{
      $msg = "Esse usuário já está cadastrado no banco de dados.";
    }
  }

  header("Location:" . $link . "&mensagem=".$msg);
?>
