<?php

require_once('../config.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('../crud/read.php');
    require_once('../database/conexao.php');

    $conn = conn();
    $id = (int) $_GET['id'];

    $cliente = pegaDadosCliente($conn, $id);
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,200;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/button.css">
        <link rel="stylesheet" href="../css/records.css">
        <link rel="stylesheet" href="../css/modal.css">
        <script src="main.js" defer></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
        </script>
        <title>CRUD</title>
    </head>
    

    <body>
        <form class="modal-form" action="../crud/update.php" method="POST">
            <input required type="hidden" class="modal-field" value="<?php echo $cliente['id']; ?>" name="cliente[id] ">
            <input required type="text" class="modal-field" value="<?php echo $cliente['nome']; ?>" placeholder="Nome do Cliente" name="cliente[nome]">
            <input required type="email" class="modal-field"value="<?php echo $cliente['email']; ?>"  placeholder="e-mail do Cliente" name="cliente[email]">
            <input required type="text" class="modal-field" value="<?php echo $cliente['cidade']; ?>" placeholder="Celular do Cliente" name="cliente[cidade]">
            <input required type="text" class="modal-field" value="<?php echo $cliente['celular']; ?>" placeholder="Cidade do Cliente" name="cliente[celular]">
            <div>
                <a href="../index.php" type="button" class="button red">Cancelar</a>
                <button class="button green">Salvar</button>
            </div>
        </form>

    </body>

    </html>


<?php

} else {

    header('Location: ../index.php');
    die($th);
}
