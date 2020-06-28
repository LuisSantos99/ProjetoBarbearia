<?php
//BUSCANDO A CLASS
require_once "../../fpdf182/fpdf.php";
require_once "../Funcoes.php";
//ESTANCIANDO 
//Inicia o documento PDF com orientação P - Retrato ou L - Paisagem
$objF = new Funcoes();
$pdf = new FPDF();
$pdf->AddPage();

//NOME DO ARQUIVO AO SER GERADO OU GERA O NOME DO ARQUIVO LOCAL COM O LOCAL A SER SALVO
$arquivo = "relatorioClientesFieis.pdf";
//DEFININDO FORMATAÇÃO DO PDF

$fonte = "Arial";
$estilo = "B";
$border = "1";
$alinhaC = "C";
$alinhaL = "L";
$alinhaR = "R";
$objImg = 'LogoOficial.png';
/* ****** GERAR COMO  ******
 I: Envia o arquivo para o navegador, o visualizador de PDF é usado se disponível.
 D: Enviar para o navegador e forçar o arquivo um download com o nome especificado.
 F: Salva o arquivo local com o nome dado por name(pode incluir um caminho).
 S: Retorna o documento como uma string. 
 DEFAULT: o valor padrão é I.
*/
$tipo_pdf = "I";
date_default_timezone_set('America/Sao_Paulo');

	//SetY(tamanho) : FUNÇÃO QUE DÁ ESPAÇAMENTO NO EIXO X
	$pdf->SetY(55);
	
	$pdf->Image('../../img/'.$objImg,70,15,0,50,'PNG');
	//SetFont: DEFINE O TIPO DE FONTE, ESTILO E TAMANHO DO TEXTO
	// $pdf->SetFont($fonte,$estilo,15);
	// $pdf->Cell(80,10,'Mustache BarberShop',0,1,$alinhaC);
	$pdf->SetFont('Courier',$estilo,15);
	$pdf->Cell(0,10,$objF->trataCarater('Relatório Clientes Fiéis',1),0,1,$alinhaR);
	$pdf->SetFont('Courier',$estilo,12);
	$pdf->Cell(0,10,$objF->trataCarater('Emitido em ' .date('d/m/Y'),1),0,1,$alinhaR);

	$data = date('Y-m-d');        
    include_once("../bd.php");
    $rank = 1;
	$sql = "SELECT A.IDCLIENTE, C.NOME, COUNT(A.IDCLIENTE) AS QTDEATEND
			FROM ATENDIMENTO A
			INNER JOIN CLIENTES C ON C.IDCLIENTE = A.IDCLIENTE
			INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA
			WHERE A.STATUS = 'F'			
			GROUP BY A.IDCLIENTE, C.NOME
			ORDER BY QTDEATEND desc";
	$resultado = mysqli_query($banco, $sql);	

	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(30,7,'',$border,0,$alinhaC);	
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(115,7,'Cliente',$border,0,$alinhaC);
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(45,7,'Qtde Atendimento',$border,1,$alinhaC);
		
	while ($dados = mysqli_fetch_assoc($resultado)) :
		$pdf->SetFont($fonte,$estilo,13);
		$pdf->Cell(30,5,$objF->trataCarater($rank.'º',1),$border,0,$alinhaC);	
		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(115,5,$objF->trataCarater($dados['NOME'],1),$border,0,$alinhaL);				
		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(45,5,$dados['QTDEATEND'],$border,1,$alinhaC);		
		$rank = $rank + 1;
	endwhile;
//FECHANDO O ARQUIVO
$pdf->Output($arquivo,$tipo_pdf);
?>