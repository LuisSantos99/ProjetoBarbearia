<?php
require_once("../bd.php");
$IDBARBEIRO = intval (filter_input(INPUT_POST,'IDBARBEIRO',FILTER_DEFAULT));
$Nome = filter_input(INPUT_POST,'Nome',FILTER_DEFAULT);
$CPF = filter_input(INPUT_POST,'CPF',FILTER_DEFAULT);
/*esses campos vão mudar, lembre-se*/
$sql = "UPDATE BARBEIRO SET Nome = ?,CPF = ?    
        WHERE IDBARBEIRO=? ";

$rs = mysqli_prepare($banco,$sql);

mysqli_stmt_bind_param($rs,'ssi', $Nome ,$CPF,$IDBARBEIRO);                                            
mysqli_stmt_execute($rs);
header('location:index.php');
