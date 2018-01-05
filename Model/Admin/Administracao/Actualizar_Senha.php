<?php
include_once "../../../Config/ligar_bd.php";
include_once "../../../Controllers/Admin/GestaoUtilizadoresSenha.php";

session_start();

$update_senha = new Actualizar_Senha();
$pdo = Ligar::chamar_bd();

$user=intval($_SESSION['cod']);
$senha = filter_input(INPUT_POST, 'senhaantiga');
$nova = filter_input(INPUT_POST, 'nova');
$senha_nova = filter_input(INPUT_POST, 'novasenha');


try { 
    $pegar=$pdo->prepare("SELECT * FROM tbl_utilizador Where id='$user' AND Senha='$senha'");
    $pegar->execute();
    $linha= $pegar->fetch(PDO::FETCH_ASSOC);
    $row=$pegar->rowCount();
    if($row>0){
    if(empty($senha)&&empty($senha_nova)&&empty($nova)){
        echo "vazio";
    }else{
        if($nova==$senha_nova){
            $update_senha->setSenha($senha_nova);
            $update_senha->setId($user);
            $idsenha=$update_senha->Alterar_Senha(ligar::chamar_bd());
            echo "success";
        }else{
            echo "diverente";
        }
    }
}else{
    echo "senhaerrada";
}
            
    
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}