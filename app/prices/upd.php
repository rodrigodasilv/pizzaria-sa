<?php
    $id   = $_POST["id"];
    $nome   = $_POST["nome"];
    $fatias   = $_POST["fatias"];
    $preco   = $_POST["preco"];
    $link="index.php?folder=app/prices/&file=frmins.php";

    if($id==""){
        $msg = "Por favor, preencha o campo id!";
    }else if($nome==""){
        $msg = "Por favor, preencha o campo nome!";
    }else if($fatias==""){
        $msg = "Por favor, preencha o campo fatias!";
    }else if($preco==""){
        $msg = "Por favor, preencha o campo preço!";
    }else{
        include ("app/security/database/connection.php");
        $sql = "SELECT * FROM tamanhos WHERE nome=:nome AND id<>:id";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome',$nome);
        $stm_sql->bindParam(':id',$id);
        $stm_sql->execute();

        if($stm_sql->rowCount()==0){
            $sql = "UPDATE tamanhos SET nome=:nome, preco=:preco, fatias=:fatias WHERE id=:id";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->bindParam(':nome',$nome);
            $stm_sql->bindParam(':preco',$preco);
            $stm_sql->bindParam(':fatias',$fatias);
            $stm_sql->bindParam(':id',$id);
            $result = $stm_sql->execute();

            if($result){
                $msg = "Alteração efetuada com sucesso!";
            }else{
                $msg = "Falha ao alterar!";
            }
        }else{
            $msg = "Esse produto já está cadastrado no banco de dados.";
        }
    }
header("Location: " . $link . "&mensagem=" . $msg . "&id=" . $codigo);
?>
