<?php
require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('./verifica_login.php');
session_start();
session_destroy();
header('Location: ../index.php');
exit;