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


$Pegar_paci_marcados=$pdo->prepare("select distinct Id_Especialidade, Tipo_Consulta, count(Id_Especialidade) as `quantidade` from `meus_pacientes_v` WHERE Estado_Fila='Atendido' && Estado_Consulta='Concluido' GROUP BY Id_Especialidade");
$Pegar_paci_marcados->execute();

$Contar_Total=$pdo->prepare("SELECT count(distinct Id_Especialidade, Tipo_Consulta) From meus_pacientes_v WHERE Estado_Fila='Atendido' && Estado_Consulta='Concluido'");
$Contar_Total->execute();
$Linha2 = $Contar_Total->fetch(PDO::FETCH_ASSOC);

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
$pdf->Cell('188','7',utf8_decode($resultado['Rua']),'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Telefone: ').$resultado['Telefone'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('Nº Contribuinte: ').$resultado['N_Contribuiente'],'','','L');
$pdf->Ln(7);
$pdf->Cell('188','7',utf8_decode('WebSite: ').$resultado['Web_site'].utf8_decode('               Email: ').$resultado['Email'],'','','L');
$pdf->SetFont('Times','B','10');
$pdf->Ln(13);
$pdf->Cell('180','8',utf8_decode('ESTATÍSTICAS POR ESPECIALIDADE'),'','','C');
$pdf->Ln(5);
$pdf->SetFont('Times','B','11');
$pdf->Cell('180','8',utf8_decode('Filtros utilizados'),'','','L');
$pdf->Ln(5);
$pdf->SetFont('Times','','11');
//$pdf->Cell('280','8',utf8_decode('Doctores(a): ').utf8_decode($Nom).(',    ').utf8_decode('Tipo de Consultas:  ').utf8_decode($Consulta_Marcada).(',   ').utf8_decode('Estado:  ').utf8_decode($Estado),'','','L');
$pdf->Ln(8);
// largura padrão das colunas
$largura = 30;
// altura padrão das linhas das colunas
$altura = 6;
# code...Colunas 

$pdf->SetFont('Times','b','10');
$pdf->SetFillColor(160,160, 160);
$pdf->Cell(15, $altura, utf8_decode('Nº'), 1, 0, 'L',TRUE);
$pdf->Cell(75, $altura, 'Tipo de Consulta', 1, 0, 'L',TRUE);
$pdf->Cell(50, $altura, utf8_decode('Quantidade'), 1, 0, 'L',TRUE);
$pdf->Cell(50, $altura, utf8_decode('Valor Facturado'), 1, 0, 'L',TRUE);

// criando os cabeçalhos para 5 colunas
// pulando a linha
$TOT=0;

$pdf->Ln($altura);
// tirando o negrito

$pdf->SetFont('Arial', '', 9);
$cont2=0; while ($Linha = $Pegar_paci_marcados->fetch(PDO::FETCH_ASSOC)) {
$cont2++;
     $pdf->Cell(15, $altura, $cont2, 1, 0, 'L');
        $pdf->Cell(75, $altura, utf8_decode($Linha['Tipo_Consulta']), 1, 0, 'L');
	$pdf->Cell(50, $altura, $Linha['quantidade'], 1, 'L');
        $pdf->Cell(50, $altura, $TOT, 1, 'L');
	$pdf->ln(5.9);
	}
       
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(70, $altura, utf8_decode('Total:  ««««««««««»»»»»»»»»»»»»»»:       ').$Linha2['count(distinct Id_Especialidade, Tipo_Consulta)'], 1, 0, 'L');
$pdf->Ln($altura);
$pdf->Ln(10);
$pdf->SetFont('Times','','10');
$pdf->Footer();
$pdf->SetTextColor(255);
$pdf->cell('190','5',utf8_decode("Software AmaClinicas V1.00 - www.amatechs.org                                                                                        Data.:".date('Y-m-d')."  ||  ".date('H:m')),'','','C',TRUE);
// exibindo o PDF
$pdf->Output();?>