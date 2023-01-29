<?php
include_once("conexao.php");
include_once("view/header.php");


include_once("view/body.php");


$info = [];
$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $sql = $conn->prepare("SELECT * FROM usuarios_celk WHERE id=:id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {

    header("Location: index.php");
    exit;
}



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Lista de cadastro</li>
            </ol>


            <div class="row">
                <div class="col-xl-6">

                </div>
                <div class="col-xl-6">

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Dados
                </div>
                <div class="table table-striped">
                    <form method="POST" action="editar_action.php">
                        <form>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    
                                     <input type="hidden" name="id" value="<?=$info['id']?>"/>
                                    <label for="inputPassword4">Nome</label>
                                    <input type="text" class="form-control"   value ="<?=$info['nome']?>" name="nome" placeholder="Nome completo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" value ="<?=$info['email']?>"  name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Endereço</label>
                                <input type="text" class="form-control"  value ="<?=$info['endereco']?>"  name="endereco" placeholder="Rua dos Bobos, nº 0">
                            </div>

                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>