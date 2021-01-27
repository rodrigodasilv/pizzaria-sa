<?php
    $email=$_POST['email'];
    $link = "../../../index.php?folder=app/security/login/&file=frmpass.php";
    $alert = "danger";

    if($email==""){
        $msg="Por favor, preencha o campo email!";
    }else{
    
        include ("../database/connection.php");
        
        $sql = "SELECT * FROM usuarios WHERE email=:email";
        $stm_sql=$db_connection->prepare($sql);
        $stm_sql->bindParam(':email',$email);
        $stm_sql->execute();
        $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
    
        if($stm_sql->rowcount()==1){
    
            $msg="Você receberá sua nova senha no seu email em alguns instantes!";
            $alert = "success";

            $senha=rand();

            $destino = $email;
            $assunto = "Nova senha!";
            $message="Sua nova senha no site da pizzaria é: " . $senha;

            $enviaremail = mail($destino, $assunto, $message);
    
            $senha_criptografada=password_hash($senha,PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios SET senha = :senha WHERE email = :email;";
            $stm_sql=$db_connection->prepare($sql);
            $stm_sql->bindParam(':email',$email);
            $stm_sql->bindParam(':senha',$senha_criptografada);
            $stm_sql->execute();
            
        }else{
            $msg="Esse email não está cadastrado!";
        }
    }
        header("Location: " . $link . "&mensagem=" . $msg . "&alert=".$alert . "&mail=" . $enviaremail);
?>