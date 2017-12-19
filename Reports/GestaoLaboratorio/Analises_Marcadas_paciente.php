<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");

// muda fonte e coloca em negrito
$n_consulta=  filter_input(INPUT_GET, 'n_consult');

$cod= base64_decode(filter_input(INPUT_GET, 'Cod_Pacie_Atendido'));
$n_receita= base64_decode(filter_input(INPUT_GET, 'n_receita'));
$pdo = Ligar::chamar_bd();

$Pegar_paciente=$pdo->prepare("SELECT * FROM analises_marcadas_v Where N_Consulta_Analise='$n_consulta'");
$Pegar_paciente->execute();
$Linha = $Pegar_paciente->fetch(PDO::FETCH_ASSOC);


$Pegar_paciente_=$pdo->prepare("SELECT * FROM analises_marcadas_v Where N_Consulta_Analise='$n_consulta'");
$Pegar_paciente_->execute();

$Pegar_paciente2 = $pdo->prepare("SELECT * FROM analises_marcadas_v Where N_Consulta_Analise='$n_consulta'");
$Pegar_paciente2->execute();


$Pegar_filiar=$pdo->prepare("SELECT * From filiares_clinicas_v");
$Pegar_filiar->execute();
$resultado = $Pegar_filiar->fetch(PDO::FETCH_ASSOC);



$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B','14');
$pdf->Image('../../Reports/logo.jpg','12','10','34','jpg');
$pdf->Ln(20);
$pdf->SetFont('Times','','12');
$pdf->Cell('188','7',utf8_decode($resultado['Bairro']),'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Nº Contribuinte: ').$resultado['N_Contribuiente'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('WebSite: ').$resultado['Web_site'].utf8_decode('               Email: ').$resultado['Email'].utf8_decode('           Telefone: ').$resultado['Telefone'],'','','L');
$pdf->SetFont('Times','B','10');
$pdf->Ln(6);
$pdf->SetFont('Times','B','10');
$pdf->Cell('188','8',utf8_decode('BOLETIM DE MARCAÇÃO'),'','','C');
$pdf->Ln(3);
$pdf->Ln(0);


