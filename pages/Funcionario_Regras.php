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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Departamentos
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_departamento"></div> 

                            <div class="table-responsive">

                                    <div class="tab-pane" id="Regras">
                                <div class="help-block">
                                <label>Codigo</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="codigoDepartamento" id="codigoDepartamento">
                                </div>
                                <div class="help-block">
                                <label>Descricao departamento</label>
                                <input class="form-control col-md-4 col-lg-4" name="descricaoDepartamento" id="descricaoDepartamento">
                                </div>

                                 </div>
                                 <br><br>
                                <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" class="btn btn-primary" id="Cadastro_departamento">Cadastrar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Codigo</th>
                                            <th>Descricao</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="corpo_departamento">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categorias
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                        <div id="msg_cargo"></div>
                            <div class="table-responsive">
                                    <div class="tab-pane" id="Contactos">
                                <div class="help-block">
                                <label>Codigo</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="codigoCargo" id="codigoCargo">
                                </div>
                                <div class="help-block">
                                <label>Descricao cargo</label>
                                <input class="form-control col-md-4 col-lg-4" name="descricaoCargo" id="descricaoCargo">
                                </div>

                                 </div>
                                 <br><br>
                                <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" class="btn btn-primary" id="Cadastro_cargo">Cadastrar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Codigo</th>
                                            <th>Descricaos</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="corpo_cargo">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Especialidades
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                            <div id="msg_especialidade"></div>
                            <div class="table-responsive">
                                <div class="tab-pane" id="Contactos">
                                <div class="help-block">
                                <label>Codigo</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="codigo" id="codigo">
                                </div>
                                <div class="help-block">
                                <label>Descricao especialidades</label>
                                <input class="form-control col-md-4 col-lg-4" name="descricao" id="descricao">
                                </div>

                                 </div>
                                 <br><br>
                                <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" id="Cadas_especialidade" class="btn btn-primary">Cadastrar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Codigo</th>
                                            <th>Descricao</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="corpo_especialidade">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Analises Clinicas
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                            <div id="msganalise"></div>
                            <div class="table-responsive">
                                <div class="tab-pane" id="Contactos">
                                <div class="help-block">
                                <label>Codigo</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="id_analise" id="id_analise">
                                </div>
                                <div class="help-block">
                                <label>Descricao da Analise</label>
                                <input class="form-control col-md-4 col-lg-4" name="descanalise" id="descanalise">
                                </div>

                                 </div>
                                 <br><br>
                                <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" id="Cadas_Analise" class="btn btn-primary">Cadastrar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Codigo</th>
                                            <th>Descricao</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="corpo_Analise">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            
            </div>



            </div>
            

                
            


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
    <script type="text/javascript" src="../js/Admin/especialidades.js"></script>
    <script type="text/javascript" src="../js/Admin/departamentos.js"></script>
    <script type="text/javascript" src="../js/Admin/cargos.js"></script>
    <script type="text/javascript" src="../js/Admin/geral.js"></script>
    <script type="text/javascript" src="../js/Admin/analisesclinicas.js"></script>
    <script type="text/javascript">
    listagemDepartamentos();
    inserirDepartamento();
    listagemEspecialidades();
    inserirEspecialidade();
    listagemCargos();
    inserirCargo();
    listagemAnalises();
    inseriranalises();
    
</script>

</body>

</html>
