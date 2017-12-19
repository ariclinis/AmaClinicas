<?php

/**
 * Description of GestaoPermissoes
 * @author Mariano Tomas
 */

include_once '../../Config/ligar_bd.php';
session_start();
$pdo = Ligar::chamar_bd();

try {
    
$user = filter_input(INPUT_POST, 'user_inseri');
$visivel="Sim";
$activo =  filter_input(INPUT_POST,'activo');
$count = count($activo);

for ($i=0;$i<$count;$i++){
    $p=$activo[$i];
     $permissao= $pdo->prepare("INSERT INTO tbl_acesso_modulos(`Cod_Utilizador`, `Cod_Menu`, `Visivel`) VALUES (?,?,?)");
       $permissao->execute(array(
        $user,
        $p,
        $visivel
        ));
}

 echo 'sucesso';
} catch (Exception $exc) {
 echo 'ocorreu um erro';
}
