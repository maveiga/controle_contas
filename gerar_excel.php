<?php

include_once 'conexao.php';




$query_usuarios ="SELECT id, conta, valor, situacao, data FROM debitos  ORDER BY id DESC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();
$jo =$result_usuarios->fetchAll(PDO::FETCH_ASSOC);



if(($result_usuarios)and($result_usuarios->rowCount()>0)){
    

    header('Content-type: text/cvs; charset=utf8');
    //nome do arquivo
    header('Content-Disposition:attachment; filename=arquivo.csv');

    $resultado = fopen("php://output", 'w');

    //cabecalho do excel
    $cabecalho = ['id', mb_convert_encoding('conta', "ISO-8859-1", "UTF-8"), 'valor', 'situacao', 'data'];

    // excrevendo no arquivo
    fputcsv($resultado, $cabecalho, ';');

    //lendo os registros
    
        foreach($jo as $usuarios){

            fputcsv($resultado, $usuarios, ';');
        }


    


    //fechando arquivo

    fclose($resultado);



}else{
    header("Location: index.php");
}

