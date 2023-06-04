<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('../controller/verifica_login.php');
include_once('../controller/pega_vendas.php');
?>

<body>
    <div class="container">
        <div class="row d-flex mx-auto vh-80 w-80 justify-content-center flex-column text-center">
            <div class="col mt-5">
                <h2>Bem vindo(a), <?= $_SESSION['nome_usuario'] ?></h2>
            </div>
            <div class="col">
                <div class="row mt-5 d-flex w-100 v-90 justify-content-center flex-row text-center">
                    <div class="col">
                        <div class="col mb-5">
                            <h3>Suas ultimas vendas:</h3>
                        </div>
                        <div class="col">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#Id</th>
                                        <th scope="col">Valor venda</th>
                                        <th scope="col">Nome Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($vendas){foreach ($vendas as $vend){ ?>
                                    <tr>
                                        <th scope="row"><?= $vend['id'] ?></th>
                                        <td><?= $vend['valor'] ?></td>
                                        <td><?= $vend['nome_cliente'] ?></td>
                                    </tr>   
                                    <?php }}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col">
                            <h3>cadastrar nova venda:</h3>
                            <form method="POST" action="../controller/cadastra_vendas.php">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CPF Cliente</label>
                                    <input type="text" class="form-control" id="cpf-input" name="cpf_cliente" placeholder="000.000.000-00">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nome Cliente</label>
                                    <input type="text" class="form-control" id="nome-input" name="nome_cliente" placeholder="Nome cliente">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Valor venda:</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="valor_venda" placeholder="R$">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary mt-4">Cadastrar venda</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cpf-input').mask('000.000.000-00');
        });

        $(document).ready(function() {
            $('#cpf-input').on('keyup', function() {
                var cpf = $(this).val();
                $.ajax({
                    url: '../controller/obter_nome_cliente.php',
                    method: 'POST',
                    data: {
                        cpf: cpf
                    },
                    success: function(response) {
                        $('#nome-input').val(response);
                    }
                });
            });
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js" integrity="sha384-pzjwP/J5lg+gFcA8k81i5+1M65US+7w9yX5e5Qr02xhcu6JbrjSpnMToUpwMbbd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>