<?php

include_once './Conexao.php';
include_once './Utilizador.php';
session_start();

$user = $_SESSION['cod'];
$senha= filter_input(INPUT_POST, 'Antiga');
$senha_nova= filter_input(INPUT_POST, 'Nova');
$Utilizador = new Utilizador();
$pdo = conexao::Chamar_conexao();

try {
    $pegar=$pdo->prepare("SELECT * FROM tbl_utilizador Where cod_utilizador='$user' AND Senha='$senha'");
    $pegar->execute();
    $linha= $pegar->fetch(PDO::FETCH_ASSOC);
    $row=$pegar->rowCount();
    if($row>0){
        $Utilizador->setSenha($senha_nova);
        $Utilizador->setCod_user($user);
        $Utilizador->Alterar_Senha(conexao::Chamar_conexao());
        echo 'sucesso';
    }    
    //echo '<script type = "text/javascript">alert("Paciente inserido com sucesso");location.href="../Paciente_Listagem.php";</script>';
} catch (Exception $exc) {
    echo error_log($exc);
}



