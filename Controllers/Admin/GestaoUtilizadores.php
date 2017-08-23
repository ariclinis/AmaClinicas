<?php

class Utilizadores{
private $queryLogin="SELECT * FROM `tbl_utilizador` WHERE `Nome_Login`=? AND Senha=?";
private $queryInset= "INSERT INTO tbl_utilizador(Nome_User, Nome_Login, Senha, Perfil_Acesso, estado, Cod_Clinicas, Cod_Filiar_Clinica, data_registo, data_update) VALUES (?,?,?,?,?,?,?,?,?)";
private $queryUpdate = "UPDATE `tbl_utilizador` SET Nome_User =?, Nome_Login=?, Senha=?, Perfil_Acesso=?, estado=? , data_update=?, Cod_Clinicas=?, Cod_Filiar_Clinica=? WHERE id=?";
private $queryDelete = "DELETE FROM `tbl_utilizador` WHERE id=?";

public function getId()
{
    return $this->Id;
}
public function setId($Id)
{
    $this->Id = $Id;
    return $this;
}

public function getNomeLogin()
{
    return $this->NomeLogin;
}

public function setNomeLogin($NomeLogin)
{
    $this->NomeLogin = $NomeLogin;

    return $this;
}

public function getNomeUser()
{
    return $this->NomeUser;
}

public function setNomeUser($NomeUser)
{
    $this->NomeUser = $NomeUser;
    return $this;
}

public function getSenha()
{
    return $this->Senha;
}

public function setSenha($Senha)
{
    $this->Senha = $Senha;
    return $this;
}

public function getPerfil_Acesso()
{
    return $this->Perfil_Acesso;
}

public function setPerfil_Acesso($Perfil_Acesso)
{
    $this->Perfil_Acesso = $Perfil_Acesso;
    return $this;
}

public function getEstadoUser()
{
    return $this->estadoUser;
}

public function setEstadoUser($estadoUser)
{
    $this->estadoUser = $estadoUser;
    return $this;
}

public function getIdClinicas()
{
    return $this->IdClinicas;
}

public function setIdClinicas($IdClinicas)
{
    $this->IdClinicas = $IdClinicas;
    return $this;
}

public function getIdClinicaAfiliar()
{
    return $this->IdClinicaAfiliar;
}

public function setIdClinicaAfiliar($IdClinicaAfiliar)
{
    $this->IdClinicaAfiliar = $IdClinicaAfiliar;
    return $this;
}

public function getDataUpdate()
{
    return $this->DataUpdate;
}

public function setDataUpdate($DataUpdate)
{
    $this->DataUpdate = $DataUpdate;
    return $this;
}

public function getDataRegisto()
{
    return $this->DataRegisto;
}

public function setDataRegisto($DataRegisto)
{
    $this->DataRegisto = $DataRegisto;
    return $this;
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
        session_start();
        $_SESSION['nome']=$dadosUser[0]['Nome_User'];
        $_SESSION['cod']=$dadosUser[0]['id'];
        return $dadosUser;
    }elseif ($resultados == 0) {
        return 0;
    }else{
        return 1;
    }
}

}