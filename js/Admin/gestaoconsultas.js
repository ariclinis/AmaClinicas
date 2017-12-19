//Verifica se o input esta vazio
$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});

//LIstagem de Consultas Marcadas
function listarConsultas(){
    var dados = $("#listdados");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemConsultas.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoPacientes/paciente_ficha.php'>Boletim</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.Nome_Medico+"</td><td>"+val.Tipo_Consulta+"</td><td>"+val.Data_Consult+"</td><td>"+val.Estado_Consulta+"</td><td><button id="+val.id+" class='btn btn-outline btn-danger btn-sm'>Eliminar</button> <button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar </button>"+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}



//LIstagem de Controlo de Atendimento
function listarControlo(){
    var dados = $("#listcontrolo");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemControloAtendimento.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = "  <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='?Presente="+val.Cod_Consulta+"'>Presente</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.Nome_Medico+"</td><td>"+val.Tipo_Consulta+"</td><td>"+val.Hora_Inicio+"</td><td>"+val.Estado_Consulta+"</td><td>"+val.Estado_Fila+"</td><td><a class='btn btn-outline btn-success btn-sm' href='?remarcar="+val.Cod_Consulta+"'> Remarcar </a> <a id="+val.id+" class='btn btn-outline btn-danger btn-sm' href='?Cancelar="+val.Cod_Consulta+"'> Cancelar </a>"+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

//Listar Meus Pacientes
function listarFila(){
    var dados = $("#listfila");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemMeusPacientes.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoPacientes/paciente_ficha.php'>Presente</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.Tipo_Consulta+"</td><td>"+val.Data_Consult+"</td><td>"+val.Hora_Inicio+"</td><td>"+val.Nome_Login+"</td><td>"+val.Estado_Fila+"</td><td><a id="+val.id+" class='btn btn-outline btn-success btn-sm' href='?Atendido="+val.Cod_Consulta+"'> Atendido </a> <a id="+val.id+" class='btn btn-outline btn-danger btn-sm' href='?Ausente="+val.Cod_Consulta+"'> Ausente </a></tr>");
                        dados.append(novaLinha);
                        
                    });
                }
            });
}


//Listar Pacientes Atendidos
function listarPacientesAtendidos(){
    var dados = $("#listAtendidos");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemPacientesAtendidos.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = "<div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoConsultasMedicas/ficha_Atedimento.php?cod_conusulta="+val.Cod_Consulta+"'>Boletim de Atedimento</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.Nome_Medico+"</td><td>"+val.Tipo_Consulta+"</td><td>"+val.Data_Consult+"</td><td>"+val.Estado_Fila+"</td><td> "+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}


//-------------LISTA DE ANALISES MARCADAS ------------------------


function listarAnalises(){
    var dados = $("#listdados");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemAnalises.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoLaboratorio/Analises_Marcadas_paciente.php?n_consult="+val.N_Consulta_Analise+"'>Boletim</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.N_Consulta_Analise+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.Situa+"</td><td>"+val.Data_Registo+"</td><td>"+val.Estado_Consulta+"</td><td><button id="+val.id+" class='btn btn-outline btn-danger btn-sm'>Eliminar</button> <button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar </button>"+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}


//LIstagem de Controlo de Atendimento de Analises

function listarControloAnalises(){
    var dados = $("#listcontrolo");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemControloAtendimento_Analises.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='?Presente="+val.Cod_Consulta+"'>Presente</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.N_Consulta_Analise+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.Estado_Consulta+"</td><td>"+val.Data_Registo+"</td><td>"+val.Estado_Fila+"</td><td><a id="+val.id+" class='btn btn-outline btn-success btn-sm' href='?remarcar="+val.Cod_Consulta+"'> Remarcar </a> <a id="+val.id+" class='btn btn-outline btn-danger btn-sm' href='?Cancelar="+val.Cod_Consulta+"'> Cancelar </a>"+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

//Listar Meus Pacientes Analises
function listarFilaAnalise(){
    var dados = $("#listfila");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemMeusPacientesAnalises.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoPacientes/paciente_ficha.php'>Presente</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.Situa+"</td><td>"+val.Data_Registo+"</td><td>"+val.Nome_User+"</td><td>"+val.Estado_Fila+"</td><td><a id="+val.id+" class='btn btn-outline btn-success btn-sm' href='?Atendido="+val.Cod_Consulta+"'> Atendido </a> <a id="+val.id+" class='btn btn-outline btn-danger btn-sm' href='?Ausente="+val.Cod_Consulta+"'> Ausente </a></tr>");
                        dados.append(novaLinha);
                        
                    });
                }
            });
}


