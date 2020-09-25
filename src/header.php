<header class="header">
      <div class="item">
        <img src="/public/img/search.png" class="search-icon" onclick="ocultarPesquisa()">
        <input type="text" class="search-box" id="search-box" style="display: block;" length="100" placeholder="Pesquisar">
      </div>
      <div class="item">
        <a href="/"><img class="logo" src="/public/img/logo.png"></a>
      </div>
      <div class="item">
        <img class="carrinho" id="carrinho" src="/public/img/carrinho.png">
        <?php if(isset($nome)) {?>
          <div class="account">
            <img class="icon" id="account" src="/public/img/account.png">
          </div>
          </div>
            <?php } else { ?>
              <a href="/auth/login">Login</a>
              <a href="#">|</a>
              <a href="/auth/cadastro">Cadastrar</a>
            </div>
            <?php } ?>
      <br>
    </div>
            </header>