<?php

function pegaDadosCliente($conn, $id)
{

    $cliente_bd = $conn->prepare("SELECT * from clientes where id = ?");
    $cliente_bd->bind_param('i', $id);
    $cliente_bd->execute();
    $res = $cliente_bd->get_result();

    return $res->fetch_assoc();
}

function pegaDadosClientes($conn)
{
    $query = "SELECT * from clientes order by nome";
    $cliente_bd = $conn->prepare($query);
    $cliente_bd->execute();
    $res = $cliente_bd->get_result();

    return $res->fetch_all(MYSQLI_ASSOC);
}
