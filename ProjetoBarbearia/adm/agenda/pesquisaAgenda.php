<?php

    include_once("../bd.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM AGENDA WHERE IDAGENDA = $id";
    $resultado = mysqli_query($banco, $sql);
    $agenda = mysqli_fetch_assoc($resultado);

    // $data = explode(" ",$agenda['DATAHORA']);   
    // $data = $data[0].'T'.$data[1];     
    // $agenda['DATAHORA'] = $data[0].'T'.$data[1];
    
    //2020-08-07T00:00
    //2020-08-07 00:00

    $agenda['DATAHORA'] = str_replace( ' ', 'T' , $agenda['DATAHORA']);
    $agenda['DATAHORAFIM'] = str_replace( ' ', 'T' , $agenda['DATAHORAFIM']);

    // $agenda = explode(" ",$data);    
    // $datahorafim = $datahorafim[0].'T'.$datahorafim[1];
    // $datahorafim = explode(" ",$agenda['DATAHORA']);    
    // $agenda['DATAHORA'] = $datahorafim[0].'T'.$datahorafim[1];
    // $agenda = explode(" ",$datahorafim);        
    
    $sqlcliente = "SELECT * FROM CLIENTES WHERE IDCLIENTE = ".$agenda['IDCLIENTE'];
    $resultadocliente = mysqli_query($banco, $sqlcliente);
    $agenda["cliente"] = mysqli_fetch_assoc($resultadocliente);

    $sqlcliente = "SELECT * FROM BARBEIRO WHERE IDBARBEIRO = ".$agenda['IDBARBEIRO'];
    $resultadobarbeiro = mysqli_query($banco, $sqlcliente);
    $agenda["barbeiro"] = mysqli_fetch_assoc($resultadobarbeiro);

    echo json_encode($agenda);


