<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controller/rh_gerencia.php');
?>

<body>
    <div class="row h-80 w-80 d-flex mt-4 mb-4 text-center">
        <h2>Bem vindo ao painel RH</h2>
    </div>
    <div class="row h-80 w-80 mx-auto flex-row mt-4 text-center">
        <div class="col">
            <h1>Funcionarios</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Funcionario</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Situação</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="col">

        </div>
    </div>
</body>