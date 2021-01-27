<?php
$nome   = $_POST["nome"];
$descricao  = $_POST["descricao"];
$tipo  = $_POST["tipo"];
$msg = "";
$link="index.php?folder=app/flavors/&file=frmins.php";

if($nome==""){
    $msg = "Por favor, preencha o campo nome!";
}else if($descricao==""){
    $msg = "Por favor, preencha o campo descricao!";
}else if($tipo==""){
        $msg = "Por favor, preencha o campo tipo!";
}else{
    $sql = "SELECT * FROM sabores WHERE nome=:nome";
    include ("app/security/database/connection.php");
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":nome", $nome);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){
        // Início de cadastro do tamanho
        $sql = "INSERT INTO sabores (codigo, nome, descricao, tipo) VALUES (:codigo, :nome, :descricao, :tipo)";

        $stm_sql = $db_connection->prepare($sql);

        $codigo=null;

        $stm_sql->bindParam(':codigo', $codigo);
        $stm_sql->bindParam(':nome', $nome);
        $stm_sql->bindParam(':descricao', $descricao);
        $stm_sql->bindParam(':tipo', $tipo);

        $result=$stm_sql->execute();

        if($result){
        $msg = "Cadastro efetuado com sucesso!";
        }else{
        $msg = "Falha ao cadastrar!";
        }
        // Fim de cadastro de usuario
    }else{
    $msg = "Esse sabor já esta cadastrado!";
    }
}
header("Location: " . $link . "&mensagem=" . $msg );
?>
