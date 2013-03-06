<?php session_start(); 

include("novaintranetftr.Util/antiSqlInjection.php");
include("novaintranetftr.Util/logger.php");
require "conn/configuracao.php";

// Recupera o login

$usuario = isset($_POST["usuario"]) ? addslashes(trim($_POST["usuario"])) : FALSE;

$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

// Usuário não forneceu a senha ou o login

if(!$usuario || !$senha)
{
    echo "<script>location.href='login.php'</script>";
    exit;
}
/**

* Executa a consulta no banco de dados.

* Caso o número de linhas retornadas seja 1 o login é válido,

* caso 0, inválido.

*/
$SQL = "SELECT id,usuario,senha,perfil,exibir FROM usuario WHERE usuario='".SqlInjection($usuario)."';";

if(!$SQL){
	header("Location:login.php");
}else{

$result_id = @mysql_query($SQL);

$total = @mysql_num_rows($result_id);

}

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)

{
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão

    $dados = @mysql_fetch_array($result_id);
    // Agora verifica a senha

    if(!strcmp(SqlInjection($_REQUEST['senha']), $dados["senha"]))
    {
                if(($dados["perfil"] == "Administrador") && ($dados["exibir"] == "sim")){
                echo "<script>location.href='admin.php'</script>";

                $_SESSION["id_usuario"]   = $dados["id"];
                $_SESSION["nome_usuario"] = $dados["usuario"];
                $_SESSION["usuario_perfil"] = $dados["perfil"];
                
                Logger($_SESSION["nome_usuario"]." logou no sistema.");

                exit;
                }else if(($dados["perfil"] == "Administrador") && ($dados["exibir"] == "nao")){
                
                    echo "<script>location.href='login.php'</script>";  
                    
                }else if(($dados["perfil"] == "Cliente") && ($dados["exibir"] == "sim") ){

                echo "<script>location.href='cliente.php'</script>";

                $_SESSION["id_usuario"]   = $dados["id"];
                $_SESSION["nome_usuario"] = $dados["usuario"];
                $_SESSION["usuario_perfil"] = $dados["perfil"];
                
                Logger($_SESSION["nome_usuario"]." logou no sistema.");

                }else if(($dados["perfil"] == "Cliente") && ($dados["exibir"] == "nao") ){
                
                    echo "<script>location.href='login.php'</script>";    
                              
                }	
    }
    // Senha inválida
    else
    {
        echo "<script>location.href='login.php'</script>";
        exit;
    }

}
// Login inválido
else
{
    echo "<script>location.href='login.php'</script>";
    exit;
}

?>

