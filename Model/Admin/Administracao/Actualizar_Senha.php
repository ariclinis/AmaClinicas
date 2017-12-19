<?php
include_once "../../../Config/ligar_bd.php";
include_once "../../../Controllers/Admin/GestaoUtilizadoresSenha.php";

session_start();

$update_senha = new Actualizar_Senha();
$pdo = Ligar::chamar_bd();

$user=$_SESSION['cod'];
$senha = filter_input(INPUT_POST, 'senhaantiga');
$senha_nova = filter_input(INPUT_POST, 'novasenha');

try { 
    
    $pegar=$pdo->prepare("SELECT * FROM tbl_utilizador Where id='$user' AND Senha='$senha'");
    $pegar->execute();
    $linha= $pegar->fetch(PDO::FETCH_ASSOC);
    
    if($linha>0){
        $update_senha->setSenha($senha_nova);
        $update_senha->setId($user);
        $idsenha=$update_senha->Alterar_Senha(ligar::chamar_bd());
        echo 'sucesso';
    }else{
        echo "erro";
    }
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}