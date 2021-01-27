<script src="assets/js/main.js"></script>
<?php $alert=$_GET['alert']; ?>
<div class="container h-100" style="margin-top: 10%;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4 text-center align-self-center">
            <?php if(isset($_GET['mensagem'])){ ?>
                <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show" role="alert">
                    <?php echo $_GET['mensagem']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

        
            <form name="auth" action="app/security/login/passreset.php" method="POST">
                    <div class="form-group">
                            <label class="prompt_font" for="idemail">E-mail:</label>
                            <input required type="email" class="form-control" id="idemail" name="email">
                    </div>
                    <button type="reset" class="prompt_font btn btn-warning">Limpar</button>
                    <button type="submit" class="bg-themed prompt_font btn btn-success">Enviar</button>
            </form>