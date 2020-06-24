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
$arquivo = "relatorioGeralDiario.pdf";
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
	$pdf->Cell(0,10,$objF->trataCarater('Relatório Diário ',1).date('d-m-Y'),0,1,$alinhaR);
	
	$data = date('Y-m-d');    
    
    include_once("../bd.php");
	$sql = "SELECT A.IDBARBEIRO, B.NOME,DATE_FORMAT(AG.DATAHORA,'%d/%m/%Y') AS DATA, 
			COUNT(A.IDBARBEIRO) AS QTDEATEND,  SUM(A.VALORTOTAL) AS VALORDIARIO
			FROM ATENDIMENTO A
			INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO
			INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA
			WHERE A.STATUS = 'F'
			AND CAST(AG.DATAHORA AS DATE)= '$data'
			GROUP BY A.IDBARBEIRO, B.NOME
			ORDER BY NOME";
	$resultado = mysqli_query($banco, $sql);	
	
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(80,7,'Barbeiro',$border,0,$alinhaC);
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(30,7,'Data',$border,0,$alinhaC);
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(45,7,'Qtde Atendimento',$border,0,$alinhaC);
	$pdf->SetFont($fonte,$estilo,13);
	$pdf->Cell(35,7,'Lucro',$border,1,$alinhaC);	
	
	while ($dados = mysqli_fetch_assoc($resultado)) :

		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(80,5,$dados['NOME'],$border,0,$alinhaL);		
		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(30,5,$dados['DATA'],$border,0,$alinhaC);		
		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(45,5,$dados['QTDEATEND'],$border,0,$alinhaC);		
		$pdf->SetFont($fonte,'',12);
		$pdf->Cell(35,5,'R$ '.$dados['VALORDIARIO'],$border,1,$alinhaC);				

	endwhile;
//FECHANDO O ARQUIVO
$pdf->Output($arquivo,$tipo_pdf);
?>