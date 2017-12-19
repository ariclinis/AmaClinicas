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
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper"><br>

            <div class="row">
                <div class="col-lg-12">
                <div id="msg"></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Marcar Analises Clinicas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div id="msg_marcar" ="msg"></div>

                            <div class="tab-content">

                                <div class="help-block">
                                <label for="disabledSelect">Nome do Paciente</label>
                                <select class="form-control listarpacientes" name="paciente" id="paciente">
                                </select>
                                </div>
                                <div class="help-block">
                                <div class="form-group listagemAnalises">
                                <label>Analises</label>
                                <div class="checkbox listaAnalises" style="margin-left: 12px" value="Analise">

                                </div>

                                </div>
                                </div>

                                <div class="help-block">
                                <label>Data da Analise</label>
                                <input name="data_analise" id="data_analise" type="date" placeholder="Dia/Mês/ano" class="form-control col-md-5 col-lg-6">
                                </div>


                                <div class="help-block">
                                <label for="disabledSelect">Situação</label>
                                <select class="form-control" name="situa" id="situa" data-placeholder="Choose a Category">
                                    <option value="Nova consulta">Nova Analise</option>
                                    <option value="Retorno">Retorno</option>
                                    <option value="Emergeçia">Emergeçia</option>
                                </select>
                                </div>

                               </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <button type="button" class="btn btn-success" name="CadastroAnalise"  id="CadastroAnalise" > Marcar Analise </i> </button> <button type="button" class="btn btn-danger"><i class="icon-ok"></i>   </i>Cancelar    </i></button>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../js/Admin/marcaranalise.js"></script>
	<script type="text/javascript" src="../js/Admin/geral.js"></script>
    <script type="text/javascript">
    ListagemPacientes();
    listagemAnalises();
    inseriranalisemarcar();

    </script>

</body>

</html>
