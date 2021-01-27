<?php
    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");
?>
<div class="container-fluid md-3">
    <div class="row">    
        <div class="col-sm-12 col-md-6">
        <div class="col-12 prompt_font">
            <h2>Cadastro de Tamanho de Pizza</h2>
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
            <form name="insprices" action="index.php?folder=app/prices/&file=ins.php" method="post">
                <div class="form-group">
                    <label for="idnome">Nome:</label>
                    <input id="idnome" required class="form-control" type="nome" name="nome" placeholder="Ex: GG, Família...">
                </div>
                <div class="form-group">
                    <label for="idfatias">Fatias:</label>
                    <input id="idfatias" required class="form-control" min="1" type="number" name="fatias" placeholder="20">
                </div>
                <div class="form-group">
                    <label for="idpreco">Preço:</label>
                    <input id="idpreco" required class="form-control" min="0" type="number" name="preco" placeholder="50">
                </div>
                <button class="btn btn-warning prompt_font" type="reset">Limpar</button>
                <button class="btn bg-themed prompt_font" type="submit">Enviar</button>
            </form>
        </div>
        <div class="col-sm-12 col-md-6">
        <div class="col-12 prompt_font">
            <h2>Tamanhos Cadastrados</h2>
        </div>
            <div class="row">
                <div class="col-12">
                    <?php

                        $sql = "SELECT * FROM tamanhos";

                        $stm_sql = $db_connection->prepare($sql);
                        $stm_sql->execute();

                        $tamanhos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <table class="table table-striped table-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Fatias</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($tamanhos as $tamanho){
                        ?>
                            <tr>
                            <td scope="col"><?php echo $tamanho['id']; ?></td>
                            <td><?php echo $tamanho['nome'];?></td>
                            <td><?php echo $tamanho['fatias'];?></td>
                            <td><?php echo $tamanho['preco'];?></td>
                            <td><a href="index.php?folder=app/prices/&file=frmupd.php&id=<?php echo $tamanho["id"];?>"><img class="img-icon" src="assets/imgs/icons/editar.png" alt="A"></a></td>
                            <td><a href="index.php?folder=app/prices/&file=del.php&id=<?php echo $tamanho["id"];?>" onclick="return valDel('tamanho','<?php echo $tamanho['nome'];?>')"><img class="img-icon" src="assets/imgs/icons/excluir.png" alt="A"></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>