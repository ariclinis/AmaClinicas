<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AmaClinicas-Sistema de Gestão Integrado</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include './Identidade_Clinica.php';?>
            <!-- /.navbar-header -->

            <?php include './Cabecalho.php'; ?>
            <!-- /.navbar-top-links -->

            <?php include './Menu.php'; ?>
        </nav>







        <div id="page-wrapper"><br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Controlo de Atedimento
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome Paciente</th>
                                        <th>Médico(a)</th>
                                        <th>Tipo de Consulta</th>
                                        <th class="hidden-phone">Data</th>
                                        <th class="hidden-phone">Estado Consulta</th>
                                        <th class="hidden-phone">Estado Fila</th>
                                        <th class="hidden-phone">Operações</th>
                                    </tr>
                                </thead>
                                <tbody id="listcontrolo">

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
    </div>

<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript" src="../js/Admin/gestaoconsultas.js"></script>
    

    <script>
    listarControlo();
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>

</html>

<?php
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
session_start();
include_once './../Config/ligar_bd.php';
$usu=$_SESSION['cod'];
$pdo = Ligar::chamar_bd();

     if(isset($_GET['Presente'])){
        $cod_consulta=$_GET['Presente'];
        $Mudar_Estado= $pdo->prepare("UPDATE meus_pacientes_v SET Estado_Fila ='Aguarda Atedimento',Estado_Consulta='Agendada' WHERE cod_consulta='$cod_consulta'");
        $Mudar_Estado->execute();
    }
     if(isset($_GET['remarcar'])){
        $cod_consulta=$_GET['remarcar'];
        $Mudar_Estado= $pdo->prepare("UPDATE meus_pacientes_v SET Estado_Fila ='Aguarda Atedimento',Estado_Consulta='Agendada' WHERE cod_consulta='$cod_consulta'");
        $Mudar_Estado->execute();
    }
 if($_GET['Cancelar']){
     
        $cod_consulta=$_GET['Cancelar'];
        $Mudar_Estado= $pdo->prepare("UPDATE meus_pacientes_v SET Estado_Fila ='Ausente',Estado_Consulta='Cancelada' WHERE cod_consulta='$cod_consulta'");
        $Mudar_Estado->execute();
 }?>