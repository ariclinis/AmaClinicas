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
           <?php include './Identidade_Clinica.php'; ?>
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
                            Cadastro de Pacientes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#dados_pessoas" data-toggle="tab">Dados Pessoais</a>
                                </li>
                                <li><a href="#InformaçõesAdicionais" data-toggle="tab">Informações Adicionais</a>
                                </li>
                                <li><a href="#Contactos" data-toggle="tab">Contactos</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="dados_pessoas">
                                <div class="help-block">
                                <label>Nome</label>
                                <input name="nome" id="nome" class="form-control col-md-5 col-lg-6" required>
                                </div>

                                <div class="help-block">
                                <label>Nome da Pai</label>
                                <input  name="nome_pai" id="nome_pai" class="form-control col-md-5 col-lg-6"><br>
                                </div>

                                <div class="help-block">
                                <label>Nome do Mãe</label>
                                <input name="nome_mae" id="nome_mae" class="form-control col-md-5 col-lg-6">
                                </div>


                                <div class="help-block">
                                <label>Sexo</label>
                                <label class="radio-inline">
                                <input type="radio" name="genero" id="genero" value="Masculino" checked="">Masculino
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="genero" id="genero" value="Femenino">Femenino
                                </label>
                                </div>

                                 <div class="help-block ">
                                <label>Data de Nascimento</label>
                                <input name="Data_nasc" id="Data_nasc" type="date" placeholder="Dia/Mês/ano" class="form-control col-md-5 col-lg-6">
                                </div>

                                <div class="help-block">
                                <label>Bilhete de Identidade</label>
                                <input name="bi" id="bi" class="form-control col-md-5 col-lg-6">
                                </div>

                                <div class="help-block">
                                <label for="disabledSelect">Nacionalidade</label>
                                <select class="form-control" name="nacio" id="nacio">
                                <option value="Angolana">Angolana</option>
                                <option value="Estrangeiro">Estrangeiro</option>
                                </select>
                                </div>


                                </div>
                                <div class="tab-pane fade" id="InformaçõesAdicionais">

                                <div class="help-block">
                                <label>Obsevação</label>
                                <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="Contactos">

                                <div class="help-block">
                                <label for="disabledSelect">Provincia</label>
                                <select class="form-control provincias" name="provincia_localidade" id="provincia_localidade">

                                </select>
                                </div>

                                <div class="help-block">
                                <label for="disabledSelect">Municipio</label>
                                <select class="form-control municipios" name="municipio_localidade" id="municipio_localidade">

                                </select>
                                </div>

                                <div class="help-block">
                                <label for="disabledSelect">Bairro</label>
                                <select class="form-control bairros" name="bairro" id="bairro" >

                                </select>
                                </div>
                                <div class="help-block">
                                <label>E-mail</label>
                                <input class="form-control col-md-5 col-lg-6" type="email" name="email" id="email">
                                </div>
                                <div class="help-block">
                                <label>Nº Telefone</label>
                                <input class="form-control col-md-5 col-lg-6" name="telefone" id="telefone">
                                </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <button type="button" class="btn btn-success" name="Cadastro"  id="Cadastro" ><i class="icon-ok">  Cadastrar </i> </button> <button type="button" class="btn btn-danger"><i class="icon-ok"></i>   </i>Cancelar    </i></button>
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
    <script type="text/javascript" src="../js/Admin/pacientes.js"></script>
    <script type="text/javascript" src="../js/Admin/geral.js"></script>
    <script type="text/javascript">
    inserirPaciente();
    ListarProvincias();
    ListarMunicipios();
    ListarBairros();
</script>

</body>

</html>
