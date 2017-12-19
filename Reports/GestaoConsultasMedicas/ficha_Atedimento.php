<?php
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");
// muda fonte e coloca em negrito
$codigo= filter_input(INPUT_GET, 'cod_conusulta');

$pdo = Ligar::chamar_bd();

$Pegar_paci_atedindos = $pdo->prepare("SELECT * From meus_pacientes_v where Cod_Consulta=$codigo");
$Pegar_paci_atedindos->execute();
$Linha = $Pegar_paci_atedindos->fetch(PDO::FETCH_ASSOC);


$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B','14');
//$pdf->Image('../img/logo.jpg','95','4','18','jpg');
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
$pdf->Ln(15);
$pdf->Cell('188','8',utf8_decode('FICHA DO PACIENTE ATENDIDO'),'','','C');
$pdf->Ln(14);
// largura padrão das colunas
$pdf->SetFont('Arial','b','10');
$pdf->Cell('190','5',utf8_decode('                                                                                                                                                           Ficha nº : '),0,0,'c');
$pdf->Ln(0);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','5',date('Y').date('m').'0'.$Linha['Cod_Consulta'],0,0,'R');
$pdf->Ln(4);
$pdf->SetFont('Times','','12');
$pdf->SetFillColor(160,160, 160);

// INFORMAÇÕES PESSOAIS DO PACIENTE
$pdf->Cell('190','5',utf8_decode('Dados Pessoas'),0,0,'L',true);
$pdf->Ln(8);
$pdf->SetFont('Times','b','11');
$pdf->Cell('190','6',utf8_decode('Nº Paciente:  ').$Linha['Id_Paciente'],0,0,'L');
$pdf->Ln(8);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Nome do Paciente:  ').utf8_decode($Linha['Nome_Paciente']),0,0,'L');
$pdf->Ln(8);
$pdf->Cell('190','6',utf8_decode('Sexo:  ').$Linha['genero'].utf8_decode('    Idade: ').$Linha['idade'].('        '),0,0,'L');
$pdf->Ln(8);

// INFORMAÇÕES MEDICAS DO PACIENTE
$pdf->Cell('190','5',utf8_decode('Informações Médicas'),0,0,'L',true);
$pdf->Ln(8);
//$pdf->Cell('190','6',utf8_decode('Diagnostico :  ').utf8_decode($Linha['Des_Diag']).('                                         ').utf8_decode(' Patologia :  ').$Linha['Des_Patologias'],0,0,'L');
$pdf->Ln(10);
//$pdf->cell('190','6',utf8_decode('Analises Efetuadas: ').utf8_decode($Linha['Disc_Analise']).('                                                    ').utf8_decode('Resultado: ').$Linha['Resultado_Analise'],0,0,'L');
$pdf->Ln(8);

// INFORMAÇÕES ADICINAIS
$pdf->Cell('190','5',utf8_decode('Prescrição Médica'),0,1,'L',true);
$pdf->Ln(3);
//$pdf->Cell('190','5',utf8_decode('Indicacões::'),0,1,'L');
//$pdf->Cell('190','5',$Linha['Indicacoes'],0,1,'L');
//$pdf->Ln(2);
//$pdf->Cell('190','5',utf8_decode('Dose::'),0,1,'L');
//$pdf->Cell('190','5',$Linha['Dose'],0,1,'L');
//$pdf->Ln(2);
//$pdf->Cell('190','5',utf8_decode('Nº dias::'),0,1,'L');
//$pdf->Cell('190','5',$Linha['N_dias'],0,1,'L');
//$pdf->Ln(2);
//$pdf->Cell('190','5',utf8_decode('Quantidade::'),0,1,'L');
//$pdf->Cell('190','5',$Linha['Quantidade'],0,1,'L');
$pdf->Ln(4);

//Observações 
$pdf->Cell('190','5',utf8_decode('Observações'),0,1,'L',true);
$pdf->Ln(2);
//$pdf->Cell('190','5',utf8_decode(' '). utf8_decode($Linha['obs']),0,1,'L');
$pdf->Ln(15);

// INFORMAÇÕES DE LOCALIZAÇÃO DO PACIENTE
$pdf->Cell('190','5',utf8_decode('Dados Gerais'),0,0,'L',true);
$pdf->Ln(10);
$pdf->Cell('190','6',utf8_decode('Nome do Doctor(a):  ').utf8_decode($Linha['Nome_Medico']).('                                   ').utf8_decode(' Data:  ').utf8_decode($Linha['Data_Consult']).('                          ').utf8_decode('Hora:  ').$Linha['Hora_Inicio'],0,0,'L');
$pdf->Ln(10);
//$pdf->Cell('190','6',utf8_decode('Unidade de Intervenção:    ').utf8_decode($Linha['Descr_Unid_Interv']),0,0,'L');
$pdf->Ln(60);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','b','10');
//Rodape
$pdf->cell('190','5',utf8_decode("Software AmaClinicas V1.00                                                                                                            Data:" .date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF
$pdf->Output();?>