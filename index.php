<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once('./view/components/links.html') ?>
  <title>SISBIN - Autenticação</title>
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row flex-column ">
      <?php
      if (isset($_SESSION['erro_login'])) : ?>
        <div class="col">
          <div class="alert alert-danger" role="alert">
            Senha ou usuario invalido!!! <br> Tente novamente,<br>ou entre em contato com o suporte!
          </div>
        </div>
      <?php endif;
      unset($_SESSION['erro_login']);
      ?>
      <?php
      if (isset($_SESSION['nao-autorizado'])) : ?>
        <div class="col">
          <div class="alert alert-danger" role="alert">
            ATENÇÂO!!!!!<br>
            Você esta tentando acessar<br>
            uma pagina onde não tem acesso!!!<br>
          </div>
        </div>
      <?php endif;
      session_destroy();
      session_reset();
      unset($_SESSION['nao-autorizado']);
      ?>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Login</h4>
            <form method="POST" action="./controller/validacao_usuarios.php">
              <div class="mb-3">
                <label for="email" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf-input" name="cpf" placeholder="Digite seu CPF" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js" integrity="sha384-pzjwP/J5lg+gFcA8k81i5+1M65US+7w9yX5e5Qr02xhcu6JbrjSpnMToUpwMbbd" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#cpf-input').mask('000.000.000-00');
    });
  </script>
</body>

</html>