<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");
// muda fonte e coloca em negrito
//$Data=$_GET['data_registo'];
//$Genero=$_GET['Genero'];
$pdo = Ligar::chamar_bd();

//Cabeçalho do Report
$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);



$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v");
$Pegar_paciente->execute();

$Total=$pdo->prepare("SELECT count(*) From paciente_v");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);  

/*
if($Data==""){
$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v");
$Pegar_paciente->execute();
$Total=$pdo->prepare("SELECT count(*) From paciente_v");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);  
}  else {
$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v WHERE Genero='$Genero' OR data_registo='$Data' ");
$Pegar_paciente->execute();
$Total=$pdo->prepare("SELECT count(*) From paciente_v WHERE Genero='$Genero' OR data_registo='$Data' ");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
}
if($Genero==""){
    $Pegar_paciente=$pdo->prepare("SELECT * From paciente_v");
$Pegar_paciente->execute();
$Total=$pdo->prepare("SELECT count(*) From paciente_v");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);    
}  else {
    
$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v WHERE Genero='$Genero' Or data_registo='$Data'");
$Pegar_paciente->execute();
$Total=$pdo->prepare("SELECT count(*) From paciente_v WHERE Genero='$Genero' OR data_registo='$Data'");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);

}
*/

ini_set('display_startup_errors', 1);
 ini_set('display_errors', 1);
 error_reporting(-1);
 ob_start();
 

 //Cabelaho do report 

$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B','14');
//$pdf->Image('../img/logo.jpg','95','4','18','jpg');
$pdf->Cell('188','17',utf8_decode('[LOGO] ').$resultado['Desc_filiar'],'','','L');
$pdf->Ln(17);
$pdf->SetFont('Times','','12');
$pdf->Cell('188','7',utf8_decode($resultado['Bairro']),'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode($resultado['Rua']),'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Telefone: ').$resultado['Telefone'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Nº Contribuinte: ').$resultado['N_Contribuiente'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('WebSite: ').$resultado['Web_site'].utf8_decode('               Email: ').$resultado['Email'],'','','L');
$pdf->SetFont('Times','B','10');
$pdf->Ln(18);
$pdf->Cell('280','8',utf8_decode('LISTAGEM DOS PACIENTES REGISTADOS'),'','','C');
$pdf->Ln(16);

// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(10, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(70, $altura, 'Nome Paciente', 1, 0, 'L',TRUE);
$pdf->Cell(20, $altura, 'Sexo', 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, 'Data Nascimento', 1, 0, 'L',TRUE);
$pdf->Cell(11, $altura, 'Idade', 1, 0, 'L',TRUE);
$pdf->Cell(54, $altura, 'Morada', 1, 0, 'L',TRUE);
$pdf->Cell(53, $altura, 'Data de Registo', 1, 0, 'L',TRUE);
$pdf->Cell($largura, $altura, 'Estado', 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito;
$pdf->SetFont('Arial', '', 9);
 $c=0; while ($Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC)) {
     $c++;
        $pdf->Cell(10, $altura, $c, 1, 0, 'L');
	$pdf->Cell(70, $altura, utf8_decode($Linha['Nome_Paciente']), 1, 0, 'L');
	$pdf->Cell(20, $altura, $Linha['genero'], 1, 0, 'L');
        $pdf->Cell(30, $altura, $Linha['data_nasc'], 1, 0, 'L');
	    $pdf->Cell(11, $altura, $Linha['idade'], 1, 0, 'L');
        $pdf->Cell(54, $altura, $Linha['Municipio_Localidade'], 1, 0, 'L');
        $pdf->Cell(53, $altura, $Linha['data_registo'], 1, 0, 'L');
        $pdf->Cell($largura, $altura, $Linha['estado'], 1, 0, 'L');
	$pdf->ln(5.9);
	}
$pdf->SetFont('Arial', 'b', 9);
//$pdf->Cell(70, $altura, utf8_decode('Total:  «««««««««««»»»»»»»»»»»»»»»»:  ').$Linha2['count(*)'], 1, 0, 'L');
$pdf->Ln(12);
	$pdf->Ln($altura);

$pdf->SetFont('Times','','12');
$pdf->Cell('260','10',utf8_decode("                                              A Gerência       				                 "),'','','C');
$pdf->Ln(10);
$pdf->Cell('260','10',utf8_decode("                     _______________________________"),'','','C');
$pdf->Ln(20); 
$pdf->SetFont('Times','','10');
$pdf->cell('280','5',utf8_decode("Documento Processado pelo Computador                                                                                                      Software AmaClinicas V1.00  - www.amatech.com                      Data:.." .date('Y-m-d')." || ".date('H:m')),'','','C',TRUE);
// exibindo o PDF
$pdf->Output();?>