$pdf->SetFont('Arial','','11');
$pdf->Cell('190','5','ORIGINAL',0,0,'R');
$pdf->Ln(4);
$pdf->SetFont('Times','','12');
// largura padrão das colunas
$pdf->SetFont('Times','','12');
$pdf->SetFillColor(160,160, 160);
// INFORMAÇÕES PESSOAIS DO PACIENTE
$pdf->Cell('190','6',utf8_decode('Dados Pessoas'),0,0,'L',true);
$pdf->Ln(6);
$pdf->SetFont('Times','b','11');
$pdf->Cell('190','6',utf8_decode('Consulta Nº :  ').$Linha['N_Consulta_Analise'],0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Data de Emissão :  ').$Linha['Data_Registo'].utf8_decode('                             Estado Consulta :  ').$Linha['Estado_Consulta'],0,0,'L');
$pdf->Ln(6);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',  utf8_encode('Nome do Paciente :  ').  utf8_decode($Linha['Nome_Paciente']).utf8_decode('                          Genero :  ').$Linha['genero'].utf8_decode('      Data de Nasc :  ').$Linha['data_nasc'],0,0,'L');
$pdf->Ln(6);


// INFORMAÇÕES DA RECEITA
$pdf->Cell('190','6',utf8_decode('Analises Marcadas'),0,0,'L',true);
$pdf->Ln(5);
// DESCRIÇÃO DA RECEITA

// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(10, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(120, $altura, utf8_decode('Descrição da Analise'), 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, 'Quantidades', 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, utf8_decode('Data Registo'), 1, 0, 'L',TRUE);


// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito;
$pdf->SetFont('Arial', '', 9);
 $c=0;$margem=0;
  while ($Linha1 = $Pegar_paciente_->fetch(PDO::FETCH_ASSOC)) {
     $c++;
        $pdf->Cell(10, $altura, $c, 1, 0, 'L');
	$pdf->Cell(120, $altura, utf8_decode($Linha1['DescAnalise']), 1, 0, 'L');
	$pdf->Cell(30, $altura, 1, 1, 0, 'L');
        $pdf->Cell(30, $altura, $Linha1['Data_Analise_reg'], 1, 0, 'L');
	$pdf->ln(5.9);
	$margem+=1.5;
	$margem_imagem=+8;
	}
$pdf->Ln(2);
$pdf->SetFont('Times','b','10');
$pdf->Cell('190','6',utf8_decode("                                                                                                                            O Médico/Enfermeiro                          	      			                                                                                       "),'','','C');
$pdf->Ln(4);
$pdf->Cell('190','6',utf8_decode("                                                                           _______________________________                                                                            "),'','','C');
$pdf->Ln(6); 

$pdf->SetFont('Times','','10');
//Rodape
$pdf->cell('190','5',utf8_decode("Software AmaClinicas V1.00                                                                                                                     Data : " .date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF


$pdf->SetFont('Times','','9');
$pdf->ln(4+$margem);

$pdf->Cell('188','1',utf8_decode('-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --'),'','','C');
$pdf->Ln(3);
$pdf->Image('../../Reports/logo.jpg','12',145+$margem_imagem,'35','jpg');
$pdf->SetFont('Times','B','14');
//$pdf->Cell('188','17',utf8_decode('[LOGO] ').$resultado['Desc_filiar'],'','','L');
$pdf->Ln(33);
$pdf->SetFont('Times','','12');
$pdf->Cell('188','7',utf8_decode($resultado['Bairro']),'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Nº Contribuinte: ').$resultado['N_Contribuiente'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('WebSite: ').$resultado['Web_site'].utf8_decode('               Email: ').$resultado['Email'].utf8_decode('           Telefone: ').$resultado['Telefone'],'','','L');
$pdf->Ln(6);
$pdf->SetFont('Times','B','10');
$pdf->Cell('188','8',utf8_decode('BOLETIM DE MARCAÇÃO'),'','','C');
$pdf->Ln(3);

$pdf->SetFont('Arial','b','11');
$pdf->Cell('190','5',utf8_decode('                                                                                                                                             '),0,0,'c');
$pdf->Ln(0);

$pdf->SetFont('Arial','','11');
$pdf->Cell('190','5','DUPLICADO',0,0,'R');
$pdf->Ln(4);
$pdf->SetFont('Times','','12');
// largura padrão das colunas
$pdf->SetFont('Times','','12');
$pdf->SetFillColor(160,160, 160);
// INFORMAÇÕES PESSOAIS DO PACIENTE
$pdf->Cell('190','6',utf8_decode('Dados Pessoas'),0,0,'L',true);
$pdf->Ln(6);
$pdf->SetFont('Times','b','11');
$pdf->Cell('190','6',utf8_decode('Consulta Nº :  ').$Linha['N_Consulta_Analise'],0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Data de Emissão :  ').$Linha['Data_Registo'].utf8_decode('                                                Estado Consulta :  ').$Linha['Estado_Consulta'],0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','','12');
$pdf->Cell('190','6',utf8_decode('Nome do Paciente :  ').utf8_decode($Linha['Nome_Paciente']).utf8_decode('                                             Genero :  ').$Linha['genero'].utf8_decode('      Idade :  ').$Linha['data_nasc'],0,0,'L');
$pdf->Ln(6);
// INFORMAÇÕES DA RECEITA
$pdf->SetFont('Times','b','10');
$pdf->Cell('190','6',utf8_decode('Analises Marcadas'),0,0,'L',true);
$pdf->Ln(6);
// DESCRIÇÃO DA RECEITA

// largura padrão das colunas
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(10, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(120, $altura, utf8_decode('Descrição da Analise'), 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, 'Quantidades', 1, 0, 'L',TRUE);
$pdf->Cell(30, $altura, utf8_decode('Data Registo'), 1, 0, 'L',TRUE);
$pdf->Ln($altura);
// tirando o negrito;
$pdf->SetFont('Arial', '', 9);
 $c=0; while ($Linha2 = $Pegar_paciente2->fetch(PDO::FETCH_ASSOC)) {
     $c++;
    	$pdf->Cell(10, $altura, $c, 1, 0, 'L');
	$pdf->Cell(120, $altura, utf8_decode($Linha2['DescAnalise']), 1, 0, 'L');
	$pdf->Cell(30, $altura, 1, 1, 0, 'L');
        $pdf->Cell(30, $altura, $Linha2['Data_Analise_reg'], 1, 0, 'L');
	$pdf->ln(5.9);
	}
$pdf->Ln(2);
$pdf->SetFont('Times','b','10');
$pdf->Cell('190','6',utf8_decode("                                                                                                                            O Médico/Enfermeiro                          	      			                                                                                       "),'','','C');
$pdf->Ln(6);
$pdf->Cell('190','6',utf8_decode("                                                                           _______________________________                                                                            "),'','','C');
$pdf->Ln(6); 
$pdf->SetTextColor(255);
$pdf->SetFont('Times','B','10');
//Rodape
$pdf->cell('190','5',utf8_decode("Software AmaClinicas V1.00                                                                                                                    Data : " .date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF
$pdf->Output();
?>