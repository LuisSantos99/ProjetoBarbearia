<?php
require_once '../bd.php';

$nome= filter_input(INPUT_POST,'NOME',FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST,'cpf',FILTER_DEFAULT);
$sql = "INSERT INTO  barbeiro (NOME,CPF) VALUES (?,?)";
$rs = mysqli_prepare($banco,$sql);
mysqli_stmt_bind_param($rs,'ss',$nome,$cpf);
mysqli_stmt_execute($rs);
header('location: index.php');