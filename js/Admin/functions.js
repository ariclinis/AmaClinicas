function verificar_json(str) {
    try {
        JSON.parse(str);
        return true;
    } catch (e) {
        return false;
    }
}
function login(){
    $('#entrar').on('click',function(){
        var user = $('#nome').val();
    var senha = $('#senha').val();

    $.ajax({
        type: "POST",
        url: "Model/Admin/GestaoUtilizadores/login.php",
        data: "nome="+user+"&senha="+senha,
        success:function(resultado){
            if (resultado==1) {
            $('#msg').html('<div class="alert alert-success" role="alert"> <strong>Sucesso!</strong>Login Efectuado</div>');
            window.setTimeout("location.href='pages/inicio.php'",4000);
            }else{
             $('#msg').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong>'+resultado+'</div>');
            }
        }
    });
    });
}