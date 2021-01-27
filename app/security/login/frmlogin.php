<script src="assets/js/main.js"></script>

<div class="container h-100" style="margin-top: 10%;">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4 text-center align-self-center">
            <?php if(isset($_GET['mensagem'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['mensagem']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>

        
            <form name="auth" action="app/security/authentication/login.php" method="POST">
                    <div class="form-group">
                            <label class="prompt_font" for="idusuario">Usuário:</label>
                            <input required type="text" class="form-control" id="idusuario" name="usuario">
                    </div>
                    <div class="form-group">
                            <label class="prompt_font text-center" for="idsenha">Senha:</label>
                            <input required type="password" class="form-control" id="idsenha" name="senha">
                    </div>
                    <button type="reset" class="prompt_font btn btn-warning">Limpar</button>
                    <button type="submit" class="bg-themed prompt_font btn btn-success">Enviar</button>
            </form>
            <a class="text-themed prompt_font text-center" href="index.php?folder=app/security/login/&file=frmpass.php">Esqueci minha senha</a>
        </div>
    </div>
</div>
