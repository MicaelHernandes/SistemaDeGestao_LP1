<?php
if(!isset($_SESSION['id_usuario'])){
    $_SESSION['nao-autorizado'] = true;
    header('../../index.php');
}
?>