<?php

require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('verifica_login.php');

if($_SESSION['cargo_usuario'] != 'GERENTE RH'){
    $_SESSION['nao-autorizado'] = true;
    header('Location: ../index.php');
    exit;
}