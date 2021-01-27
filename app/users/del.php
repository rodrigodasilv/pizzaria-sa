<?php

    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");
    $link="index.php?folder=app/users/&file=frmins.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":id", $id);
    $result=$stm_sql->execute();
    if($result){
        $msg = "usuario excluído com sucesso!";
        }else{
            $msg = "Falha ao excluir!";
        }

header("Location: " . $link . "&mensagem=" . $msg );
?>
