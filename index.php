<?php

require_once('config.php');
require_once('crud/read.php'); 
require_once('database/conexao.php');

$conn = conn();

$cliente = pegaDadosClientes($conn);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/records.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="main.js" defer></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <title>CRUD</title>
</head>

<body>
    <header>
        <h1 class="header-title">Cadastro de Clientes</h1>
    </header>
    <main>
        <row>
            <button type="button" class="button blue mobile" id="cadastrarCliente">Cadastrar Cliente</button>
        </row>

        <table class="records">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Cidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($cliente) { ?>
                    <?php foreach ($cliente as $key => $value) { ?>

                        <tr>
                            <td class = "nome" ><?php echo $value['nome']; ?></td>
                            <td class = "email" ><?php echo $value['email']; ?></td>
                            <td class = "cidade" ><?php echo $value['cidade']; ?></td>
                            <td id = "celular" ><?php echo $value['celular']; ?></td>
                            <td>
                                <a href="views/cliente.php?id=<?php echo $value['id']; ?>" id="editar" type="button" class="button">editar</a>
                                <a href="crud/delete.php?id=<?php echo $value['id']; ?>" id="excluir" type="button" class="button red">excluir</a>
                            </td>
                        </tr>

                    <?php } ?>
                <?php } ?>

            </tbody>
        </table>
        <div class="modal" id="modal">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Novo Cliente</h2>
                    <span class="modal-close" id="modalClose">&#10006;</span>
                </header>
                <form class="modal-form" action="crud/create.php" method="POST">
                    <input required type="text" class="modal-field" placeholder="Nome do Cliente" name="cliente[nome]">
                    <input required type="email" class="modal-field" placeholder="e-mail do Cliente" name="cliente[email]">
                    <input required type="text" class="modal-field" placeholder="Celular do Cliente" name="cliente[celular]">
                    <input required type="text" class="modal-field" placeholder="Cidade do Cliente" name="cliente[cidade]">
                    <div>
                        <button class="button green">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal modal2">
            <div class="modal-content">
                <header class="modal-header">
                    <h2>Atualizar Cliente</h2>
                    <span class="modal-close" id="modalCloseUpdate">&#10006;</span>
                </header>
                <form class="modal-form" action="crud/update.php?id=<?php echo $value['id']; ?>" method="POST">
                    <input required type="text" class="modal-field" placeholder="Nome do Cliente" name="cliente[nome]">
                    <input required type="email" class="modal-field" placeholder="e-mail do Cliente" name="cliente[email]">
                    <input required type="text" class="modal-field" placeholder="Celular do Cliente" name="cliente[celular]">
                    <input required type="text" class="modal-field" placeholder="Cidade do Cliente" name="cliente[cidade]">
                    <div>
                        <button class="button green">Salvar</button>
                    </div>
                </form>
           
            </div>
        </div>

    </main>
    <footer>
        Copyright &copy; Leozin
    </footer>
</body>

<script>

    var nome = $(".nome").html().split(': ')[1];
    console.log(nome)

</script>

</html>