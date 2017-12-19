<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");


$pdo = Ligar::chamar_bd();

// muda fonte e coloca em negrito
//$data1=$_POST['data_inicio'];
//$data2=$_POST['data_fim'];
//$data_consulta=$_POST['data'];
//$Texto=$_POST['texto'];
//$Nom=$_POST['funcionario'];
//$Consulta_Marcada=$_POST['Consulta']; 
//$Estado=$_POST['Estado'];

//if($Nom ==""){
//    $Nom='Todos';   
//}
//if($Consulta_Marcada ==""){ 
//$Consulta_Marcada='Todas';
//$Pegar_paci_marcados=$pdo->prepare("SELECT * From meus_pacientes_v");
//$Pegar_paci_marcados->execute();
// 
//$Contar_Total=$pdo->prepare("SELECT count(*) From meus_pacientes_v");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);
//
//}
// else {
//
//$Pegar_paci_marcados=$pdo->prepare("SELECT * From meus_pacientes_v where Data_Registo BETWEEN '$data1' and '$data2' or Data_Consult='$data_consulta' or Nome_User='$Nom' or Descricao_Consulta='$Consulta_Marcada' or Estado_Consulta='$Estado'");
//$Pegar_paci_marcados->execute();
//
//$Contar_Total=$pdo->prepare("SELECT count(*) From meus_pacientes_v where Data_Registo BETWEEN '$data1' and '$data2' or Data_Consult='$data_consulta' or Nome_User='$Nom' or Descricao_Consulta='$Consulta_Marcada' or Estado_Consulta='$Estado'");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);    
//}
//if($Estado ==""){
//$Estado='Todos';
//$Pegar_paci_marcados=$pdo->prepare("SELECT * From meus_pacientes_v");
//$Pegar_paci_marcados->execute();
//
//$Contar_Total=$pdo->prepare("SELECT count(*) From meus_pacientes_v");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);
//}
// else {
//
//$Pegar_paci_marcados=$pdo->prepare("SELECT * From meus_pacientes_v where Data_Registo BETWEEN '$data1' and '$data2' or Data_Consult='$data_consulta' or Nome_User='$Nom' or Descricao_Consulta='$Consulta_Marcada' or Estado_Consulta='$Estado'");
//$Pegar_paci_marcados->execute();
//
//$Contar_Total=$pdo->prepare("SELECT count(*) From meus_pacientes_v where Data_Registo BETWEEN '$data1' and '$data2' or Data_Consult='$data_consulta' or Nome_User='$Nom' or Descricao_Consulta='$Consulta_Marcada' or Estado_Consulta='$Estado'");
//$Contar_Total->execute();
//$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);    
//}


$Pegar_paci_marcados=$pdo->prepare("SELECT distinct N_Consulta_Analise,Nome_Paciente,genero,Situa,Data_Registo,Estado_Consulta From analises_marcadas_v where Estado_Consulta='Agendada'");
$Pegar_paci_marcados->execute();

$Contar_Total=$pdo->prepare("SELECT  count(distinct N_Consulta_Analise,Nome_Paciente,genero,Situa,Data_Registo,Estado_Consulta) From analises_marcadas_v where Estado_Consulta='Agendada'");
$Contar_Total->execute();
$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);

$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B','14');
//$pdf->Image('../Rports/logo.jpg', '140', '4', '18', 'jpg');
$pdf->Cell('188','17',utf8_decode('[LOGO] ').$resultado['Desc_filiar'],'','','L');
$pdf->Ln(16);
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
$pdf->Cell('188','8',utf8_decode('LISTAGEM DAS CONSULTAS MARCADAS'),'','','C');
$pdf->Ln(5);

//$pdf->Cell('280','8',utf8_decode('Doctores(a): ').utf8_decode($Nom).(',    ').utf8_decode('Tipo de Consultas:  ').utf8_decode($Consulta_Marcada).(',   ').utf8_decode('Estado:  ').utf8_decode($Estado),'','','L');

$pdf->Ln(8);
// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 

$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(20, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(60, $altura, 'Nome do Paciente', 1, 0, 'L',TRUE);
$pdf->Cell(21, $altura, 'Sexo', 1, 0, 'L',TRUE);
$pdf->Cell(33, $altura, utf8_decode('Situação'), 1, 0, 'L',TRUE);
$pdf->Cell(25, $altura, utf8_decode('Data Consulta'), 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, 'Estado Consulta', 1, 0, 'L',TRUE);
// criando os cabeçalhos para 5 colunas
// pulando a linha
$pdf->Ln($altura);
// tirando o negrito
$pdf->SetFont('Arial', '', 9);
$cont2=0; while ($Linha = $Pegar_paci_marcados->fetch(PDO::FETCH_ASSOC)) {
$cont2++;
     $pdf->Cell(20, $altura, $Linha['N_Consulta_Analise'], 1, 0, 'L');
	$pdf->Cell(60, $altura, utf8_decode($Linha['Nome_Paciente']), 1, 0, 'L');
        $pdf->Cell(21, $altura, $Linha['genero'], 1, 0, 'L');
        $pdf->Cell(33, $altura, utf8_decode($Linha['Situa']), 1, 0, 'L');
	$pdf->Cell(25, $altura, utf8_decode($Linha['Data_Registo']), 1, 0, 'L');
        $pdf->Cell(30, $altura, $Linha['Estado_Consulta'], 1, 0, 'L');
	$pdf->ln(5.9);
	}
        
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(70, $altura, utf8_decode('Total:  ««««««««««»»»»»»»»»»»»»»»:       ').$Linha2['count(distinct N_Consulta_Analise,Nome_Paciente,genero,Situa,Data_Registo,Estado_Consulta)'], 1, 0, 'L');
$pdf->Ln(20);
$pdf->Ln($altura);
$pdf->Ln(16);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','','10');
$pdf->Footer(PREG_SET_ORDER);
$pdf->cell('188','5',utf8_decode("Software AmaClinicas V1.00 - www.amatechs.org                                                                                      Data.:".date('Y-m-d')."  ||  ".date('H:m')),'','','C',TRUE);
// exibindo o PDF
$pdf->Output();?>