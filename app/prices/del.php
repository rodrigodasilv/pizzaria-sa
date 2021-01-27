<?php

    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM tamanhos WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":id", $id);
    $result=$stm_sql->execute();
    if($result){
        $msg = "Tamanho excluído com sucesso!";
        }else{
            $msg = "Falha ao excluir!";
        }
$link="index.php?folder=app/prices/&file=frmins.php";
header("Location: " . $link . "&mensagem=" . $msg );
?>
