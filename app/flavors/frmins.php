<?php
    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");
?>
<div class="container-fluid md-3">
    <div class="row">
            

        <div class="col-sm-12 col-md-6">
            <div class="prompt_font">
                <h2>Cadastro de Sabores de Pizza</h2>
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
            <form name="insprices" action="index.php?folder=app/flavors/&file=ins.php" method="post">
                <div class="form-group">
                    <label for="idnome">Nome:</label>
                    <input id="idnome" required class="form-control" type="nome" name="nome" placeholder="Ex: 4 queijos, Calabresa...">
                </div>
                <div class="form-group">
                    <label for="idfatias">Descrição:</label>
                    <input id="idfatias" required class="form-control" name="descricao" placeholder="Queijo, oregano, calabresa...">
                </div>
                <div class="form-group">
                    <label for="idtipo">Tipo:</label>
                    <select class="form-control"name="tipo">
                        <option value="">Selecione</option>
                        <option value="0">Doce</option>
                        <option value="1">Salgada</option>
                    </select>
                </div>
                <button class="btn btn-warning prompt_font" type="reset">Limpar</button>
                <button class="btn bg-themed prompt_font" type="submit">Enviar</button>
            </form>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="prompt_font">
                <h2>Sabores Cadastrados</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php

                        $sql = "SELECT * FROM sabores";

                        $stm_sql = $db_connection->prepare($sql);
                        $stm_sql->execute();

                        $sabores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <table class="table-responsive table table-striped table-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($sabores as $sabor){

                                if($sabor['tipo']==1){
                                    $tipo="Salgada";
                                }else{
                                    $tipo="Doce";
                                }
                        ?>
                            <tr>
                            <td scope="col"><?php echo $sabor['codigo']; ?></td>
                            <td><?php echo $sabor['nome'];?></td>
                            <td><?php echo $sabor['descricao'];?></td>
                            <td><?php echo $tipo; ?></td>
                            <td><a href="index.php?folder=app/flavors/&file=frmupd.php&codigo=<?php echo $sabor["codigo"];?>"><img class="img-icon" src="assets/imgs/icons/editar.png" alt="A"></a></td>
                            <td><a href="index.php?folder=app/flavors/&file=del.php&codigo=<?php echo $sabor["codigo"];?>" onclick="return valDel('sabor','<?php echo $sabor['nome'];?>')"><img class="img-icon" src="assets/imgs/icons/excluir.png" alt="A"></a></td>
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
