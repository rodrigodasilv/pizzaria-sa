<?php
    $codigo = $_GET['codigo'];

    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");

    $sql = "SELECT codigo,nome,descricao,tipo FROM sabores WHERE codigo=:codigo";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':codigo', $codigo);
    $stm_sql->execute();

    $sabor = $stm_sql->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid md-6">
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h2 class="prompt_font">Alteração do Sabor</h2>
    
    <div class="col-12">
        <?php if(isset($_GET['mensagem'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $_GET['mensagem']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
        <?php } ?>
    </div>
    <div class="col-12">
        <form name="updprices" action="index.php?folder=app/flavors/&file=upd.php" method="post">
        <input type="hidden" class="form-control" name="codigo" value="<?php echo $codigo ;?>">
        <div class="form-group">
            <label>Nome: </label>
            <input type="text" class="form-control" name="nome"  value="<?php echo $sabor['nome'];?>">
        </div>
        <div class="form-group">
            <label>Descrição: </label>
            <input class="form-control" name="descricao"  value="<?php echo $sabor['descricao'];?>">
        </div>
        <div class="form-group">
            <label for="idtipo">Tipo:</label>
            <select class="form-control" name="tipo">
                <option value="">Selecione</option>
                <option <?php if($sabor['tipo']==0){echo "selected";}?> value="0">Doce</option>
                <option <?php if($sabor['tipo']==1){echo "selected";}?> value="1">Salgada</option>
            </select>
        </div>
        <button type="reset" class="btn btn-warning prompt_font">Desfazer</button>
        <button type="submit" class="btn bg-themed prompt_font">Enviar</button>
        </form>
    </div>
        </div>
</body>
</html>
</html>
