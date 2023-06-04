<?php require_once('../controller/verifica_login.php'); ?>

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
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <div class="col">
                            <h3>cadastrar nova venda:</h3>
                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CPF Cliente</label>
                                    <input type="text" class="form-control" id="cpf-input" name="cpf_cliente" placeholder="000.000.000-00">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nome Cliente</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nome_cliente" placeholder="Nome cliente">
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
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js" integrity="sha384-pzjwP/J5lg+gFcA8k81i5+1M65US+7w9yX5e5Qr02xhcu6JbrjSpnMToUpwMbbd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>