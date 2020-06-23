<?php
require_once("../bd.php");
/*********** SELECT NOS DADOS DA AGENDA *************/
$xIDAgenda  = filter_input(INPUT_POST, 'IDAGENDA', FILTER_DEFAULT);

$SQL = "SELECT * FROM ATENDIMENTO AT INNER JOIN AGENDA A ON A.IDAGENDA =  AT.IDAGENDA
		WHERE AT.IDAGENDA = $xIDAgenda";
		
$idCliente = filter_input(INPUT_POST,'IDCLIENTE',FILTER_DEFAULT);
$idBarbeiro = filter_input(INPUT_POST,'IDBARBEIRO',FILTER_DEFAULT);
$dtHr = date('d/m/Y') ; 

$ValorTotal = filter_input(INPUT_POST,'valorTotal',FILTER_DEFAULT);
//ValorTotal = number_format ($ValorTotal, 2, '.', '.')
$ValorTotal = str_replace(",",".", $ValorTotal);
	//UPDATE NA TABELA DE ATENDIMENTO - TABELA PAI    
	$SQL = "UPDATE ATENDIMENTO SET	IDCLIENTE = $idCliente , 
								   	IDBARBEIRO = $idBarbeiro , 
									DT_HR_SALVOU = $dtHr , 
									VALORTOTAL = $ValorTotal,
									STATUS = 'F'
			WHERE IDAGENDA = $xIDAgenda ";	
$rs = mysqli_prepare($banco,$SQL);
//var_dump($SQL);
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

$SQL =  "UPDATE AGENDA SET COLOR = '#00CED1' WHERE IDAGENDA = $xIDAgenda";
$rs = mysqli_prepare($banco,$SQL);
mysqli_stmt_execute($rs);
exit(1);
header('location: ../agenda/agendaEditRicardo.php');			
