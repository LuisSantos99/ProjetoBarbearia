<?php

require_once("bd.php");

$Nome = filter_input(INPUT_POST,'nomeCliente',FILTER_DEFAULT);
$DataNasc = filter_input(INPUT_POST,'NascCliente',FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST,'CPFCliente',FILTER_DEFAULT);
$RG = filter_input(INPUT_POST,'RGCliente',FILTER_DEFAULT);
$ddd = filter_input(INPUT_POST,'DDDTel',FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST,'TelFone',FILTER_DEFAULT);
$Ativo = filter_input(INPUT_POST,'AtivoCliente',FILTER_DEFAULT);
/*esses campos vão mudar, lembre-se*/
var_dump( $Nome ,$DataNasc , $CPF,$RG, $ddd,$telefone,$Ativo );  
$sql = "INSERT INTO CLIENTES (NOME,DATANASC,CPF,RG,DDD,TELEFONE,ATIVO) VALUES (?,?,?,?,?,?,? ) ";        
var_dump($sql);
$rs = mysqli_prepare($banco,$sql);
var_dump($sql);
mysqli_stmt_bind_param($rs,'sssssss', $Nome ,$DataNasc , $CPF,$RG, $ddd,$telefone,$Ativo) ;    
var_dump($rs);                                        
mysqli_stmt_execute($rs);

