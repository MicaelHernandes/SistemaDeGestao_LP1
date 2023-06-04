<?php
session_start();
/*
Colinha
$_SESSION['id_usuario'] = $colab['id'];
  $_SESSION['nome_usuario'] = $colab['nome'];
  $_SESSION['cargo_usuario'] = $colab['cargo'];

' 1', '1A',             '000.000.000-00', 'DEV', 'teste'
'11', 'ADMIN RH',       '000.000.000-06', 'GERENTE RH', 'teste'
' 9', 'ADMIN SAC',      '000.000.000-04', 'GERENTE SAC', 'teste'
' 8', 'ADMIN VENDAS',   '000.000.000-02', 'GERENTE VENDAS', 'teste'
'10', 'RH',             '000.000.000-05', 'RH', 'teste'
' 7', 'SAC',            '000.000.000-03', 'SAC', 'teste'
' 2', 'VENDAS',         '000.000.000-01', 'VENDEDOR', 'teste'


*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require_once('./components/links.html'); ?>
  <title>PAINEL <?php echo $_SESSION['cargo_usuario']; ?></title>
</head>

<body>
  <nav class="navbar navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="#">
      SYSBIN
    </a>
    <a class="btn btn-primary" href="../controller/logout.php">Sair</a>
  </nav>
  <?php
  switch ($_SESSION['cargo_usuario']) {

    case 'DEV':
      require_once('./views/dev.php');
      break;
    case 'VENDEDOR':
      require_once('./views/vendedor.php');
      break;
    case 'GERENTE VENDAS':
      require_once('./views/gerencia_vendedor.php');
      break;
    case 'DEV':
      require_once('./views/dev.php');
      break;
    case 'DEV':
      require_once('./views/dev.php');
      break;
    case 'DEV':
      require_once('./views/dev.php');
      break;
    case 'DEV':
      require_once('./views/dev.php');
      break;
    default:
      $_SESSION['nao-autorizado'] = true;
      header('Location:../index.php');
      break;
  }
  ?>
  <div class="footer fixed-bottom text-center mt-4">
    <p>&copy; 2023 - 2028 Micael Hernandes. Todos os direitos reservados.</p>
  </div>
</body>

</html>