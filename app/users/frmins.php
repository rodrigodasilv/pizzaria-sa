<?php
    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");
?>
<div class="col-12">

  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h2>Cadastre um Usuário</h2>
    </div>
    <div class="col-sm-12 col-md-6">
      <h2>Usuários Cadastrados</h2>
    </div>
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
  <div class="row">
<!-- Inicia coluna -->
    <div class="col-sm-12 col-md-6">

      <form name="insuser" action="index.php?folder=app/users/&file=ins.php" method="post">

        <div class="form-group">
          <label for="idemail">E-mail:</label>
          <input type="email" class="form-control" id="idemail" name="email">
        </div>

        <div class="form-group">
          <label for="idusuario">Usuário:</label>
          <input type="text" class="form-control" id="idusuario" name="usuario">
        </div>

        <div class="form-group">
          <label for="idsenha">Senha:</label>
          <input type="password" class="form-control" id="idsenha" name="senha">
        </div>

        <button type="reset" class="btn btn-danger">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>

      </form>

    </div>
    <!-- Fim coluna -->
    <!-- Inicia coluna -->


    <div class="col-sm-12 col-md-6">

      <?php
        $sql = "SELECT * FROM usuarios";
        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();
        $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="table-responsive">
        <table class="table table-striped">
          <!-- Começa tabela -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Usuário</th>
              <th>E-mail</th>
              <th>Alterar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>

            <?php
              foreach($users as $user){
            ?>

              <tr>
                <td scope="row"><?php echo $user['id']; ?></td>
                <td><?php echo $user['usuario'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><a href="index.php?folder=app/users/&file=frmupd.php&id=<?php echo $user["id"];?>"><img class="img-icon" src="assets/imgs/icons/editar.png" alt="A"></a></td>
                <td><a href="index.php?folder=app/users/&file=del.php&id=<?php echo $user["id"];?>" onclick="return valDel('usuário','<?php echo $user['usuario'];?>')"><img class="img-icon" src="assets/imgs/icons/excluir.png" alt="A"></a></td>
              </tr>

            <?php
              }
            ?>

          </tbody>
        </table>
        <!-- Fim tabela -->
      </div>
    </div>
    <!-- Fim coluna -->

  </div>
</div>
