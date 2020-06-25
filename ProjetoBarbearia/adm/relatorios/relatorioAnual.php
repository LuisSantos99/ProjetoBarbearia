<?php
//BUSCANDO A CLASS
require_once "../../fpdf182/fpdf.php";
require_once "../Funcoes.php";
//ESTANCIANDO 
//Inicia o documento PDF com orientação P - Retrato ou L - Paisagem
$objF = new Funcoes();
$pdf = new FPDF();
$pdf->AddPage();

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
//NOME DO ARQUIVO AO SER GERADO OU GERA O NOME DO ARQUIVO LOCAL COM O LOCAL A SER SALVO
$arquivo = "relatorioAnual.pdf";
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

function convert_date($before)
{
    return DateTime::createFromFormat('!m', (date('m') - $before))->format('F');
}

$meses = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
// $mesesExtenso = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 
//                     'Novembro', 'Dezembro');

date_default_timezone_set('America/Sao_Paulo');

//SetY(tamanho) : FUNÇÃO QUE DÁ ESPAÇAMENTO NO EIXO X
$pdf->SetY(55);

$pdf->Image('../../img/' . $objImg, 70, 15, 0, 50, 'PNG');
//SetFont: DEFINE O TIPO DE FONTE, ESTILO E TAMANHO DO TEXTO

$pdf->SetFont('Courier', $estilo, 15);
$pdf->Cell(0, 10, $objF->trataCarater('Relatório Anual ', 1) . date('Y'), 0, 1, $alinhaR);
$data = date('Y');
include_once("../bd.php");

$sql = "SELECT A.IDBARBEIRO, B.NOME
			FROM ATENDIMENTO A
			INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO
			INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA
			WHERE A.STATUS = 'F'
			AND YEAR(AG.DATAHORA) = '$data'
			GROUP BY A.IDBARBEIRO, B.NOME
			ORDER BY NOME";

$resultado = mysqli_query($banco, $sql);

foreach ($meses as &$value) {

    $sql = "SELECT A.IDBARBEIRO, B.NOME
			FROM ATENDIMENTO A
			INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO
			INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA
			WHERE A.STATUS = 'F'
			AND YEAR(AG.DATAHORA) = '$data'
            AND MONTH(DATAHORA) = '$value'
			GROUP BY A.IDBARBEIRO, B.NOME
            ORDER BY NOME";

    $pdf->SetFont($fonte, '', 12);
    $pdf->Cell(190, 7, strftime('%B', strtotime($value)) , $border, 1, $alinhaL);
    
    $resultado = mysqli_query($banco, $sql);
    while ($dados = mysqli_fetch_assoc($resultado)) :
        $pdf->SetFont($fonte, $estilo, 13);
        $pdf->Cell(80, 7, 'Barbeiro: ', $border, 0, $alinhaL);
        $pdf->SetFont($fonte, '', 12);
        $pdf->Cell(110, 7, $dados['NOME'], $border, 1, $alinhaL);

        $idBarbeiro = $dados['IDBARBEIRO'];
        $SELECT = "SELECT A.IDBARBEIRO, DATE_FORMAT(AG.DATAHORA,'%d/%m/%Y') AS DATA , 
        COUNT(AG.IDBARBEIRO)AS QTDEATEND, SUM(A.VALORTOTAL) AS VALORDIARIO
        FROM ATENDIMENTO A 
        INNER JOIN BARBEIRO B ON B.IDBARBEIRO = A.IDBARBEIRO 
        INNER JOIN AGENDA AG ON AG.IDAGENDA = A.IDAGENDA 
        WHERE YEAR(DATAHORA) = '$data' 
        AND MONTH(DATAHORA) = '$value'
        AND AG.IDBARBEIRO = $idBarbeiro
        AND STATUS = 'F'
        GROUP BY A.IDBARBEIRO, DATAHORA";
        $valorTotal = 0;

        $RESUL = mysqli_query($banco, $SELECT);

        while ($dadosSec = mysqli_fetch_assoc($RESUL)) :
            $pdf->SetFont($fonte, '', 12);
            $pdf->Cell(80, 5, $dadosSec['DATA'], $border, 0, $alinhaC);
            $pdf->SetFont($fonte, '', 12);
            $pdf->Cell(80, 5, $dadosSec['QTDEATEND'], $border, 0, $alinhaC);
            $pdf->SetFont($fonte, '', 12);
            $pdf->Cell(30, 5, 'R$ ' . $dadosSec['VALORDIARIO'], $border, 1, $alinhaC);

            $valorTotal = $valorTotal + $dadosSec['VALORDIARIO'];
        endwhile;

        $pdf->SetFont($fonte, $estilo, 13);
        $pdf->Cell(160, 7, 'Receita Total ', $border, 0, $alinhaR);
        $pdf->SetFont($fonte, $estilo, 13);
        $pdf->Cell(30, 7, 'R$ ' . $valorTotal, $border, 1, $alinhaC);

        $pdf->SetFont($fonte, $estilo, 13);
        $pdf->Cell(0, 7, '', 0, 1, $alinhaC);
    endwhile;
    $value = $value + 1;
    $pdf->SetFont($fonte, $estilo, 13);
    $pdf->Cell(0, 7, '', 0, 1, $alinhaC);

}
//FECHANDO O ARQUIVO
$pdf->Output($arquivo, $tipo_pdf);
