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
$arquivo = "relatorioMensal.pdf";
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
	$pdf->Cell(0,10,$objF->trataCarater('Relatório Mensal ',1).date('m/Y'),0,1,$alinhaR);	
    $pdf->SetFont('Courier',$estilo,12);
    $pdf->Cell(0,10,$objF->trataCarater('Emitido em ' .date('d/m/Y'),1),0,1,$alinhaR);    
	$data = date('m');        
    include_once("../bd.php");

	$sql = "SELECT A.IDBARBEIRO, B.NOME
			FROM ATENDIMENTO A
			INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO
			INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA
			WHERE A.STATUS = 'F'
			AND MONTH(AG.DATAHORA) = '$data'
			GROUP BY A.IDBARBEIRO, B.NOME
			ORDER BY NOME";
    $totalMensal = 0;
	$resultado = mysqli_query($banco, $sql);	
	
    while ($dados = mysqli_fetch_assoc($resultado)) :
        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(80,7,'Barbeiro: ',$border,0,$alinhaL);   
        $pdf->SetFont($fonte,'',12);
        $pdf->Cell(110,7,$dados['NOME'],$border,1,$alinhaL);		
        
        $idBarbeiro = $dados['IDBARBEIRO'];

        $SELECT = "SELECT COUNT(A.IDBARBEIRO)AS QTDEATEND, A.IDBARBEIRO, DATE_FORMAT(AG.DATAHORA,'%d/%m/%Y') AS DATA , 
         SUM(A.VALORTOTAL) AS VALORDIARIO
        FROM ATENDIMENTO A 
        INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO 
        INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA 
        WHERE MONTH(DATAHORA) = '$data' 
        AND AG.IDBARBEIRO = $idBarbeiro
        AND STATUS = 'F'
        GROUP BY DATE_FORMAT(AG.DATAHORA,'%d/%m/%Y')";

        $valorTotal = 0;

        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(80,7,'Data',$border,0,$alinhaC);
        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(80,7,'Qtde Atendimento',$border,0,$alinhaC);
        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(30,7,'Receita',$border,1,$alinhaC);	
        
        $RESUL = mysqli_query($banco, $SELECT);	
        while ($dadosSec = mysqli_fetch_assoc($RESUL)) :
            $pdf->SetFont($fonte,'',12);
            $pdf->Cell(80,5,$dadosSec['DATA'],$border,0,$alinhaC);		
            $pdf->SetFont($fonte,'',12);
            $pdf->Cell(80,5,$dadosSec['QTDEATEND'],$border,0,$alinhaC);		
            $pdf->SetFont($fonte,'',12);
            $pdf->Cell(30,5,'R$ '.$dadosSec['VALORDIARIO'],$border,1,$alinhaC);				

            $valorTotal = $valorTotal + $dadosSec['VALORDIARIO'];
        endwhile;

        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(160,7,'Receita Total ',$border,0,$alinhaR);

        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(30,7,'R$ '.$valorTotal,$border,1,$alinhaC);

        $pdf->SetFont($fonte,$estilo,13);
        $pdf->Cell(0,7,'',0,1,$alinhaC);
        $totalMensal = $totalMensal + $valorTotal;
	endwhile;
    $pdf->SetFont($fonte,$estilo,13);
    $pdf->Cell(160,7,'Receita Mensal ',$border,0,$alinhaR);
    $pdf->SetFont($fonte, $estilo, 13);
    $pdf->Cell(30, 7, 'R$ '.$totalMensal, $border, 1, $alinhaC);    
//FECHANDO O ARQUIVO
$pdf->Output($arquivo,$tipo_pdf);
?>