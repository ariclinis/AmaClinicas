<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");
// muda fonte e coloca em negrito
$cod=filter_input(INPUT_GET, 'cod_paciente');
$pdo = Ligar::chamar_bd();

$Pegar_Sexo_f=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE genero='Femenino'");
$Pegar_Sexo_f->execute();
$Linha = $Pegar_Sexo_f->fetch(PDO::FETCH_ASSOC);
$Pegar_Sexo_M=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE genero='Masculino'");
$Pegar_Sexo_M->execute();
$Linha2 = $Pegar_Sexo_M->fetch(PDO::FETCH_ASSOC);

$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);

/*
$Pegar_Sagui_O=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE Tipo_Saguino='O'");
$Pegar_Sagui_O->execute();
$Linha3 = $Pegar_Sagui_O->fetch(PDO::FETCH_ASSOC);
$Pegar_Sagui_A=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE Tipo_Saguino='A'");
$Pegar_Sagui_A->execute();
$Linha4 = $Pegar_Sagui_A->fetch(PDO::FETCH_ASSOC);
$Pegar_Sagui_B=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE Tipo_Saguino='B'");
$Pegar_Sagui_B->execute();
$Linha5 = $Pegar_Sagui_B->fetch(PDO::FETCH_ASSOC);
$Pegar_Sagui_AB=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE Tipo_Saguino='B'");
$Pegar_Sagui_AB->execute();
$Linha6 = $Pegar_Sagui_AB->fetch(PDO::FETCH_ASSOC);
*/
$Pegar_estado_Activo=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE estado='Activo'");
$Pegar_estado_Activo->execute();
$Linha7 = $Pegar_estado_Activo->fetch(PDO::FETCH_ASSOC);
$Pegar_estado_Inactivo=$pdo->prepare("SELECT COUNT(*) From paciente_v WHERE estado='Inativo'");
$Pegar_estado_Inactivo->execute();
$Linha8 = $Pegar_estado_Inactivo->fetch(PDO::FETCH_ASSOC);

$Pegar_total_geral=$pdo->prepare("SELECT COUNT(*) From paciente_v");
$Pegar_total_geral->execute();
$Linha9 = $Pegar_total_geral->fetch(PDO::FETCH_ASSOC);


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
$pdf->Ln(18);
$pdf->Cell('188','8',utf8_decode('MAPA ESTATISTICO DOS PACIENTES REGISTADOS'),'','','C');
$pdf->Ln(16);

// largura padrão das colunas
$pdf->SetFont('Times','','12');
$pdf->SetFillColor(160,160, 160);
// INFORMAÇÕES PESSOAIS DO PACIENTE
$pdf->Cell('190','6',utf8_decode('Estatistica Geral'),0,0,'l',true);
$pdf->Ln(12);
$pdf->Cell('100','6',utf8_decode('Total Masculino    :                                  ').$Linha2['COUNT(*)'],0,0,'L');
$pdf->ln(8);
$pdf->Cell('190','6',utf8_decode('Total Femenino     :                                  ').$Linha['COUNT(*)'],0,0,'L');
$pdf->Ln(8);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Total Grupo Saguino (O):                        '),0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Total Grupo Saguino (A):                        '),0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Total Grupo Saguino (B):                        '),0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Total Grupo Saguino (AB):                     '),0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Total Estado- Activo    :                           ').$Linha7['COUNT(*)'],0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Total Estado- Inactivo  :                           ').$Linha8['COUNT(*)'],0,0,'L');
$pdf->Ln(12);
$pdf->Cell('190','4',utf8_decode('Total Geral: «««««««««»»»»»»»»»»»» : ').$Linha9['COUNT(*)'],0,0,'L', TRUE);
$pdf->Ln(60);

// INFORMAÇÕES 
$pdf->Cell('190','6',utf8_decode("                A Gerência                     "),'','','C');
$pdf->Ln(10);

$pdf->Cell('190','6',utf8_decode("                     _________________________________                       "),'','','C');
$pdf->Ln(20);
$pdf->SetFont('Times','','10');
//Rodape

$pdf->cell('187','5',utf8_decode("Software AmaClinicas V1.00                                                                                                                    Data:..".date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF

$pdf->Output();

?>


