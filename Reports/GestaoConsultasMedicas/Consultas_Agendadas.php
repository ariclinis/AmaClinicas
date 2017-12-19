<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");
// muda fonte e coloca em negrito
$pdo = Ligar::chamar_bd();
//$Data_Agenda=$_POST['data'];
//$Estado_Agenda=$_POST['Estado'];
////$Tipo_Sangue=$_GET['Tipo_Saguino'];
//
//if($Data_Agenda=="" && $Estado_Agenda==""){
//$Pegar_Consultas_Agendadas=$pdo->prepare("SELECT * From agendar_v");
//$Pegar_Consultas_Agendadas->execute();
//$Total=$pdo->prepare("SELECT count(*) From agendar_v");
//$Total->execute();
//$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
//} else{
    
//$Pegar_Consultas_Agendadas=$pdo->prepare("SELECT * From agendar_v where Data_Agenda='$Data_Agenda' or Estado_agenda='$Estado_Agenda'");
//$Pegar_Consultas_Agendadas->execute(); 
//$Total=$pdo->prepare("SELECT count(*) From agendar_v where Data_Agenda='$Data_Agenda' or Estado_agenda='$Estado_Agenda'");
//$Total->execute();
//$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);

$Pegar_Consultas_Agendadas=$pdo->prepare("SELECT * From agendar_v");
$Pegar_Consultas_Agendadas->execute(); 


$Total=$pdo->prepare("SELECT count(*) From agendar_v");
$Total->execute();
$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
//}

$pdf=new FPDF('P','mm','A4');
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
$pdf->Ln(10);
$pdf->Cell('188','8',utf8_decode('LISTAGEM DAS CONSULTAS AGENDADAS'),'','','C');
$pdf->Ln(10);
//largura padrão das colunas
$largura = 30;
//altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(8, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(45, $altura, 'Nome do Doctor', 1, 0, 'L',TRUE);
$pdf->Cell(23, $altura, 'Data Agenda', 1, 0, 'L',TRUE);
$pdf->Cell(20, $altura, 'Hora', 1, 0, 'L',TRUE);
$pdf->Cell(40, $altura, 'Consulta Agendada', 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, 'Data de Registo', 1, 0, 'L',TRUE);
$pdf->Cell(26, $altura, 'Estado', 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito

$pdf->SetFont('Arial', '', 9);
$cont=0; while ($Linha = $Pegar_Consultas_Agendadas->fetch(PDO::FETCH_ASSOC)) {
 $cont++;
$pdf->Cell(8, $altura, $cont, 1, 0, 'L');
	$pdf->Cell(45, $altura, $Linha['nome'], 1, 0, 'L');
	$pdf->Cell(23, $altura, $Linha['Data_Agenda'], 1, 0, 'L');
        $pdf->Cell(20, $altura, $Linha['Hora_Inicio'], 1, 0, 'L');
        $pdf->Cell(40, $altura, $Linha['Descricao'], 1, 0, 'l');
        $pdf->Cell(30, $altura, $Linha['data_registo'], 1, 0, 'L');
	$pdf->Cell(26, $altura, $Linha['Estado_agenda'], 1, 0, 'L');
        $pdf->ln(5.9);
	}
//$acerto=-1;

$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(53, $altura, utf8_decode('Total:  ««««««»»»»»»»»»»»:     ').$Linha2['count(*)'], 1, 0, 'L');
$pdf->Ln(8);
	$pdf->Ln($altura);
// montando a tabela com os dados (presumindo que a consulta já foi feita)
/*
while( $row = mysql_fetch_assoc($rs) )
{
	$pdf->Cell($largura, $altura, $row['codusuario'], 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row['nome'], 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row['email'], 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row['telefne'], 1, 0, 'L');
	$pdf->Cell($largura, $altura, $row['ativo'], 1, 0, 'C');
	$pdf->Ln($altura);
}*/
        
$pdf->SetFont('Times','','10');
$pdf->SetAutoPageBreak(true, 0);
$pdf->Setxy(145,243.9);
// INFORMAÇÕES
$pdf->Ln(20);
//Rodape
//Definir cor de Text
$pdf->SetTextColor(255);
$pdf->SetFont('Times','B','10');
$pdf->cell('187','5',utf8_decode("Software AmaClinicas V1.0                                                                                                               Data.:".date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF
$pdf->Output();?>