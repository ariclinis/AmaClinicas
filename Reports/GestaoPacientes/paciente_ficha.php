<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");
  
//$cod= base64_decode(filter_input(INPUT_GET, 'cod_paciente')) ;
$codigo_paciente=  filter_input(INPUT_GET, 'cod_paciente');

$pdo = Ligar::chamar_bd();

$Pegar_paciente=$pdo->prepare("SELECT * From paciente_v Where id=$codigo_paciente");
$Pegar_paciente->execute();
$Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC);

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
$pdf->Cell('188','8',utf8_decode('FICHA DO PACIENTE'),'','','C');
$pdf->Ln(14);

$pdf->SetFont('Arial','b','11');
$pdf->Cell('190','5',utf8_decode('                                                                                                                                             '),0,0,'c');
$pdf->Ln(0);
$pdf->SetFont('Times','','12');
// largura padrão das colunas
$pdf->SetFont('Times','','12');
$pdf->SetFillColor(160,160, 160);
// INFORMAÇÕES PESSOAIS DO PACIENTE
$pdf->Cell('190','6',utf8_decode('Dados Pessoas'),0,0,'L',true);
$pdf->Ln(10);
$pdf->SetFont('Times','b','11');
$pdf->Cell('190','6',utf8_decode('Nº Paciente:  ').$Linha['id'],0,0,'L');
$pdf->Ln(6);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Nome do Paciente:  ').$Linha['Nome_Paciente'],0,0,'L');
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode('Filiação:  ')
.$Linha['nome_pai'].utf8_decode('  &  ').utf8_decode($Linha['nome_mae']),0,0,'L');
$pdf->Ln(6);
$pdf->Cell('76','6',utf8_decode('Data de Nascimento:  ').$Linha['data_nasc'].utf8_decode('    Idade:  '),$Linha['idade'],0,0,0);
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode('Sexo:  ').$Linha['genero'],0,1,'L');

// INFORMAÇÕES DOCUMENTAL DO PACIENTE
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode('Documentos de Identificação'),0,0,'L',true);
$pdf->Ln(10);
$pdf->Cell('190','6',utf8_decode('Bilhete de Identidade:  ').$Linha['n_bi'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell('190','6',utf8_decode('Cédula:  '),0,0,'L');
$pdf->Ln(10);

// INFORMAÇÕES DE LOCALIZAÇÃO DO PACIENTE
$pdf->Cell('190','6',utf8_decode('Morada e Contactos'),0,0,'L',true);
$pdf->Ln(10);
 //$pdf->Cell('190','6',utf8_decode('Bairro:  ').$Linha['Discricao_Bairro'],0,0,'L');
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode('E-mail:  ').$Linha['Email'].utf8_decode('         Telefone:  ').$Linha['Telefone'],0,0,'L');
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode('Província:  ').$Linha['Provincia_localidade'].utf8_decode('        Municipio:  ').utf8_decode($Linha['Municipio_Localidade']),0,0,'L');
$pdf->Ln(10);
$pdf->Cell('190','6',utf8_decode('Informações de Registo'),0,0,'L',true);
$pdf->Ln(10);
$pdf->Cell('190','6',utf8_decode('Filiar:  ').$Linha['Desc_filiar'].utf8_decode('          Data de Registo:  ').utf8_decode($Linha['data_registo'].utf8_decode('             Estado:  ').utf8_decode($Linha['estado'])),0,0,'L');
$pdf->Ln(12);
// INFORMAÇÕES ADICINAIS
$pdf->Cell('190','6',utf8_decode('Observações'),0,0,'L',true);
$pdf->Ln(10);
$pdf->Cell('190','6',$Linha['obs'],0,0,'L');
$pdf->Ln(48);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','b','10');
//Rodape
$pdf->cell('187','5',utf8_decode("Software AmaClinicas V1.00                                                                                                                    Data:..".date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF
$pdf->Output();?>