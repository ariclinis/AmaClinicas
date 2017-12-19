<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");

// muda fonte e coloca em negrito
//$data1=$_POST['data_inicio'];
//$data2=$_POST['data_fim'];
//$Texto=$_POST['texto'];
//$Nom_doctor=$_POST['Nome'];
//$Diagnostico=$_POST['Diagnostico']; 
$pdo = Ligar::chamar_bd();
//
//
//if($data1==""){
//$Pegar_paci_atedindos=$pdo->prepare("SELECT * From atendimento_v");
//$Pegar_paci_atedindos->execute();
//$Contar_Total=$pdo->prepare("SELECT count(*) From atendimento_v");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);
//     

$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);


//}else{
//$Pegar_paci_atedindos=$pdo->prepare("SELECT * From atendimento_v where  Data_Atend BETWEEN '$data1' and '$data2' or Des_Diag='$Diagnostico' or Nome='$Nom_doctor'");
//$Pegar_paci_atedindos->execute();
//$Linha = $Pegar_paci_atedindos->fetch(PDO::FETCH_ASSOC);
//
//$Contar_Total=$pdo->prepare("SELECT count(*) From atendimento_v where Data_Atend BETWEEN '$data1' and '$data2' or Des_Diag='$Diagnostico' or Nome='$Nom_doctor'");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);
//}


$Pegar_paci_atedindos=$pdo->prepare("SELECT * From meus_pacientes_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'");
$Pegar_paci_atedindos->execute();

$Contar_Total=$pdo->prepare("SELECT count(*) From meus_pacientes_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'");
$Contar_Total->execute();
$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);






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
$pdf->Ln(13);
$pdf->Cell('280','8',utf8_decode('LISTAGEM DAS CONSULTAS ATENDIDAS'),'','','C');
$pdf->Ln(13);
// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(10, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(72, $altura, 'Nome do Paciente', 1, 0, 'L',TRUE);
$pdf->Cell(22, $altura, 'Sexo', 1, 0, 'L',TRUE);
$pdf->Cell(12, $altura, 'Idade', 1, 0, 'L',TRUE);
$pdf->Cell(25, $altura, 'Data Atend', 1, 0, 'L',TRUE);
$pdf->Cell(18, $altura, 'Hora', 1, 0, 'L',TRUE);
$pdf->Cell(50, $altura, 'Especialidade', 1, 0, 'L',TRUE);
$pdf->Cell(70, $altura, 'Nome do Doctor', 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito
$pdf->SetFont('Arial', '', 9);
$num=0;while ($Linha = $Pegar_paci_atedindos->fetch(PDO::FETCH_ASSOC)) {
$num++;
        $pdf->Cell(10, $altura, $num, 1, 0, 'L');
	$pdf->Cell(72, $altura, $Linha['Nome_Paciente'], 1, 0, 'L');
        $pdf->Cell(22, $altura, $Linha['genero'], 1, 0, 'L');
        $pdf->Cell(12, $altura, $Linha['idade'], 1, 0, 'L');
        $pdf->Cell(25, $altura, $Linha['Data_Consult'], 1, 0, 'L');
        $pdf->Cell(18, $altura, $Linha['Hora_Inicio'], 1, 0, 'L');
        $pdf->Cell(50, $altura, $Linha['Tipo_Consulta'], 1, 0, 'L');
        $pdf->Cell(70, $altura, $Linha['Nome_Medico'], 1, 0, 'L');
        $pdf->ln(5.9);
	}
//$acerto=$Linha2['count(*)']-1;
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(70, $altura, utf8_decode('Total:      «««««««««««»»»»»»»»»»»» :       ').$Linha2['count(*)'], 1, 0, 'L');
$pdf->Ln(12);
$pdf->Ln($altura);
$pdf->SetFont('Times','b','10');
$pdf->Cell('260','10',utf8_decode("                                                            O Médico(a)        				             	                                             "),'','','C');
$pdf->Ln(10);
$pdf->Cell('260','10',utf8_decode("               _______________________________                          "),'','','C');
$pdf->Ln(16);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','b','10');
$pdf->cell('280','5',utf8_decode("Documento Processado pelo Computador!                                                                                            Software AmaClinicas V1.0  - www.amatechs.org                      Data:..".date('Y-m-d')."  ||  ".date('H:m')),'','','C',TRUE);
// exibindo o PDF
$pdf->Output();?>