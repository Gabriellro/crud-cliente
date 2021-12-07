<?php

require_once('../config.php');

//verificando se existe o GET id
if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once('../database/conexao.php');

    //conectando com o banco de daoos
    $conn = conn();

    $id = (int) $_GET['id'];

    $query = "DELETE FROM clientes where id = ?";

    try {

        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        //fecha conexao com banco de dados
        close_conn($conn);

        header('Location: ../index.php');
        die();
    } catch (\Throwable $th) {

        //fecha conexao com banco de dados
        close_conn($conn);

        header('Location: ../index.php');
        die($th);
    }
} else {
    header('Location: ../index.php');
    die();
}
