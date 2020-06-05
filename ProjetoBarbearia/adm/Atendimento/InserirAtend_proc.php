<?php
require_once("../bd.php");

$idCliente = filter_input(INPUT_POST,'IDCLIENTE',FILTER_DEFAULT);
//$idBarbeiro = filter_input(INPUT_POST,'NascCliente',FILTER_DEFAULT);
$dtHr = date('d/m/Y') ; 
$ValorTotal = filter_input(INPUT_POST,'valorTotal',FILTER_DEFAULT);
//ValorTotal = number_format ($ValorTotal, 2, '.', '.')
$ValorTotal = str_replace(",",".", $ValorTotal);
//INSERE NA TABELA DE ATENDIMENTO - TABELA PAI    
	if ($ValorTotal == NULL){
		$sql = "INSERT INTO ATENDIMENTO (IDCLIENTE,IDBARBEIRO,DT_HR_SALVOU,VALORTOTAL) VALUES ( $idCliente,1,$dtHr,0) ";    
	}else{ 
		$sql = "INSERT INTO ATENDIMENTO (IDCLIENTE,IDBARBEIRO,DT_HR_SALVOU,VALORTOTAL) VALUES ( $idCliente,1,$dtHr,$ValorTotal) ";    }

$rs = mysqli_prepare($banco,$sql);
mysqli_stmt_execute($rs);



//SELECT O ID INSERIDO
$select = "SELECT MAX(IDATENDIMENTO) AS IDATEND FROM ATENDIMENTO ";
$resultado = mysqli_query($banco, $select);
$IDAtend = mysqli_fetch_assoc($resultado);
$array_servico = explode("|", $_POST['itens']);
$array_valor = explode("|", $_POST['valorx']);

//mostra o conteúdo do array

$i = 0;
foreach ($array_servico as &$value) {
	$ITEM= ($array_servico[$i]);
	$VALOR = str_replace(",",".",$array_valor[$i]);	//	$ValorTotal = str_replace(",",".", $ValorTotal);
	$ID = $IDAtend['IDATEND'];
	$sqlItens = "INSERT INTO ATENDI_ITENS (IDATENDIMENTO,SERVICO,VALOR) VALUES ($ID,'$ITEM',$VALOR)";				

	$rs = mysqli_prepare($banco,$sqlItens);	
	if ($rs){
		mysqli_stmt_execute($rs);
	}else{
		echo"Erro ao inserir";
	}
	$i++;
}

unset($array_servico);

//header('location : PesquisaCliente.php');
