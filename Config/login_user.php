<?php
include_once './ligar_bd.php';
$pdo=ligar::Chamar_bd();
$nome=filter_input(INPUT_POST, 'nome');
$senha=filter_input(INPUT_POST, 'senha');
$pegar=$pdo->prepare("SELECT * FROM tbl_utilizador Where Nome_Login='$nome' AND Senha='$senha'");
$pegar->execute();
$linha= $pegar->fetch(PDO::FETCH_ASSOC);
$row=$pegar->rowCount();
if($row>0){
		session_start();
		$_SESSION['nome']=$linha['Nome_User'];
		$_SESSION['cod']=$linha['cod_utilizador'];
	//echo '<script type = "text/javascript">alert("Login feito com sucesso");</script>';
	echo "sucesso";
	}else{
	      echo "erro";
		}
                
