<?php
require 'conexao.php';
include_once("view/header.php");

include_once("view/body.php");






$query_usuarios ="SELECT id, conta, valor, situacao, data_pgt FROM debitos";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

$dados = $result_usuarios;
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Listagem</h1>
<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Total de débitos</li>
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
                            <table class="table table-striped">
                            <thead>
                                <tr>
                               
                                <th scope="col">Conta</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Situação</th>
                                <th scope="col">Data de pagamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                   
                                    <tbody>
                                    <?php if($dados->rowCount()>0){
                                    foreach($dados->fetchAll() as $usuario):
                                        ?>
                                        <tr >
                                            
                                           
                                            <?php $usuario['id'].' ';?>
                                            <td> <?php echo $usuario['conta'];?></td>
                                            <td> <?php echo number_format($usuario['valor'],2,",",".");?></td>
                                            <td> <?php  if($usuario['situacao']==1) {
                                                echo 'Em aberto';
                                            }else {
                                                echo 'Pago';};?>
                                              <td> <?php echo date('d/m/Y', strtotime($usuario['data_pgt']));?></td>                                   
                                        </tr>
                                        <?php
                                            endforeach;
                                        }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href='gerar_excel.php'><button type="button" class="btn btn-success mb-3">Gerar relatório em excel</button></a>
                        <a href='cadastro.php'><button type="button" class="btn btn-primary mb-3">Cadastar nova conta</button>
                    </div>
                    
                </main>
                <?php

                include_once("view/footer.php");?>
