/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("input").blur(function(){
     if($(this).val() == "")
         {
             $(this).css({"border-color" : "#F00", "padding": "2px"}).attr("placeholder", "Campo obrigatório");
         }
    });
});

function actualizar_senha(){
console.log("click");
 $('#Alterar_senha').on('click',function(){
        var Antiga= jQuery('#Antiga').val();
        var Novacopia = jQuery('#SenhaNova').val();
        var Nova = jQuery('#confirmar_senha').val();
    $.ajax({
        type: "POST",
        data: "senhaantiga="+Antiga+"&novasenha="+Novacopia+"&Nova="+Nova,
        url: "../Model/Admin/Administracao/Actualizar_Senha.php",
        
        success:function(resultado){
            if(resultado=="sucesso"){
                $('#msg_confiSenha').html('<div class="alert alert-success" role="alert"> <strong>Sucesso! </strong> Senha Alterada com sucesso.</div>').show(300).delay(5000).hide(300); 
            }else{
                $('#msg_confiSenha').html('<div class="alert alert-warning" role="alert"> <strong>Problema!</strong> Ocorreu um erro ao fazer a Alteração Contacte o Administrador</div>').show(300).delay(5000).hide(300);
            }
        }
    });

});
} 




