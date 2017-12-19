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
                            Listagem dos Pacientes Atendidos Em Analises
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nº Consulta</th>
                                        <th>Nome Paciente</th>
                                        <th>Genero</th>
                                        <th>Situação</th>
                                        <th class="hidden-phone">Data Consulta</th>
                                        <!-- <th class="hidden-phone">Hora Inicio</th>-->
                                        <!--  <th class="hidden-phone">Situação</th>-->
                                        <th class="hidden-phone">Estado</th>
                                        <th class="hidden-phone"><center>Operações</center></th>
                                    </tr>
                                </thead>
                                <tbody id="listAtendidos">

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-12 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Opções de Pesquisa
                        </div>
                        <div class="help-block">
                                <label for="disabledSelect">Nome do Pacinte</label>
                               <input name="nome" id="nome" class="form-control col-md-5 col-lg-6">
                        </div>
                    
                        <div class="help-block ">
                                <label>Genero</label>
                                <select class="form-control" name="Sitiua" id="Sitiua" data-placeholder="Choose a Category">
                                   <option value=""></option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                        </div><br>

                        <div class="panel-footer">
                            <a type="button" target="_blank" class="btn btn-primary btn-sm" href="../Reports/GestaoLaboratorio/Listagem_Atedimento_Analises.php"><i class="fa fa-print"></i>  Imprimir Lista</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Opções de Pesquisa
                        </div>
                        <div class="help-block">
                                <label for="disabledSelect">Tipo de Especialidade</label>
                                <select class="form-control especialidades" name="especialidade" id="especialidade">
                                
                                </select>
                        </div>
                       <div class="help-block ">
                                <label>Data da Consulta</label>
                                <input name="Data_Consulta" id="Data_Consulta" type="date" placeholder="Dia/Mês/ano" class="form-control col-md-5 col-lg-6">
                        </div><br>

                        <div class="panel-footer">
                             <a type="button" class="btn btn-primary btn-sm" target="_blank" href=""><i class="fa fa-print"></i>  Imprimir Lista</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mapa de Estatisticas
                        </div>
                        <div class="help-block ">
                                <label>Data da Consulta</label>
                                <input name="Data_Consulta" id="Data_Consulta" type="date" placeholder="Dia/Mês/ano" class="form-control col-md-5 col-lg-6">
                        </div><br>

                        <div class="panel-footer">
                             <a target="_blank" type="button" class="btn btn-primary btn-sm" href=""><i class="fa fa-print"></i>  Imprimir </a>
                        </div>
                    </div>
                </div>
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
   listarAtendidosAnalises();
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</body>

</html>
