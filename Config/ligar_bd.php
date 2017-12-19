<?php
define('usuario', 'root');
define('senha', 'americo');
define('Host', 'mysql:host=localhost;dbname=amaclinicas');
define('Host1', 'mysql:host=localhost;dbname=kmony');
class Ligar{
    private static $conn = null;
    public static function conectar() {
        try {
            self::$conn = new PDO(Host, usuario, senha);
        } catch (exception $erro) {
            //echo '<script type = "text/javascript">alert("Ocorreu um erro na conexão");location.href="index.php";</script>';
            //print_r($erro);

            //echo "<center><h2>Ocorreu um erro de conexao</h2></center><br><center><h3>Contacte o Administrador do Sistema</h3></center>";
        }
        return self::$conn;
    }
    public static function chamar_bd() {
        return(self::$conn == null) ? self::conectar() : self::$conn;
    }

}


/**
*
*/
class conection_RH
{

   private static $conection =null;
   public static function ligar_RH(){
   try{
     self::$conection=new PDO(Host1,usuario,senha);

   }catch(exception $anomalia){
    ///mensagem se der erro
   }
   return self::$conection;
}
public static function ligar_bd_RH(){
    return(self::$conection==null) ? self::ligar_RH():self::$conection;
}

}