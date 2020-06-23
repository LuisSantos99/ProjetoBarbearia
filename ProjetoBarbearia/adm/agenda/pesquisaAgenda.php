<?php

    include_once("../bd.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM AGENDA WHERE IDAGENDA = $id";
    $resultado = mysqli_query($banco, $sql);
    $agenda = mysqli_fetch_assoc($resultado);

    $sqlcliente = "SELECT * FROM CLIENTES WHERE IDCLIENTE = ".$agenda['IDCLIENTE'];
    $resultadocliente = mysqli_query($banco, $sqlcliente);
    $agenda["cliente"] = mysqli_fetch_assoc($resultadocliente);

    //$sqlcliente = "SELECT * FROM BARBEIRO WHERE IDBARBEIRO = ".$agenda['IDBARBEIRO'];
    //$resultadobarbeiro = mysqli_query($banco, $sqlcliente);
    //$agenda["barbeiro"] = mysqli_fetch_assoc($resultadobarbeiro);

    echo json_encode($agenda);


