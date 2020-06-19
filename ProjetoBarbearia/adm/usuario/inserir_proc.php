<?php
require_once '../bd.php';

$login = filter_input(INPUT_POST,'login',FILTER_DEFAULT);
$senha = filter_input(INPUT_POST,'senha',FILTER_DEFAULT);
$idbarbeiro = filter_input(INPUT_POST,'idbarbeiro',FILTER_DEFAULT);
$senha = password_hash($senha,PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (LOGIN,SENHA,IDBARBEIRO) VALUES (?,?,?)";
$rs = mysqli_prepare($banco,$sql);        
mysqli_stmt_bind_param($rs,'sss',$login,$senha,$idbarbeiro);

mysqli_stmt_execute($rs);

header('location: index.php');