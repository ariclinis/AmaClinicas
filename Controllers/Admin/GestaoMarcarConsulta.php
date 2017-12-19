<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 */
class GestaoMarcarConsulta {
public $pegar_paciente_marcar = "INSERT INTO tbl_marcar_consulta (Id_Paciente, Id_Funcionario, Id_Especialidade, Situa, peso_pac, Hora_Inicio, Data_Consult, Data_Registo, Id_utilizador, id_Filiar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
private $ID;
private $Id_paciente;
private $Situa;
private $Hora_Inicio;
private $Data_Consult;
private $Data_Registo;
private $Estado_Consulta;
private $Id_Funcionario;
private $Id_utilizador;
private $Id_Filiar;
private $Tipo_Consulta;
private $Peso_pac;

public function getPeso_pac()
{
    return $this->Peso_pac;
}

public function setPeso_pac($Peso_pac)
{
    $this->Peso_pac = $Peso_pac;
    return $this;
}

public function getTipo_Consulta()
{
    return $this->Tipo_Consulta;
}

public function setTipo_Consulta($Tipo_Consulta)
{
    $this->Tipo_Consulta = $Tipo_Consulta;
    return $this;
}

public function getId_Filiar()
{
    return $this->Id_Filiar;
}

public function setId_Filiar($Id_Filiar)
{
    $this->Id_Filiar = $Id_Filiar;
    return $this;
}

public function getId_utilizador()
{
    return $this->Id_utilizador;
}

public function setId_utilizador($Id_utilizador)
{
    $this->Id_utilizador = $Id_utilizador;
    return $this;
}

public function getId_Funcionario()
{
    return $this->Id_Funcionario;
}

public function setId_Funcionario($Id_Funcionario)
{
    $this->Id_Funcionario = $Id_Funcionario;
    return $this;
}

public function getEstado_Consulta()
{
    return $this->Estado_Consulta;
}

public function setEstado_Consulta($Estado_Consulta)
{
    $this->Estado_Consulta = $Estado_Consulta;
    return $this;
}

public function getData_Registo()
{
    return $this->Data_Registo;
}

public function setData_Registo($Data_Registo)
{
    $this->Data_Registo = $Data_Registo;
    return $this;
}

public function getData_Consult()
{
    return $this->Data_Consult;
}

public function setData_Consult($Data_Consult)
{
    $this->Data_Consult = $Data_Consult;
    return $this;
}

public function getHora_Inicio()
{
    return $this->Hora_Inicio;
}

public function setHora_Inicio($Hora_Inicio)
{
    $this->Hora_Inicio = $Hora_Inicio;
    return $this;
}

public function getSitua()
{
    return $this->Situa;
}

public function setSitua($Situa)
{
    $this->Situa = $Situa;
    return $this;
}

public function getId_paciente()
{
    return $this->Id_paciente;
}

public function setId_paciente($Id_paciente)
{
    $this->Id_paciente = $Id_paciente;
    return $this;
}

public function getID()
{
    return $this->ID;
}

public function setID($ID)
{
    $this->ID = $ID;
    return $this;
}
public function inserir_consulta_paciente(PDO $con) {

        $stmt = $con->prepare($this->pegar_paciente_marcar);
        $stmt->bindValue(1, intval($this->getId_paciente()));
        $stmt->bindValue(2, intval($this->getId_Funcionario()));
        $stmt->bindValue(3, intval($this->getTipo_Consulta()));
        $stmt->bindValue(4, $this->getSitua());
        $stmt->bindValue(5, $this->getPeso_pac());
        $stmt->bindValue(6, $this->getHora_Inicio());
        $stmt->bindValue(7, $this->getData_Consult());
        $stmt->bindValue(8, $this->getData_Registo());
        $stmt->bindValue(9, intval($this->getId_utilizador()));
        $stmt->bindValue(10, intval($this->getId_Filiar()));
        $stmt->execute();
        return $con->lastInsertId();
    }

public function actualizar_consulta(PDO $con) {

        $stmt = $con->prepare("UPDATE tbl_marcar_consulta SET cod_paciente= ? ,Cod_Funcionario= ? ,Tipo_Consulta=? ,Situa=? ,Hora_Inicio=? ,Data_Consult=? ,Estado_Consulta=? WHERE Cod_Consulta= ?");
        $stmt->execute(array(
            $this->getcod_paciente(),
            $this->getCod_Funcionario(),
            $this->getTipo_Consulta(),
            $this->getSitua(),
            $this->getHora_Inicio(),
            $this->getData_Consult(),
            $this->getEstado_Consulta(),
            $this->getCod_Consulta()
        ));
    }

}
