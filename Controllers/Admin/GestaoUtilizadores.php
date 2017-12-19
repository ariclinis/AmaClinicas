<?php

class Utilizadores{
private $queryLogin="SELECT * FROM `tbl_utilizador` WHERE `Nome_Login`=? AND Senha=?";

private $query_select_modul="select * from tbl_modulos_sistema";

private $queryInsert= "INSERT INTO `tbl_utilizador` (`Nome_User`, `Nome_Login`, `Senha`, `Perfil_Acesso`, `id_Clinicas`, `id_Filiar_Clinica`, `estado`, `data_update`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

private $query_select="select * from tbl_utilizador";
private $queryUpdate = "UPDATE `tbl_utilizador` SET Nome_User =?, Nome_Login=?, Senha=?, Perfil_Acesso=?, estado=? , data_update=?, Cod_Clinicas=?, Cod_Filiar_Clinica=? WHERE id=?";
private $queryDelete = "DELETE FROM `tbl_utilizador` WHERE id=?";


private $Id;
private $NomeLogin;
private $NomeUser;
private $Senha;
private $Perfil_Acesso;
private $estadoUser;
private $IdClinicas;
private $IdClinicaAfiliar;
private $DataUpdate;
private $DataRegisto;

function getId() {
    return $this->Id;
}

function getNomeLogin() {
    return $this->NomeLogin;
}

function getNomeUser() {
    return $this->NomeUser;
}

function getSenha() {
    return $this->Senha;
}

function getPerfil_Acesso() {
    return $this->Perfil_Acesso;
}

function getEstadoUser() {
    return $this->estadoUser;
}

function getIdClinicas() {
    return $this->IdClinicas;
}

function getIdClinicaAfiliar() {
    return $this->IdClinicaAfiliar;
}

function getDataUpdate() {
    return $this->DataUpdate;
}

function getDataRegisto() {
    return $this->DataRegisto;
}

function setId($Id) {
    $this->Id = $Id;
}

function setNomeLogin($NomeLogin) {
    $this->NomeLogin = $NomeLogin;
}

function setNomeUser($NomeUser) {
    $this->NomeUser = $NomeUser;
}

function setSenha($Senha) {
    $this->Senha = $Senha;
}

function setPerfil_Acesso($Perfil_Acesso) {
    $this->Perfil_Acesso = $Perfil_Acesso;
}

function setEstadoUser($estadoUser) {
    $this->estadoUser = $estadoUser;
}

function setIdClinicas($IdClinicas) {
    $this->IdClinicas = $IdClinicas;
}

function setIdClinicaAfiliar($IdClinicaAfiliar) {
    $this->IdClinicaAfiliar = $IdClinicaAfiliar;
}

function setDataUpdate($DataUpdate) {
    $this->DataUpdate = $DataUpdate;
}

function setDataRegisto($DataRegisto) {
    $this->DataRegisto = $DataRegisto;
}


public function login(PDO $con){
    $queryExecute = $con->prepare($this->queryLogin);
    $queryExecute->execute(array(
        $this->getNomeLogin(),
        $this->getSenha()
        ));
    $resultados = $queryExecute->rowCount();
    if ($resultados == 1) {
        $dadosUser[] = $queryExecute->fetch(PDO::FETCH_ASSOC);
        //Cria sessão com dados do usuario
        session_start();
        $_SESSION['nome']=$dadosUser[0]['Nome_User'];
        $_SESSION['cod']=$dadosUser[0]['id'];
        $_SESSION['id_clinica']=$dadosUser[0]['id_Clinicas'];
        $_SESSION['id_clinicaFiliar']=$dadosUser[0]['id_Filiar_Clinica'];
        return $dadosUser;
    }elseif ($resultados == 0) {
        return 0;
    }else{
        return 1;
    }
}
public function InserirUser(PDO $con){
    $stmt= $con->prepare($this->queryInsert);
    $stmt->execute(
        array(
            $this->getNomeUser(),
            $this->getNomeLogin(),
            $this->getSenha(),
            $this->getPerfil_Acesso(),
            $this->getIdClinicas(),
            $this->getIdClinicaAfiliar(),
            $this->getEstadoUser(),
            $this->getDataUpdate()

));
   return $con->lastInsertId();
}

public function deleteUser(PDO $con){
    $queryExecute= $con->prepare($this->queryDelete);
    $queryExecute->execute(array($this->getId()));
        if($executeQuery->execute(array($this->getId()))) {
            return $this->getId();
        }else{
            return "erro";
        }
}

public function listagemUtilizadores(PDO $con){
    	$executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }        return json_encode($resultados) ;

}

public function listagemModulo(PDO $con){
    	$executeQuery = $con->prepare($this->query_select_modul);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }        return json_encode($resultados) ;

}

    public function Alterar_Senha(PDO $con) {
        $stmt = $con->prepare("UPDATE tbl_utilizador SET Senha=? WHERE cod_utilizador=?");
        $stmt->execute(array(
            $this->getSenha(),
            $this->getId()
        ));
    
    }
}