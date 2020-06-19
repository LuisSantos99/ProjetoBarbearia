<?php
session_start();
require_once 'adm\bd.php';

$login = filter_input(INPUT_POST,'login',FILTER_DEFAULT);
$senha = filter_input(INPUT_POST,'senha',FILTER_DEFAULT);

$login = mysqli_real_escape_string($banco,$login);

$sql = "SELECT IDUSUARIO,SENHA
        FROM usuarios
        WHERE login = '$login'";

$resultado = mysqli_query($banco,$sql);

if($resultado->num_rows >= 1){
    $usuario = mysqli_fetch_assoc($resultado);

    if(password_verify($senha,$usuario['senha'])){
        $_SESSION['usuario'] = $usuario['idusuario'];
        header('location:adm');
    }else{
        header('location: index.php?erro=1');
    }
}else{
    header('location: index.php?erro=2');
}    