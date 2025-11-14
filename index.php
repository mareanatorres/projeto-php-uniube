<?php

    include_once('cliente.class.php');

    $cliente1 = new Cliente(nome: 'João Silva', email: "joão@gmail.com", telefone: '11999999999');

    $cliente1->mostrar();

    
    $cliente2 = new Cliente(nome: 'Mateus', email: "mateus@gmail.com", telefone: '11999999999');

    $cliente2->mostrar();
    
?>