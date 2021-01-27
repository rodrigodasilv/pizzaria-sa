<?php
    $codigo   = $_POST["codigo"];
    $nome   = $_POST["nome"];
    $descricao   = $_POST["descricao"];
    $tipo   = $_POST["tipo"];
    $link="index.php?folder=app/flavors/&file=frmins.php";

    if($codigo==""){
        $msg = "Por favor, preencha o campo codigo!";
    }else if($nome==""){
        $msg = "Por favor, preencha o campo nome!";
    }else if($descricao==""){
        $msg = "Por favor, preencha o campo descrição!";
    }else if($tipo==""){
        $msg = "Por favor, preencha o campo tipo!";
    }else{
        include ("app/security/database/connection.php");
        $sql = "SELECT * FROM sabores WHERE nome=:nome AND codigo<>:codigo";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->bindParam(':nome',$nome);
        $stm_sql->bindParam(':codigo',$codigo);
        $stm_sql->execute();

        if($stm_sql->rowCount()==0){
            $sql = "UPDATE sabores SET nome=:nome, descricao=:descricao, tipo=:tipo WHERE codigo=:codigo";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->bindParam(':nome',$nome);
            $stm_sql->bindParam(':descricao',$descricao);
            $stm_sql->bindParam(':codigo',$codigo);
            $stm_sql->bindParam(':tipo',$tipo);
            $result = $stm_sql->execute();

            if($result){
                $msg = "Alteração efetuada com sucesso!";
            }else{
                $msg = "Falha ao alterar!";
            }
        }else{
            $msg = "Esse sabor já está cadastrado no banco de dados.";
        }
    }
header("Location: " . $link . "&mensagem=" . $msg . "&codigo=" . $codigo);
?>
