<?php
$nome   = $_POST["nome"];
$preco   = $_POST["preco"];
$fatias   = $_POST["fatias"];
$msg = "";
$link="index.php?folder=app/prices/&file=frmins.php";

if($nome==""){
    $msg = "Por favor, preencha o campo nome!";
}else if($preco==""){
    $msg = "Por favor, preencha o campo preco!";
}else if($fatias==""){
    $msg = "Por favor, preencha o campo fatias!";
}else{
    $sql = "SELECT * FROM tamanhos WHERE nome=:nome";
    include ("app/security/database/connection.php");
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":nome", $nome);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){
        // Início de cadastro do tamanho
        $sql = "INSERT INTO tamanhos (id, nome, preco, fatias) VALUES (:id, :nome, :preco, :fatias)";

        $stm_sql = $db_connection->prepare($sql);

        $id=null;

        $stm_sql->bindParam(':id', $id);
        $stm_sql->bindParam(':nome', $nome);
        $stm_sql->bindParam(':preco', $preco);
        $stm_sql->bindParam(':fatias', $fatias);
        
        $result=$stm_sql->execute();

        if($result){
        $msg = "Cadastro efetuado com sucesso!";
        }else{
        $msg = "Falha ao cadastrar!";
        }
        // Fim de cadastro de usuario
    }else{
    $msg = "Esse tamanho já esta cadastrado!";
    }
}
header("Location: " . $link . "&mensagem=" . $msg );
?>
