<?php

class Actualizar_Senha{

private $Id;
private $Senha;

function getId() {
    return $this->Id;
}

function getSenha() {
    return $this->Senha;
}

function setId($Id) {
    $this->Id = $Id;
}

function setSenha($Senha) {
    $this->Senha = $Senha;
}


    public function Alterar_Senha(PDO $con) {
        $stmt = $con->prepare("UPDATE tbl_utilizador SET Senha=? WHERE cod_utilizador=?");
        $stmt->execute(array(
            $this->getSenha(),
            $this->getId()
        ));
    
    }
}