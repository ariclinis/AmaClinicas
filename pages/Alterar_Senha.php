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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alterar Senha
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_confiSenha"></div> 

                            <div class="table-responsive">

                                <div class="tab-pane" id="Regras">
                                <div class="help-block">
                                <label>Senha Actual</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="Antiga" id="Antiga">
                                </div>
                                <div class="help-block">
                                <label>Nova Senha</label>
                                <input class="form-control col-md-4 col-lg-4" name="SenhaNova" id="SenhaNova">
                                </div>
                                <div class="help-block">
                                <label>Confirmar Nova Senha</label>
                                <input class="form-control col-md-4 col-lg-4" name="confirmar_senha" id="confirmar_senha">
                                </div>

                                 </div>
                                 <br><br>
                                <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button type="button" class="btn btn-primary" id="Alterar_senha" name="Alterar_senha">Alterar Senha</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

            </div>
            <!-- /.row -->
        </div>
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
    <script type="text/javascript" src="../js/Admin/actualizar_senha.js"></script>
    <script type="text/javascript">
    actualizar_senha();
</script>

</body>

</html>
