<?php
require 'conexao.php';
$conta = filter_input(INPUT_POST, 'conta'); 
$valor = filter_input(INPUT_POST, 'valor');
$situacao = filter_input(INPUT_POST, 'situacao');
$data = filter_input(INPUT_POST, 'data');


        $sql=$conn->prepare("INSERT INTO debitos SET conta=:conta, valor=:valor, situacao=:situacao, data=:data");
        $sql->bindValue(':conta', $conta); 
        $sql->bindParam(':valor', $valor); 
        $sql->bindParam(':situacao', $situacao);
        $sql->bindParam(':data', $data);
        $sql->execute();

    
        header("Location: index.php");
        exit;
    

