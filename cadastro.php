<?php

include_once("view/header.php");

include_once("view/body.php");




?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Lançamento de contas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
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
                    <form method="POST" action="adicionar_action.php">
                        <form>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label>Conta</label>
                                    <input type="text" class="form-control" name="conta" placeholder="Agua, luz, telefone">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Valor</label>
                                    <input type="text" class="form-control" name="valor">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Data de vecimento</label>
                                    <input type="date" class="form-control" name="data" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Conta</label>
                                    <select name="situacao" class="form-select" aria-label="Default select example">
                                        <option value="1">Em aberto</option>
                                        <option value="2">Pago</option>
                                    </select>
                                </div>
                            </div>
                            
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            
                            
                        </form>

                </div>

                <?php require 'view/footer.php';
