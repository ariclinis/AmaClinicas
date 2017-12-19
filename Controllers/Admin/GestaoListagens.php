<?php



$DATA=date('Y-m-d');

//---------------------Consultas Medicas------------------------------------
class listagensConsultas{

private $query_consultasLista="SELECT * From meus_pacientes_v where Estado_Consulta='Agendada'";

private $query_meuspacientes="SELECT * From meus_pacientes_v where Estado_Fila='Aguarda Atedimento' && Estado_Consulta='Agendada'";

//// No controlo so devem figurar as consultas Marcadas para o dia
private $query_controlo="SELECT * From meus_pacientes_v where Estado_Fila='Aguarda Atedimento' || Estado_Fila='Ausente'";

///Consultas Atendidas
private $query_pacientesAtendidos="SELECT * From meus_pacientes_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'";

 public function listarConsultasMarcadas(PDO $con){
    	$executeQuery = $con->prepare($this->query_consultasLista);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function meuspacientes(PDO $con){
    	$executeQuery = $con->prepare($this->query_meuspacientes);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function controloAtedimento(PDO $con){
    	$executeQuery = $con->prepare($this->query_controlo);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function PacientesAtendidos(PDO $con){
    	$executeQuery = $con->prepare($this->query_pacientesAtendidos);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }
	
}

//---------------------Analises Clinicas------------------------------------

class ListagemAnaliseClinicas{
    
private $query_AnalisesLista="SELECT distinct N_Consulta_Analise,Nome_Paciente,genero,Situa,Data_Registo,Estado_Consulta From analises_marcadas_v where Estado_Consulta='Agendada'";

private $query_meuspacientesAnalises="SELECT distinct Nome_Paciente,genero,Cod_Consulta,Data_Registo,Nome_User,Estado_Fila From analises_marcadas_v where Estado_Fila='Aguarda Atedimento' && Estado_Consulta='Agendada'";

//// No controlo so devem figurar as consultas Marcadas para o dia
 private $query_controloAnalise="SELECT distinct Cod_Consulta,N_Consulta_Analise,Nome_Paciente,genero,Situa,Data_Registo,Estado_Fila,Estado_Consulta From analises_marcadas_v where Estado_Fila='Aguarda Atedimento' || Estado_Fila='Ausente'";

///Consultas Atendidas
private $query_AnalisesAtendidas="SELECT distinct N_Consulta_Analise, Nome_Paciente,genero,Data_Registo,Nome_User,Estado_Fila From analises_marcadas_v where Estado_Fila='Atendido' && Estado_Consulta='Concluido'";

 public function listarAnalises(PDO $con){
    	$executeQuery = $con->prepare($this->query_AnalisesLista);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function Analisesmeuspacientes(PDO $con){
    	$executeQuery = $con->prepare($this->query_meuspacientesAnalises);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function controloAtedimentoAnalises(PDO $con){
    	$executeQuery = $con->prepare($this->query_controloAnalise);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }

 public function AnalisesAtendidas(PDO $con){
    	$executeQuery = $con->prepare($this->query_AnalisesAtendidas);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;
    }
    
    
}