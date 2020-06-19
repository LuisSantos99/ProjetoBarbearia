<?php
require_once("../bd.php");
$IdUsuario = intval (filter_input(INPUT_POST,'IdUsuario',FILTER_DEFAULT));
$Login = filter_input(INPUT_POST,'Login',FILTER_DEFAULT);
$Senha = filter_input(INPUT_POST,'Senha',FILTER_DEFAULT);
$Senha = password_hash($Senha,PASSWORD_DEFAULT);
$IdBarbeiro = filter_input(INPUT_POST,'IdBarbeiro',FILTER_DEFAULT);
/*esses campos vão mudar, lembre-se*/
$sql = "UPDATE USUARIOS SET Login = ?,Senha = ?, IdBarbeiro = ? 
        WHERE IdUsuario=? ";


$rs = mysqli_prepare($banco,$sql);
                                            
mysqli_stmt_bind_param($rs,'ssii',$Login ,$Senha, $IdBarbeiro,$IdUsuario) ;                                            
mysqli_stmt_execute($rs);

header('location:index.php');
