<?php
require_once("../bd.php");
$id = intval (filter_input(INPUT_POST,'idcliente',FILTER_DEFAULT));
var_dump($id);
$Nome = filter_input(INPUT_POST,'nomeCliente',FILTER_DEFAULT);
$DataNasc = filter_input(INPUT_POST,'NascCliente',FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST,'CPFCliente',FILTER_DEFAULT);
$RG = filter_input(INPUT_POST,'RGCliente',FILTER_DEFAULT);
$ddd = filter_input(INPUT_POST,'DDDTel',FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST,'TelFone',FILTER_DEFAULT);
$Ativo = filter_input(INPUT_POST,'AtivoCliente',FILTER_DEFAULT);
/*esses campos vão mudar, lembre-se*/
$sql = "UPDATE CLIENTES SET NOME = ?, DATANASC = ?,CPF = ?,RG = ?,DDD= ?,TELEFONE = ?,ATIVO = ?        
        WHERE IDCLIENTE=? ";
$rs = mysqli_prepare($banco,$sql);
mysqli_stmt_bind_param($rs,'sssssssi', $Nome ,$DataNasc , $CPF,$RG, $ddd,$telefone,$Ativo,$id) ;                                            
mysqli_stmt_execute($rs);

header('location:index.php');
