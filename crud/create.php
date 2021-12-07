<?php

require_once('../config.php');

//verificando se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('../database/conexao.php');

    //conectando com o banco de daoos
    $conn = conn();

    $cliente = $_POST['cliente'];

    //verificando se existe algum campo vazio no POST
    foreach ($cliente as $key => $value) {

        if (empty($value)) {
            header('Location: ../index.php');
            exit;
        }
    }

    //formata numero de celular para apenas numeros
    $cliente['celular'] = preg_replace("/[^0-9]/", "", $cliente['celular']);

    $query = "INSERT INTO clientes values (DEFAULT,?,?,?,?)";

    try {

        $confirm_bd = $conn->prepare("SELECT id from clientes where email = ? LIMIT 1");
        $confirm_bd->bind_param('s', $cliente["email"]);
        $confirm_bd->execute();
        $res_confirm = $confirm_bd->get_result();
        $confirm = $res_confirm->fetch_assoc();

        if (!empty($confirm)) {
            header('Location: ../index.php');
            exit;
        }

        $stmt = $conn->prepare($query);
        $stmt->bind_param(
            'ssss',
            $cliente["nome"],
            $cliente["email"],
            $cliente["celular"],
            $cliente["cidade"],
        );
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
