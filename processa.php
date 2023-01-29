<?php

include 'conexao.php';
$arquivo = $_FILES['arquivo'];

$primeiralinha = true;
$linhas_importadas = 0;
$linhas_naoimportadas = 0;

$usuarios_naoimportados = 0;



if ($arquivo['type'] == "text/csv") {
    $dados = fopen($arquivo['tmp_name'], 'r');
    while($linha = fgetcsv($dados,1000,";")){

        if($primeiralinha){// esse if tira a linha do cabeçalho 
            $primeiralinha = false;
            continue;
        }
        array_walk_recursive($linha, 'converter');




        $sql=$conn->prepare("INSERT INTO usuarios_celk SET nome=:nome, email=:email, endereco=:endereco");
        $sql->bindValue(':nome', $linha[1] ?? null);
        $sql->bindValue(':email', $linha[2] ?? null);
        $sql->bindValue(':endereco', $linha[3] ?? null);
        $sql->execute();
        
        if($sql->rowCount()){
            $linhas_importadas++;
        }else{
            $linhas_naoimportadas++;
            $usuarios_naoimportados = $usuarios_naoimportados . ", " . ($linha[1] ?? "null");
        }
        
        
    }

    echo "$linhas_importadas linhas importadas,<br/>
    $linhas_naoimportadas linhas não importadas.<br/>
    $usuarios_naoimportados Usuarios não importados";
    

}else{
    echo 'arquivo precisa ser csv';

}


function converter(&$dados){
    $dados=mb_convert_encoding($dados, "UTF-8","ISO-8859-1");

}