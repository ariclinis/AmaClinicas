<?php

class GestaoAgendar{
    public $pegar_agenda="INSERT INTO `tbl_agendar_consulta`(nome,`Data_Agenda`,`Hora_Inicio`,`Id_Filiar_Clinica`,`data_registo`,`Id_utilizador`,`Id_Especialidade`,`Id_Medico`)VALUES (?,?,?,?,?,?,?)";
    Private $query_select = "SELECT * FROM `agendar_v`";
    private $cod_agenda;
    private $Data_agenda;
    private $hora_inicio;
    private $hora_fim;
    private $Id_Medico;
    private $Id_utilizador;
    private $Id_Filiar_Clinica;
    private $Id_Especialidade;
    private $data_registo;
    private $Estado_agenda;

    public function getID()
    {
        return $this->ID;
    }

    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }
    public function getData_agenda()
    {
        return $this->Data_agenda;
    }

    public function setData_agenda($Data_agenda)
    {
        $this->Data_agenda = $Data_agenda;
        return $this;
    }
    public function getHora_inicio()
    {
        return $this->hora_inicio;
    }

    public function setHora_inicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
        return $this;
    }
    public function getHora_fim()
    {
        return $this->hora_fim;
    }

    public function setHora_fim($hora_fim)
    {
        $this->hora_fim = $hora_fim;
        return $this;
    }

    public function getId_Medico()
    {
        return $this->Id_Medico;
    }

    public function setId_Medico($Id_Medico)
    {
        $this->Id_Medico = $Id_Medico;
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

    public function getId_Filiar_Clinica()
    {
        return $this->Id_Filiar_Clinica;
    }

    public function setId_Filiar_Clinica($Id_Filiar_Clinica)
    {
        $this->Id_Filiar_Clinica = $Id_Filiar_Clinica;
        return $this;
    }

    public function getId_Especialidade()
    {
        return $this->Id_Especialidade;
    }

    public function setId_Especialidade($Id_Especialidade)
    {
        $this->Id_Especialidade = $Id_Especialidade;
        return $this;
    }

    public function getData_registo()
    {
        return $this->data_registo;
    }

    public function setData_registo($data_registo)
    {
        $this->data_registo = $data_registo;
        return $this;
    }

    public function getEstado_agenda()
    {
        return $this->Estado_agenda;
    }

    public function setEstado_agenda($Estado_agenda)
    {
        $this->Estado_agenda = $Estado_agenda;
        return $this;
    }
    public function Inserir_agenda(PDO $con){
        $executeQuery = $con->prepare($this->pegar_agenda);
        $executeQuery->execute(array(
        $this->getData_agenda(),
        $this->getHora_inicio(),
        $this->getId_Filiar_Clinica(),
        $this->getData_registo(),
        $this->getId_utilizador(),
        $this->getId_Especialidade(),
        $this->getId_Medico()
        ));
        return $con->lastInsertId();
    }

public function ListagemConsultas(PDO $con){
        $executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

//FORMATA COMO TIMESTAMP
function dataToTimestamp($data){
   $ano = substr($data, 6,4);
   $mes = substr($data, 3,2);
   $dia = substr($data, 0,2);
return mktime(0, 0, 0, $mes, $dia, $ano);
}

}
