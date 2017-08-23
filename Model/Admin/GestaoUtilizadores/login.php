<?php
include_once("../../../Config/ligar_bd.php");
include_once("../../../Controllers/Admin/GestaoUtilizadores.php");

$utilizador = new Utilizadores();
$nome =filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');

if (empty($nome) || empty($senha)) {
    echo "É obrigatório preeencher todos os campos";
}else{
    $utilizador->setNomeLogin(filter_input(INPUT_POST, 'nome'));
    $utilizador->setSenha(filter_input(INPUT_POST, 'senha'));
    $resultado=$utilizador->login(Ligar::chamar_bd());

    if ($resultado ==0 ) {
        if ($resultado == 0) {
             echo $mostra['msg']="Porfavor, verifique seus dados";
         }elseif ($resultado == 1) {
             echo $mostra['msg']="Porfavor, contacte o Administrador erro 152 consoft.";
        }else{
              echo $mostra['msg']="Porfavor, contacte o Administrador erro 202 consoft.";
         }

    }else{

        $json = json_decode($resultado);
        echo '<script type="text/javascript">alert("Login Efectuado com sucesso");location.href="../pages/inicio.php";</script>' ;
    }
}
?>

