<?php
require_once("../bd.php");
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';
echo "<script src='../../js/Funcoes.js'></script>";

$idCliente = filter_input(INPUT_POST, 'IDCLIENTE', FILTER_DEFAULT);
$idBarbeiro = filter_input(INPUT_POST, 'IDBARBEIRO', FILTER_DEFAULT);
$dtInicial =  filter_input(INPUT_POST, 'dtInicial', FILTER_DEFAULT);
$dtFinal =  filter_input(INPUT_POST, 'dtFinal', FILTER_DEFAULT);
$idAgenda  = filter_input(INPUT_POST, 'IDAGENDA', FILTER_DEFAULT);
$dataGerou =  date('d/m/Y');

$dtInicial = str_replace('T', ' ', $dtInicial);
$dtFinal = str_replace('T', ' ', $dtFinal);

if ($idBarbeiro == "Selecione") { //Valida o campo do servidor, pois se for setado SIM deve-se escolher um servidor.               
    echo "<div class='alert alert-danger' role='alert'> !  </div>";
    echo "<script> javascript:history.go-(1)'</script>";
    exit(1);
} else {
    //$dtInicial =  $dtInicial + ':00';
    //IDCLIENTE,IDBARBEIRO,DATAHORA,DATAHORAFIM,COLOR) VALUES ($idCliente,$idBarbeiro,$dtInicial,$dtFinal,''
    if (!empty($idCliente)) {
        $sql =  "UPDATE AGENDA SET IDBARBEIRO= $idBarbeiro, DATAHORA= '$dtInicial', DATAHORAFIM='$dtFinal'
        WHERE IDAGENDA = $idAgenda";  
        $rs = mysqli_prepare($banco, $sql);
        // mysqli_stmt_bind_param($rs, 'iiii', $, $dtInicial, $dtFinal, $idAgenda);
    }
    mysqli_stmt_execute($rs);
    
    header('location: ../../adm/agenda/agenda.php');
}
