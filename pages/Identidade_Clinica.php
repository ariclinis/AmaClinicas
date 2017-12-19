<?php

error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
session_start();

$cod=$_SESSION['cod'];
if($cod>0){

}
else{
    echo '<script type = "text/javascript">
location.href="./index.php";
</script>';
}
include_once("../Config/ligar_bd.php");
$pdo=  Ligar::chamar_bd();
$Pegar_clinica=$pdo->prepare("SELECT * FROM `filiares_clinicas_v` where id_utilizador='$cod'");
$Pegar_clinica->execute();
$returno= $Pegar_clinica->fetch(PDO::FETCH_ASSOC);
?>
<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" target="" href="#"><?php echo $returno['descricao_clinica'];?></a>
</div>