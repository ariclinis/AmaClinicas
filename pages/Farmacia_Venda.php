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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_departamento"></div> 

                            <div class="table-responsive">

                                <div class="tab-pane" id="Regras">
                                <div class="help-block">
                                <label>Cliente</label>
                                <select class="form-control clientes" name="cliente" id="cliente">
                                </select>
                                </div>
                                </div>
                   
                                
                                
                            </div>
                           
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                      <div class="col-lg-6">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_departamento"></div> 

                            <div class="table-responsive">

                                <div class="tab-pane" id="Regras">
                                    
                                <div class="help-block">
                                  <button type="button" class="btn btn-primary btn-circle btn-lg"><i class="glyphicon glyphicon-user"></i>
                            </button>
                                    <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fa fa-money"></i>
                            </button>
                                  <button type="button" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-print"></i>
                            </button>
                                                                
                               
                               
                                </div>
                                    
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            PRODUTOS
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                           <div id="msg_departamento"></div> 
                          
                            <div class="table-responsive">

                                <div class="tab-pane" id="Regras">
                                <div class="help-block col-md-6 col-lg-6">
                                <label>Codigo</label>
                                <select class="form-control codproduto" name="cod_produti" id="cod_produti">
                                    <option ></option>
                                </select>
                                </div>
                                        
                                <div class="help-block col-md-6 col-lg-6">
                                <label>Produto</label>
                                <select class="form-control produtos" name="produto" id="produto">

                                </select>
                                </div>
                                  
                                <div class="help-block col-md-6 col-lg-6"><p></p>
                                <label>Preço Unitário</label>
                                <input class="form-control col-md-4 col-lg-4" name="preco" id="preco" placeholder="0,00" disabled>
                                </div>
                                        
                                <div class="help-block col-md-6 col-lg-6"><p></p>
                                <label>Quantidade</label>
                                <input class="form-control col-md-4 col-lg-4" name="qtd" id="qtd" type="number" min="0" placeholder="0">
                                </div>
                                    
                                </div>
                                <br><br>
                    </div>
                            <div class="panel panel-default"></div>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Produto</th>
                                            <th>Qtd</th>
                                            <th>Preço</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="produtos">
                                        
                                    </tbody>
                                </table>
                           <div class="panel panel-default">
                           <div class="panel-body">
                               <a  class="btn btn-primary"  href="#"  id="adiconar_produtos" name="adiconar_produtos">Adicionar</a>
                                <button type="button" class="btn btn-danger">Remover</button>
                        </div>
                            </div>
                           </div>
                            <!-- /.table-responsive -->
                        </div>
                    
                        <!-- /.panel-body -->
                    </div>
              <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            RESUMO DE PAGAMENTO
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        
                        <div id="msg_venda"></div>
                            <div class="table-responsive">
                              
                                <div class="help-block col-md-12 col-lg-12">
                                <label>Total a Pagar AKZ</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="valortotal" id="valortotal" placeholder="0,00" disabled>
                                </div>
                                <div class="help-block col-md-12 col-lg-12"><p></p>
                                <label>Forma de Pagamento</label>
                                <select class="form-control" name="formapag" id="formapag">
                                    <option ></option>
                                    <option value="Numerario">Numerário</option>
                                    <option value="Multicaixa">Multicaixa</option>
                                    
                                </select>
                                </div>
                                <div class="help-block col-md-6 col-lg-6">
                                <label>Desconto</label>
                                <input class="form-control col-md-4 col-lg-4" type="text" name="" id="" placeholder="0,00">
                                </div>
                                <div class="help-block col-md-6 col-lg-6">
                                <label>Valor Desconto</label>
                                <input class="form-control col-md-4 col-lg-4" value="0" type="text" name="desc" id="desc" placeholder="0,00">
                                </div>   
                                
                                
                                
                                <div class="help-block col-md-6 col-lg-6"><p></p>
                                <label>Valor Recebido</label>
                                <input class="form-control col-md-4 col-lg-4" name="valor_recebido" id="valor_recebido" placeholder="0,00">
                                </div>
                                <div class="help-block col-md-6 col-lg-6"><p></p>
                                <label>Remanecente / AKZ</label>
                                <input class="form-control" name="troco" id="troco" placeholder="0,00" disabled>
                                </div>
                                <br><br>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" class="btn btn-success" name="pagar_compra" id="pagar_compra">PAGAR</button>
                                <button type="button" class="btn btn-warning">Factura/Recibo </button>
                       </div>
                        <!-- /.panel-body -->
                    </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    <!-- /.panel -->
                </div>
            
            
            
                <!-- /.col-lg-6 -->
               
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
    <script type="text/javascript" src="../js/Admin/farmacia.js"></script>
    <script type="text/javascript" src="../js/Admin/departamentos.js"></script>
    <script type="text/javascript" src="../js/Admin/cargos.js"></script>
    <script type="text/javascript" src="../js/Admin/geral.js"></script>
    <script type="text/javascript" src="../js/Admin/analisesclinicas.js"></script>
    <script type="text/javascript">
    ListarClientes();
    ListarProdutos();
    ListarProduto_codigo();
    Adicionar_Produto();
    inserir_venda();
    $("#produto").on('change', function(){
        var medicamento = this.value;
            //console.log(medicamento);
            //console.log($('#cod_produti').filter('[value='+medicamento+']').change());
          selecionar_producto(medicamento);
    });
    $("#cod_produti").on('change', function(){
        var medicamento = this.value;
        selecionar_producto(medicamento);
	});
</script>

</body>

</html>
