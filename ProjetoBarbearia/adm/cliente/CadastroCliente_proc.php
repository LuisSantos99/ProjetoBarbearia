<?php

require_once("../bd.php");

$Nome = filter_input(INPUT_POST,'nomeCliente',FILTER_DEFAULT);
$DataNasc = filter_input(INPUT_POST,'NascCliente',FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST,'CPFCliente',FILTER_DEFAULT);
$RG = filter_input(INPUT_POST,'RGCliente',FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST,'TelFone',FILTER_DEFAULT);
$Ativo = filter_input(INPUT_POST,'AtivoCliente',FILTER_DEFAULT);
if ($Ativo == NULL)
	$Ativo = 'off';
/*esses campos vão mudar, lembre-se*/
$sql = "INSERT INTO CLIENTES (NOME,DATANASC,CPF,RG,TELEFONE,ATIVO) VALUES (?,?,?,?,?,? ) ";        
$rs = mysqli_prepare($banco,$sql);
mysqli_stmt_bind_param($rs,'ssssss', $Nome ,$DataNasc , $CPF,$RG,$telefone,$Ativo) ;                        
mysqli_stmt_execute($rs);

header('location: index.php');