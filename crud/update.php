<?php

require_once('../config.php');

//verificando se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once ("read.php");
    require_once('../database/conexao.php');

    //conectando com o banco de daoos
    $conn = conn();

    $cliente = $_POST['cliente'];
    

    foreach ($cliente as $key => $value) {
        
        if (empty($value)) {
            header('Location: ../index.php');
        }   
    
    }

    $dadosClienteAtual = pegaDadosCliente($conn, $cliente['id']);

    $keysVetor = array_keys($dadosClienteAtual);

    $dadosUpdate = array();

    foreach ($keysVetor as $key => $value) {

        if($dadosClienteAtual[$value] != $cliente[$value]){

            if($value != 'id'){
                $dadosUpdate[] = $value;
            }
            
        }
        
    }
    
    if(empty($dadosUpdate)){
        header('Location: ../index.php');
    }

    $query = "UPDATE clientes SET ";

    foreach ($dadosUpdate as $key => $value) {
        $query .= " $value = '$cliente[$value]' ";

        if($key != array_key_last($dadosUpdate)){
            $query .= ', ';
        }
    }

    $query .= " WHERE id = ".$cliente['id'];

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        header('Location: ../index.php');

        die();
    
    } catch (\Throwable $th) {
        die($th);
    }

} else {
    header('Location: ../index.php');
    die();
}
