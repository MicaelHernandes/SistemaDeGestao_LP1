<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controller/vendas_gerencia.php');
?>

<body>
    <div class="row h-80 w-80 d-flex mt-4 mb-4 text-center">
        <h2>Bem vindo ao painel de gerenciamento de vendas/vendedor!</h2>
    </div>
    <div class="row h-80 w-80 mx-auto flex-row mt-4 text-center">
        <div class="col d-flex flex-column">
            <h3>Vendededores</h3>
            <?php
            if ($vendedor) {
            ?>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Total vendido</th>
                            <th scope="col">Quant. vendas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendedor as $vend) { ?>
                            <tr>
                                <th scope="row"> <?= $vend['id'] ?> </th>
                                <td><?= $vend['nome'] ?></td>
                                <td><?= $vend['total_vendido'] ?></td>
                                <td><?= $vend['quantidade_vendas'] ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            <?php
            }

            ?>
        </div>
        <div class="col d-flex flex-column">
            <h3>Vendas</h3>
            <?php
            if ($vendas) {
            ?>

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Nome Cliente</th>
                            <th scope="col">Vendedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendas as $vend) { ?>
                            <tr>
                                <th scope="row"> <?= $vend['vendedor_id'] ?> </th>
                                <td><?= $vend['valor'] ?></td>
                                <td><?= $vend['nome_cliente'] ?></td>
                                <td><?= $vend['nome_vendedor'] ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            <?php
            }

            ?>
        </div>
    </div>
</body>