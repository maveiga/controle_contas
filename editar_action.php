<?php
require 'conexao.php';
$id = $_GET['id'];

    $sql = $conn->prepare("UPDATE debitos SET situacao=:situacao, data_pgt =NOW() WHERE id=:id");
    $sql->bindValue(':situacao', 2);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    


