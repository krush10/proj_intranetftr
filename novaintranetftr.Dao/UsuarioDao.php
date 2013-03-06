<?php session_start();

include("../conn/configuracao.php");
include_once '../novaintranetftr.Bean/UsuarioBean.php';


class UsuarioDao {

    public function __construct() {
    }   
    
    public function gravarUsuario(UsuarioBean $usuariobean){
        
        $query = mysql_query("INSERT INTO usuario(nome_usuario,logo_img,usuario,senha,perfil,exibir) VALUES ('".$usuariobean->getNome_Usuario()."','','".$usuariobean->getUsuario()."','".$usuariobean->getSenha()."','".$usuariobean->getPerfil()."','sim')");
        
        $recuperaID = mysql_query("SELECT id FROM usuario ORDER BY id DESC LIMIT 1");
        $array = @mysql_fetch_array($recuperaID);
        $id = $array['id'];
        
        foreach ($usuariobean->getLogo_Img() as $img){
            $inserirImagens = mysql_query("UPDATE usuario SET logo_img = '".$img."' WHERE id = $id");
        }
        
        //Gravando Log
        $admin = $_SESSION['id_usuario'];
        $datahora = date('Y-m-d H:i:s');
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi inserido um novo usuario no sistema','$datahora',".$id.",null,".$admin.")");
        header("Location:http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php"); 
        
    }
    
    public function excluirUsuario(UsuarioBean $usuariobean){
        
       $query = mysql_query("UPDATE usuario SET exibir = 'nao' WHERE id = '".$usuariobean->getId()."'");
       
       //Gravando Log
       $admin = $_SESSION['id_usuario'];
       $datahora = date('Y-m-d H:i:s');
       $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi excluido um usuario no sistema','$datahora',".$usuariobean->getId().",null,".$admin.")");
       
       header("Location:http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php"); 
        
    }
    
    
    public function atualizarUsuario(UsuarioBean $usuariobean, $id){
        $query = mysql_query("UPDATE usuario SET nome_usuario = '".$usuariobean->getNome_Usuario()."', usuario = '".$usuariobean->getUsuario()."', senha = '".$usuariobean->getSenha()."', perfil = '".$usuariobean->getPerfil()."' WHERE id = $id");
        
        
        $img_logo = $usuariobean->getLogo_Img();
        
        if(isset($img_logo)){
            foreach($usuariobean->getLogo_Img() as $img){
                $inserirImagens = mysql_query("UPDATE usuario SET logo_img = '".$img."' WHERE id = $id");
            } 
        }
        
        //Gravando Log
        $user = $_SESSION['id_usuario'];
        $datahora = date('Y-m-d H:i:s');
        
        $buscar_perfil = mysql_query("SELECT perfil FROM usuario WHERE id = $user");
        $array_perfil = @mysql_fetch_array($buscar_perfil);
        $perfil = $array_perfil['perfil'];
        
        if($perfil == "Administrador"){
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi atualizado um usuario no sistema','$datahora',".$id.",null,".$user.")");
        }else{
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi atualizado um usuario no sistema','$datahora',".$id.",null,null)");    
        }
        echo "<script type='text/javascript'>history.go(-1);</script>";
        
    }
    
}

?>
