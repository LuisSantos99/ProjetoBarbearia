<?php
session_start();
require_once 'adm\bd.php';

$login = filter_input(INPUT_POST,'Login',FILTER_DEFAULT);
$senha = filter_input(INPUT_POST,'Senha',FILTER_DEFAULT);

$login = mysqli_real_escape_string($banco,$login);

$sql = "SELECT IDUSUARIO,SENHA
        FROM usuarios
        WHERE LOGIN = '$login'";

$resultado = mysqli_query($banco,$sql);

if($resultado->num_rows >= 1){            
    $usuarios = mysqli_fetch_assoc($resultado);
    
    if(password_verify($senha,$usuarios['SENHA'])){
        $_SESSION['usuario'] = $usuario['IDUSUARIO'];
        header('location:paginaInicial.html');
    }else{
        header('location:index.php?erro=1');
    }
}else{
    header('location: index.php?erro=2');
} 