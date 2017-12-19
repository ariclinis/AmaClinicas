<?php
include_once("../Config/ligar_bd.php");
$utilizador= filter_input(INPUT_GET, 'user');
$pdo=  Ligar::chamar_bd();

$Pegar_modulo=$pdo->prepare("SELECT * From tbl_modulos_sistema");
$Pegar_modulo->execute();
$linha=$Pegar_modulo->fetch(PDO::FETCH_ASSOC);

$Pegar_user=$pdo->prepare("SELECT * FROM `tbl_utilizador` where id='$utilizador'");
$Pegar_user->execute();
$dado= $Pegar_user->fetch(PDO::FETCH_ASSOC);
?>
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
            <ul class="breadcrumb">
                
                                <li>
                                    <a href="inicio.php">Inicio</a>
                                    <span class="divider"></span>
                                </li>
                                
                                <li>
                                    <a href="Utilizador_Cadastro.php">Administração Utilizadores</a>
                                    <span class="divider"></span>
                                </li>
                                
                                <li class="active">
                                    Atribuição de Permissões
                                    <span class="divider"></span>
                                </li>
                                <li class="active">
                                    Utilizador:: <string><?php echo $dado['Nome_User'];?></string>
                                </li>
                             </ul>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Módulos do Sistema
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_acesso"></div> 

                            <div class="table-responsive">
                                 <div class="tab-pane" id="Regras">
                                 </div>
                               
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Módulo</th>
                                            <th><cente>Acesso</cente></th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <!--<tbody id="listmodulo">
                                
                                    </tbody>-->
                                    
                                    <tbody>
                                    <center>
                                    <input type="hidden" value="<?php echo $dado['id']; ?>" id="user_inseri" name="user_inseri"></center>
                                <?php while ($linha2=$Pegar_modulo->fetch(PDO::FETCH_ASSOC)) { ?>
                                  
                               
                                <tr>
                                    <td>
                                       <?php echo utf8_encode($linha2['Modulo']); ?>
                                    </td>
                                    <td><center>
                                    <span class="btn btn-outline btn-primary btn-sm"><input type="checkbox" value="<?php echo $linha2['id']; ?>" name="activo[]" id="activo[]"></span> </center>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline btn-success btn-sm">Editar Registo</a>
                                       <a class="btn btn-outline btn-danger btn-sm">Actualizar</a>
                                    </td>
                                </tr>
                                 <?php } ?>
                                </tbody>
                                </table>
                                 <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <a type="button" class="btn btn-primary" id="Atribuir_Acesso">Atribuir Acesso</a>
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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Acessos do Utilizador :: <string><?php echo $dado['Nome_User']; ?></string>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                        <div id="msg_cargo"></div>
                            <div class="table-responsive">
                                 
                        
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Módulo</th>
                                            <th>Acesso</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
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
   
   <script type="text/javascript" src="../js/Admin/gestaoconsultas.js"></script>

    <script type="text/javascript">
     inserirPermissao();
    </script>

</body>

</html>
