<?php
/*
 @author M2G
 */
class Contacto {

    private $sql = "INSERT INTO tbl_contactos(Telefone, Email, Fax) VALUES (?,?,?)";
    private $cod_contacto;
    private $Telefone;
    private $Email;
    private $Fax;

    public function getCod_contacto() {
        return $this->cod_contacto;
    }

    public function getTelefone() {
        return $this->Telefone;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getFax() {
        return $this->Fax;
    }

    public function setCod_contacto($cod_contacto) {
        $this->cod_contacto = $cod_contacto;
        return $this;
    }

    public function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
        return $this;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
        return $this;
    }

    public function setFax($Fax) {
        $this->Fax = $Fax;
        return $this;
    }

    public function inserir_contacto(PDO $con) {
        $stmt = $con->prepare($this->sql);
        $stmt->execute(array(
        $this->getTelefone(),
        $this->getEmail(),
        $this->getFax()
        ));
        return $con->lastInsertId();
    }
    public function Actualizar_Contacto(PDO $con) {
        $stmt = $con->prepare("UPDATE `tbl_contactos` SET `Telefone`=?,`Email`=?,`Fax`=? WHERE Cod_Contacto=?");
        $stmt->execute(array(
        $this->getTelefone(),
        $this->getEmail(),
        $this->getFax(),
        $this->getCod_contacto()
        ));
    }

}
