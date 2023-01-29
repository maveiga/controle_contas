
<?php
require 'conexao.php';

$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $conn->prepare("DELETE FROM usuarios_celk  WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    
   

} header("Location: index.php");
    exit;



?>