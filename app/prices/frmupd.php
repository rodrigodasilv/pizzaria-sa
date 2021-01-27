        <?php
            $id = $_GET['id'];
            include ("app/security/authentication/validation.php");
            include ("app/security/database/connection.php");
            $sql = "SELECT id,nome,fatias,preco FROM tamanhos WHERE id=:id";
            $stm_sql = $db_connection->prepare($sql);
            $stm_sql->bindParam(':id', $id);
            $stm_sql->execute();

            $tamanho = $stm_sql->fetch(PDO::FETCH_ASSOC);
            
            
        ?>
    <div class="container-fluid md-3">
        <div class="row">
            <div class="col-12 prompt_font">
                <h2>Alteração de tamanhos</h2>
            </div>
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
            <div class="col-sm-12 col-md-6">
                <form name="updprices" action="index.php?folder=app/prices/&file=upd.php" method="post">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id ;?>">
                <div class="form-group">
                    <label>Nome: </label>
                    <input type="text" class="form-control" name="nome"  value="<?php echo $tamanho['nome'];?>">
                </div>
                <div class="form-group">
                    <label>Fatias: </label>
                    <input type="number" min=1 class="form-control" name="fatias"  value="<?php echo $tamanho['fatias'];?>">
                </div>
                <div class="form-group">
                    <label>Preço: </label>
                    <input name="preco" type="number" min=0 class="form-control" value="<?php echo $tamanho['preco'];?>">
                </div>
                <button type="reset" class="btn btn-warning prompt_font">Desfazer</button>
                <button type="submit" class="btn bg-themed prompt_font">Enviar</button>
                </form>
            </div>
    </body>
    </html>
</html>