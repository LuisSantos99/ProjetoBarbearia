<?php
require_once("../bd.php");
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';
echo "<script src='../../js/Funcoes.js'></script>";

$idCliente = filter_input(INPUT_POST, 'idcliente', FILTER_DEFAULT);
$idBarbeiro = filter_input(INPUT_POST, 'Barbeiro', FILTER_DEFAULT);
$dtInicial =  filter_input(INPUT_POST, 'dtInicial', FILTER_DEFAULT);
$dtFinal =  filter_input(INPUT_POST, 'dtFinal', FILTER_DEFAULT);
$dataGerou =  date('d/m/Y');

$dtInicial = str_replace('T', ' ', $dtInicial);
$dtFinal = str_replace('T', ' ', $dtFinal);

/* ****************     INSERE PRIMEIRO NA TABELA DE AGENDA ************** */
//Valida o campo do BARBEIRO, pois se for setado Selecione deve-se escolher um Barbeiro.   		
if ($idBarbeiro == "Selecione") {
	echo "<div class='alert alert-danger' role='alert'> !  </div>";
	echo "<script> javascript:history.go-(1)'</script>";
	exit(1);
} else {
	//$dtInicial =  $dtInicial + ':00';		
	if ($idCliente == NULL)
		$idCliente = 0;
	$sql =  "INSERT INTO AGENDA (IDCLIENTE,IDBARBEIRO,DATAHORA,DATAHORAFIM,COLOR) VALUES ($idCliente,$idBarbeiro,'$dtInicial','$dtFinal','#32CD32')";

	$rs = mysqli_prepare($banco, $sql);
	mysqli_stmt_execute($rs);

	/***** SELECT DO IDGENDA INSERIDO ********/
	//$xIDAgenda = mysqli_insert_id();		
	$sql = "SELECT MAX(IDAGENDA)AS IDAGENDA FROM AGENDA";
	$resultado = mysqli_query($banco, $sql);
	$xIDAgenda = mysqli_fetch_assoc($resultado);
	$xIDAgenda = $xIDAgenda['IDAGENDA'];
	//INSERE NA TABELA DE ATENDIMENTO - TABELA PAI    	
	$sql = "INSERT INTO ATENDIMENTO (IDCLIENTE,IDBARBEIRO,IDAGENDA,DT_HR_SALVOU,VALORTOTAL,STATUS)  VALUES ( $idCliente,$idBarbeiro,$xIDAgenda,$dataGerou,0,'A') ";
	$rs = mysqli_prepare($banco, $sql);

	mysqli_stmt_execute($rs);
	
	//header('location : PesquisaCliente.php');
	 header('location: agenda.php');			
}
