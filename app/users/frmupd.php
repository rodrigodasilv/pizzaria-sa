<div class="col-6">
  <?php
    include ("app/security/authentication/validation.php");
    include ("app/security/database/connection.php");
    $id = $_GET['id'];
    $sql = "SELECT email, usuario FROM usuarios WHERE id=:id";
    $stm_sql = $db_connection->prepare($sql);
    $stm_sql -> bindParam(':id',$id);
    $stm_sql -> execute();
    $user = $stm_sql -> fetch(PDO::FETCH_ASSOC);
  ?>
  <!-- Inicia form -->

  <h2>Alteração do Usuário: <?php echo $id?> </h2>

  <form name="upduser" action="index.php?folder=app/users/&file=upd.php" method="post">

    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <label for="idemail">E-mail:</label>
      <input type="email" class="form-control" id="idemail" name="email" value="<?php echo $user['email'];?>">
    </div>

    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <label for="idusuario">Usuário:</label>
      <input type="text" class="form-control" id="idusuario" name="usuario" value="<?php echo $user['usuario'];?>">
    </div>

    <div class="form-group">
      <label for="idsenha">Senha:</label>
      <input type="password" class="form-control" id="idsenha" name="senha" value="<?php echo $user['senha'];?>">
    </div>

    <button type="reset" class="btn btn-danger">Limpar</button>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
  <!-- Termina form -->

</div>