function listarAtendidosAnalises(){
    var dados = $("#listAtendidos");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemAnaliseAtendidas.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../Reports/GestaoPacientes/paciente_ficha.php'>Boletim de Atedimento</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.N_Consulta_Analise+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.Situa+"</td><td>"+val.Data_Registo+"</td><td>"+val.Estado_Fila+"</td><td> "+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

//Contactos dos Pacientes 

function listagemContactos(){
    var dados = $("#listcont");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoPacientes/listagem.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm'>Imprimir ficha</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_Paciente+"</td><td>"+val.genero+"</td><td>"+val.Telefone+"</td><td>"+val.Email+"</td><td>"+val.data_registo+"</td><td>"+btnOutros+" </tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}


//Lista de utilizadores

function listarUtilizadores(){
    var dados = $("#listcontrolo");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/GestaoConsultas/listagemUtilizadores.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var btnOutros = " <div class='btn-group'><a type='button' class='btn btn-outline btn-primary btn-sm' href='../pages/Atribuir_Acessos.php?user="+val.id+"'>Atribuir Permissões</a></div>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Nome_User+"</td><td>"+val.Nome_Login+"</td><td>"+val.Perfil_Acesso+"</td><td>"+val.estado+"</td><td><button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar Registo </button> <a id="+val.id+" class='btn btn-outline btn-danger btn-sm' href='?reset="+val.id+"'> Resetar Senha </a>"+btnOutros+"</tr>");
                        dados.append(novaLinha);
                    });
                }
            });
}

//Modulos do Sistema 

function listarModulos(){
    var dados = $("#listmodulo");
     dados.html("");
    $.ajax({
                type: "GET",
                data: "",
                url: "../Model/Admin/Administracao/listagemModulosSistema.php",
                success: function (result) {
                    var resultadoObj= JSON.parse(result);
                    var c= 1;
                    $.each(resultadoObj, function(key,val){
                        var acesso="<td><center><input type='checkbox' class='btn btn-outline btn-primary btn-sm'</input></center></td>";
                        var novaLinha = $("<tr>");
                        novaLinha.html("<td>"+(c++)+"</td><td>"+val.Modulo+"</td>"+acesso+"<td><button id="+val.id+" class='btn btn-outline btn-success btn-sm'> Editar Registo </button> <button id="+val.id+" class='btn btn-outline btn-danger btn-sm'> Actualizar");
                        dados.append(novaLinha);
                    });
                }
            });
}

function inserirPermissao(){
$('#Atribuir_Acesso').on('click',function() {
    
        e.preventDefault();

        var user_inseri = jQuery('#user_inseri').val();
        var activo = new Array();
$("input[name='activo[]']:checked").each(function ()
{
   // valores inteiros usa-se parseInt
   activo.push(parseInt($(this).val()));
   // Para pegar string
  // activo.push($(this).val());
});
        $.ajax({
            type: "POST",
            url: "../Controllers/Admin/GestaoPermissoes.php",
            data: {activo: activo, user_inseri:user_inseri},
            //beforeSend: function(dado){
            //jQuery('.user-profile').append('Processando.....<span class=" fa fa-angle-down"> Processando</span>');
            //},
            success: function (data) {
                if (data.toString() == 'sucesso') {
                    jQuery('#msg_acesso').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong>Registo efetuado com sucesso.</div>').show(300).delay(5000).hide(300);
                    jQuery('#activo[]').val("");
                } else{
                    jQuery('#msg_acesso').html('<div class="alert alert-warning" role="alert"> <strong>Problema! </strong>Ocorreu um erro ao fazer o Registo</div>').show(300).delay(5000).hide(300);
                }
            }

        });
    });
}