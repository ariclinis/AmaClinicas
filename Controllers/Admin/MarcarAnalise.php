
<?php


class MarcarAnalise{



private $query_select="SELECT * FROM tbl_analises_clinicas";

private $query_insert="INSERT INTO `tbl_marcar_analise`(`id_Paciente`, `Situa`, `DataAnalise`, `Data_Registo`, `id_utilizador`, `id_Filiar`) VALUES (?,?,?,?,?,?)";

private $analise_paciente="INSERT INTO `tbl_analises_paciente`(`idAnalise`,`IdAnaliseConsulta`,`Data_Registo`,n_consulta) VALUES (?,?,?,?)";
//Marcar Analise
 private $id;
 private $Cod_Paciente;
 private $Situa;
 private $DataAnalise;
 private $Data_Registo;
 private $n_consulta;
 private $Estado_Consulta;
 private $Estado_Fila;
 private $id_Filiar;
 private $Id_User;
//Inserir Analise Paciente
 private $ID;
 private $Cod_Analise;
 private $IdAnalise;
 private $IdAnaliseConsulta;


 function getId() {
     return $this->id;
 }

 function getCod_Paciente() {
     return $this->Cod_Paciente;
 }

 function getSitua() {
     return $this->Situa;
 }

 function getN_consulta() {
     return $this->n_consulta;
 }

 function setN_consulta($n_consulta) {
     $this->n_consulta = $n_consulta;
 }

  
 function getDataAnalise() {
     return $this->DataAnalise;
 }

 function getData_Registo() {
     return $this->Data_Registo;
 }

 function getEstado_Consulta() {
     return $this->Estado_Consulta;
 }

 function getId_User(){
    return $this->Id_User;
 }

 function getEstado_Fila() {
     return $this->Estado_Fila;
 }

 function getId_Filiar() {
     return $this->id_Filiar;
 }


 function getCod_Analise() {
     return $this->Cod_Analise;
 }

 function getIdAnalise() {
     return $this->IdAnalise;
 }

 function getIdAnaliseConsulta()
 {
     return $this->IdAnaliseConsulta;
 }

 function setId($id) {
     $this->id = $id;
 }

 function setCod_Paciente($Cod_Paciente) {
     $this->Cod_Paciente = $Cod_Paciente;
 }

 function setSitua($Situa) {
     $this->Situa = $Situa;
 }

 function setDataAnalise($DataAnalise) {
     $this->DataAnalise = $DataAnalise;
 }

 function setData_Registo($Data_Registo) {
     $this->Data_Registo = $Data_Registo;
 }

 function setEstado_Consulta($Estado_Consulta) {
     $this->Estado_Consulta = $Estado_Consulta;
 }


 function setEstado_Fila($Estado_Fila) {
     $this->Estado_Fila = $Estado_Fila;
 }

 function setId_Filiar($id_Filiar) {
     $this->id_Filiar = $id_Filiar;
 }

 function setCod_Analise($Cod_Analise) {
     $this->Cod_Analise = $Cod_Analise;
 }

 function setIdAnalise($IdAnalise) {
     $this->IdAnalise = $IdAnalise;
 }

 function setIdAnaliseConsulta($IdAnaliseConsulta){
    $this->IdAnaliseConsulta = $IdAnaliseConsulta;
 }
 function setId_User($Id_User)
 {
     $this->Id_User = $Id_User;
 }



 public function inserir_analise_marcar(PDO $con){
        $stmt = $con->prepare($this->query_insert);
        $stmt->execute(array(
            intval($this->getCod_Paciente()),
            $this->getSitua(),
            $this->getDataAnalise(),
            date('Y-m-d'),
            intval($this->getId_User()),
            intval($this->getId_Filiar())

        ));
     return $con->lastInsertId();
    }

    public function inserir_analises_paciente(PDO $con){
        $stmt = $con->prepare($this->analise_paciente);
        $stmt->execute(array(
            $this->getIdAnalise(),
            $this->getIdAnaliseConsulta(),
            date('Y-m-d'),
            $this->getN_consulta()
        ));
     return $con->lastInsertId();
    }

}