<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consoft-Sistema de Gestão Integrado</title>

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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Consoft-Gestão</h3>
                    </div>
                    <div id="msg"></div>
                    <div class="panel-body">
                    <form role="form" method="POST" id="formulario">
                        <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nome" name="nome" id="nome" type="text"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" id="senha" type="password" value="senha">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="Lembrar" type="checkbox" value="Lembrar ">Lembrar 
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="inicio.php" id="login" name="login" value="Entrar" class="btn btn-lg btn-success btn-block">Entrar</a>
                            </fieldset><br>
                                    <label>
                                        <a href="" value="Remember"><i class="fa fa-key"></i> Esquece a Senha</a>
                                    </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    <script type="text/javascript">
        $('#login').click(function(e) {
    
        e.preventDefault();
        
        var nome = jQuery('#nome').val();
        var senha = jQuery('#senha').val();
        // var foto = jQuery('#foto').val();


       // $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');

        $.ajax({
            type: "POST",
            url: "../Config/login_user.php",
            data: {senha:senha, nome:nome},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if($("#formulario input").val() != ""){


                if (data.toString() == 'sucesso') {

                    jQuery('#msg').html('<div class="alert alert-success"><strong>Êxito!</strong> Login efectuado.</div>').show(300).delay(5000).hide(300);
                    $("#formulario input").val(""); //limpa todos inputs do formulário
                   location.href="inicio.php";

return false;
                } else {
                    if(data.toString() == 'erro'){
                        jQuery('#msg').html('<div class="alert alert-danger"><strong>Irregularidade!</strong> Dados incorretos.</div>').show(300).delay(5000).hide(300);
                    
                    return false;
                    }else{
                        jQuery('#msg').html('<div class="conexao"><strong>Problema!</strong> Ocorreu um erro na conexão com a BD.</div>').show(300).delay(5000);
                    
                    return false;
                    } 
                }
            }
            else{
                jQuery('#msg').html('<div class="alert alert-dange"><strong>Irregularidade!</strong> Porfavor verifique se os campos estão todos preenchidos.</div>').show(300).delay(5000).hide(300);
            }
            }


        });
    });

</script>


</body>

</html>
