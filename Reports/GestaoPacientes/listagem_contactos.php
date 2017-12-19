<?php 
include('../../fpdf/fpdf.php');
include_once("../../Config/ligar_bd.php");

// muda fonte e coloca em negrito
$pdo = Ligar::chamar_bd();

//*/
//$Mes=$_POST['MES_FERIAS'];
//$Trabalho=$_POST['Trabalho_local'];
//
//if($Mes=="" && $Trabalho==""){
//$Mapa_Ferias = $pdo->prepare("SELECT * From plano_ferias_v");
//$Mapa_Ferias->execute();
//
//$Total=$pdo->prepare("SELECT count(*) From plano_ferias_v");
//$Total->execute();
//$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
//} else{
////    
//$Mapa_Ferias=$pdo->prepare("SELECT * From plano_ferias_v where Desc_Mes='$Mes' or unidade_sant_Trabalho='$Trabalho'");
//$Mapa_Ferias->execute(); 
//$Total=$pdo->prepare("SELECT count(*) From plano_ferias_v where Desc_Mes='$Mes' or unidade_sant_Trabalho='$Trabalho'");
//$Total->execute();
//$Linha2 = $Total->fetch(PDO::FETCH_ASSOC);
//}


$Pegar_Contactos=$pdo->prepare("SELECT * From paciente_v");
$Pegar_Contactos->execute();

$contador=$pdo->prepare("SELECT count(*) From paciente_v");
$contador->execute();
$Linha2 = $contador->fetch(PDO::FETCH_ASSOC);

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
$pdf->Cell('188','8',utf8_decode('CONTACTOS DOS PACIENTES'),'','','C');
$pdf->Ln(10);
//largura padrão das colunas
$largura = 30;
//altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 
$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(18, $altura, utf8_decode('Nº Registo'), 1, 0, 'L',TRUE);
$pdf->Cell(70, $altura, utf8_decode('Nome do Paciente'), 1, 0, 'L',TRUE);
$pdf->Cell(20, $altura, utf8_decode('Telefone'), 1, 0, 'L',TRUE);
$pdf->Cell(50, $altura, 'E-mail', 1, 0, 'L',TRUE);
$pdf->Cell(33, $altura, 'Data Registo', 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha

$pdf->Ln($altura);
// tirando o negrito

$pdf->SetFont('Arial', '', 9);
$cont=0; while ($Linha = $Pegar_Contactos->fetch(PDO::FETCH_ASSOC)) {
$cont++;
$zero=0;
$pdf->Cell(18, $altura, $cont, 1, 0, 'L'); 
        $pdf->Cell(70, $altura, $Linha['Nome_Paciente'], 1, 0, 'L');
        $pdf->Cell(20, $altura, $Linha['Telefone'], 1, 0, 'L');
        $pdf->Cell(50, $altura, $Linha['Email'], 1, 0, 'l');
        $pdf->Cell(33, $altura, $Linha['data_registo'], 1, 0, 'L');
        $pdf->ln(5.9);
	}
$acerto=-1;
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(53, $altura, utf8_decode('Total:  ««««««»»»»»»»»»»»:     ').$Linha2['count(*)'], 1, 0, 'L');
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
$pdf->SetFont('Times','','11');
$pdf->SetAutoPageBreak(true, 0);
//$pdf->Setxy(145,243.9);
// INFORMAÇÕES 
$pdf->Ln(15);
//Rodape
$pdf->SetFont('Times','','11');
$pdf->cell('187','5',utf8_decode("Software AmaClinicas V1.00                                                                                                                  Data:..".date('Y-m-d')."   ||   ".date('H:m')),'','','L',TRUE);
// exibindo o PDF
$pdf->Output();?>