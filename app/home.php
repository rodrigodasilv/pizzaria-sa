<!-- Início slider de imagens -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/imgs/massa.png" class="d-block w-100" alt="Massa de pizza">
      <div class="carousel-caption d-none d-md-block prompt_font">
        <h5>Pizzas feitas com os melhores ingredientes, pizzas com o melhor sabor.</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/imgs/homemsegurandopizza.png" class="d-block w-100" alt="Homem segurando pizza">
      <div class="carousel-caption d-none d-md-block prompt_font">
        <h5>Prezamos pela sua saúde. Todos nossos entregadores utilizam máscara para evitar a disseminação do coronavírus.</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/imgs/pizza1.png" class="d-block w-100" alt="pizza">
      <div class="carousel-caption d-none d-md-block prompt_font">
        <h5>Forno a lenha. Experimente o verdadeiro sabor italiano.</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      <!-- Fim slider de imagens -->
      
<div class="card text-center ">
  <div id="cardapio" class="prompt_font card-header">
    <h1>Cardápio</h1>
  </div>
  <div class="card-body">
    <!-- Início sabores pizza -->
    <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="text-themed btn btn-block text-left collapsed prompt_font" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              Pizzas Salgadas
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <!-- Início tabela -->
              <?php
                include ("app/security/database/connection.php");
                $sql = "SELECT * FROM sabores WHERE tipo=1";
                $stm_sql=$db_connection->prepare($sql);
                $stm_sql->execute();
                $sabores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                      <th scope="col">Nome:</th>
                      <th scope="col">Descrição:</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach($sabores as $sabor){
                ?>
                  <tr scope="row">
                    <td><?php echo $sabor['nome'];?></td>
                    <td><?php echo $sabor['descricao'];?></td>
                  </tr>
                <?php
                }
                ?>  
                </tbody>
              </table>
            <!-- Fim tabela -->
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="text-themed btn btn-block text-left collapsed prompt_font" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Pizzas Doces
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <!-- Início tabela -->
            <?php
              include ("app/security/database/connection.php");
              $sql = "SELECT * FROM sabores WHERE tipo=0";
              $stm_sql=$db_connection->prepare($sql);
              $stm_sql->execute();
              $sabores = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col">Nome:</th>
                    <th scope="col">Descrição:</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  foreach($sabores as $sabor){
              ?>
                <tr scope="row">
                  <td><?php echo $sabor['nome'];?></td>
                  <td><?php echo $sabor['descricao'];?></td>
                </tr>
              <?php
              }
              ?>  
              </tbody>
            </table>
            <!-- Fim tabela -->
          </div>
        </div>
      </div>
    </div>
<!-- Fim sabores pizza-->
  </div>
</div>

<!-- Início preços -->

<div class="card text-center ">
  <div id="precos" class="prompt_font card-header">
    <h1>Preços</h1>
  </div>
  <div class="card-body">
    <!-- Início tabela -->
    <?php
      include ("app/security/database/connection.php");
      $sql = "SELECT * FROM tamanhos";
      $stm_sql=$db_connection->prepare($sql);
      $stm_sql->execute();
      $tamanhos = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Tamanho:</th>
            <th scope="col">Fatias:</th>
            <th scope="col">Preço:</th>
        </tr>
      </thead>
      <tbody>
      <?php
          foreach($tamanhos as $tamanho){
      ?>
        <tr scope="row">
          <td><?php echo $tamanho['nome'];?></td>
          <td><?php echo $tamanho['fatias'];?></td>
          <td><?php echo $tamanho['preco'];?></td>
        </tr>
      <?php
      }
      ?>  
      </tbody>
    </table>
    <!-- Fim tabela -->
  </div>
</div>
<!-- Fim preços -->

<!-- Início contato -->

<div class="card text-center">
    <div id="contato" class="prompt_font card-header">
      <h1>Contato</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-auto">
        <div class="table table-responsive table-borderless">
          <table>
            <tr>
              <th scope="row" colspan="2">
                <h4 class="text-center prompt_font">Delivery:</h4>
              </th>
            </tr>
            <tr>
              <td><img class="img-icon" src="assets/imgs/icons/phone.png" alt="Telefone"></td>
              <td><h4><a class="prompt_font text-themed" href="tel:(47) 3029-3568">(47) 3029-3568</a><h4></td>
            </tr>
            <tr>
              <td><img class="img-icon" src="assets/imgs/icons/whatsapp.png" alt="Whatsapp"></td>
              <!-- Esse número do whatsapp é de outra pizzaria, eu só usei pra ficar tipo placeholder -->
              <td><h4><a  class="prompt_font text-themed" href="https://wa.me/5547984185306?text=Eu%20quero%20pedir%20uma%20pizza!">(47) 98418-5306<h4></td>
            </tr>
          </table>
        </div> 
      </div>
      <div class="col-auto">
        <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="margin-top:10px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d114419.32054528152!2d-48.852455!3d-26.339327!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94deb0e9ab9926ed%3A0xf053ebacc8bb773e!2sR.%20Ibirapuera%2C%20491%20-%20Floresta%2C%20Joinville%20-%20SC%2C%2089212-020!5e0!3m2!1spt-BR!2sbr!4v1599055886543!5m2!1spt-BR!2sbr" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted bg-themed">
      <label class="text-light">Imagens fornecidas por: pvproductions, stockking - br.freepik.com</label>
      <label class="text-light">ícones feitos por <a class="clean_link" href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> e <a class="clean_link" href="https://www.flaticon.com/authors/prosymbols" title="Prosymbols">Prosymbols</a> de <a class="clean_link" href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></label>
    </div>
</div>

<!-- Fim contato -->