<?php

    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");

    $codigo = $_GET['codigo'];
    $sql = "DELETE FROM sabores WHERE codigo=:codigo";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(":codigo", $codigo);
    $result=$stm_sql->execute();
    if($result){
        $msg = "Sabor excluído com sucesso!";
        }else{
            $msg = "Falha ao excluir!";
        }
        
$link="index.php?folder=app/flavors/&file=frmins.php";
header("Location: " . $link . "&mensagem=" . $msg );
?>
