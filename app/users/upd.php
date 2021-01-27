<?php
// Recebe todos os dados do usuario via post e todos os dados da página via get

  $id = $_POST['id'];
  $email = $_POST['email'];
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
  $link = "index.php?folder=app/users/&file=frmins.php";
  $msg="";
  // Verifica todos os dados

  if($email==""){
    $msg = "Preencha o campo e-mail.";
  }elseif($usuario==""){
    $msg = "Preencha o campo usuário.";
  }elseif($senha==""){
    $msg = "Preencha o campo senha.";
  }else{

    include ("app/security/database/connection.php");
    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND id<>:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':usuario', $usuario);
    $stm_sql->bindParam(':id', $id);
    $stm_sql->execute();
    // Se o usuário não estiver cadastrado realiza o cadastro

    if($stm_sql->rowCount()==0){
      $sql = "UPDATE usuarios SET email=:email, usuario=:usuario, senha=:senha WHERE id=:id";
      $stm_sql =$db_connection->prepare($sql);
      $stm_sql->bindParam(':email',$email);
      $stm_sql->bindParam(':usuario',$usuario);
      $stm_sql->bindParam(':senha',$senha_criptografada);
      $stm_sql->bindParam(':id',$id);
      $result = $stm_sql->execute();
      // Executa update

      if($result){
        $msg = "Alteração efetuada com sucesso";

      }else{
        $msg = "Falha ao alterar.";
      }

    }else{
      $msg = "Esse usuário já está cadastrado no banco de dados.";
    }
  }
  // Redireciona para a página do form

  header("Location:" . $link . "&mensagem=".$msg);
?>
