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

session_start();

$nomeUser=$_SESSION['cod'];
 
$Pegar_user=$pdo->prepare("SELECT * From tbl_utilizador where id=$nomeUser");
$Pegar_user->execute();
$userEncontrado = $Pegar_user->fetch(PDO::FETCH_ASSOC);



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


$Pegar_paci_atedindos=$pdo->prepare("SELECT distinct N_Consulta_Analise,Nome_Paciente,genero,data_nasc,Data_Registo FROM analises_marcadas_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'");
$Pegar_paci_atedindos->execute();

$Contar_Total=$pdo->prepare("SELECT count(distinct N_Consulta_Analise) From analises_marcadas_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'");
$Contar_Total->execute();
$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);






$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B','14');
$pdf->Image('../../Reports/logo.jpg','12','10','36','jpg');
$pdf->Ln(20);
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
$pdf->Cell('188','8',utf8_decode('LISTAGEM DAS ANALISES ATENDIDAS'),'','','C');
$pdf->Ln(13);
// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(8, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(25, $altura, utf8_decode('Nº Consulta'), 1, 0, 'L',TRUE);
$pdf->Cell(85, $altura, 'Nome do Paciente', 1, 0, 'L',TRUE);
$pdf->Cell(23, $altura, 'Sexo', 1, 0, 'L',TRUE);
$pdf->Cell(25, $altura, 'Data Nasc', 1, 0, 'L',TRUE);
$pdf->Cell(25, $altura, 'Data Atend', 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito
$pdf->SetFont('Arial', '', 11);
$num=0;while ($Linha = $Pegar_paci_atedindos->fetch(PDO::FETCH_ASSOC)) {
$num++;
        $pdf->Cell(8, $altura, $num, 1, 0, 'L');
        $pdf->Cell(25, $altura, $Linha['N_Consulta_Analise'], 1, 0, 'L');
	$pdf->Cell(85, $altura, $Linha['Nome_Paciente'], 1, 0, 'L');
        $pdf->Cell(23, $altura, $Linha['genero'], 1, 0, 'L');
        $pdf->Cell(25, $altura, $Linha['data_nasc'], 1, 0, 'L');
        $pdf->Cell(25, $altura, $Linha['Data_Registo'], 1, 0, 'L');
        $pdf->ln(5.9);
	}
//$acerto=$Linha2['count(*)']-1;
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(70, $altura, utf8_decode('Total:      «««««««««««»»»»»»»»»»»» :       ').$Linha2['count(distinct N_Consulta_Analise)'], 1, 0, 'L');
$pdf->Ln(12);
$pdf->Ln($altura);
$pdf->Ln(16);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','b','10');
$pdf->cell('188','5',utf8_decode("Software AmaClinicas V1.0  - www.amatechs.org     "."              Utilizador: ".$userEncontrado['Nome_User']. "                Data:".date('Y-m-d')."  ||  ".date('H:m')),'','','',TRUE);
// exibindo o PDF
$pdf->Output();?>