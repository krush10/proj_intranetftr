<?php session_start();

include("../conn/configuracao.php");
include_once '../novaintranetftr.Bean/ArquivoBean.php';

class ArquivoDao {
    
    public function __construct() {}
    
    
    public function inserirArquivo(ArquivoBean $arquivobean){
        
        $query = mysql_query("INSERT INTO arquivo (codigo,nome,descricao,url,id_usuario,exibir) VALUES ('".$arquivobean->getCodigo()."','".$arquivobean->getNome()."','".$arquivobean->getDescricao()."','',".$arquivobean->getId_Usuario().",'sim')");
    
        $recuperaID = mysql_query("SELECT id FROM arquivo ORDER BY id DESC LIMIT 1");
        $array = @mysql_fetch_array($recuperaID);
        $id = $array['id'];
        
        $img_arquivo = $arquivobean->getUrl();
        
        if(isset($img_arquivo)){
        foreach($arquivobean->getUrl() as $img){
            $inserirImagens = mysql_query("UPDATE arquivo SET url = '".$img."' WHERE id = $id");
        }
        }

        //Gravando Log
        $user = $_SESSION['id_usuario'];
        $datahora = date('Y-m-d H:i:s');
        
        $buscar_perfil = mysql_query("SELECT perfil FROM usuario WHERE id = $user");
        $array_perfil = @mysql_fetch_array($buscar_perfil);
        $perfil = $array_perfil['perfil'];
        
        if($perfil == "Administrador"){
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi inserido um novo arquivo no sistema','$datahora',".$arquivobean->getId_Usuario().",$id,$user)");
        }else{
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Foi inserido um novo arquivo no sistema','$datahora',".$arquivobean->getId_Usuario().",$id,null)");   
        }
        echo "<script type='text/javascript'>history.go(-1);</script>";
        
    }
    
    public function excluirArquivo(ArquivoBean $arquivobean){
       
       $query = mysql_query("UPDATE arquivo SET exibir = 'nao' WHERE id = '".$arquivobean->getId()."'"); 
       
       //Gravando Log
       $user = $_SESSION['id_usuario'];
       $datahora = date('Y-m-d H:i:s');
        
       $buscar_perfil = mysql_query("SELECT perfil FROM usuario WHERE id = $user");
       $array_perfil = @mysql_fetch_array($buscar_perfil);
       $perfil = $array_perfil['perfil'];
       
       if($perfil == "Administrador"){
       $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Um arquivo foi excluido do sistema','$datahora',".$arquivobean->getId_Usuario().",".$arquivobean->getId().",$user)");
       }else{
       $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Um arquivo foi excluido do sistema','$datahora',".$arquivobean->getId_Usuario().",".$arquivobean->getId().",null)");    
       }
       
       echo "<script type='text/javascript'>history.go(-1);</script>";
    
    }
    
    
    public function atualizarArquivo(ArquivoBean $arquivobean, $id){
        $query = mysql_query("UPDATE arquivo SET nome = '".$arquivobean->getNome()."', descricao = '".$arquivobean->getDescricao()."' WHERE id = $id ");
        
        $url = $arquivobean->getUrl();
        
        if(isset($url)){
            foreach($arquivobean->getUrl() as $img){
                $inserirImagens = mysql_query("UPDATE arquivo SET url = '".$img."' WHERE id = $id");
            } 
        }
        
        //Gravando Log
        $user = $_SESSION['id_usuario'];
        $datahora = date('Y-m-d H:i:s');

        $buscar_perfil = mysql_query("SELECT perfil FROM usuario WHERE id = $user");
        $array_perfil = @mysql_fetch_array($buscar_perfil);
        $perfil = $array_perfil['perfil'];
        
        if($perfil == "Administrador"){
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Um arquivo foi atualizado no sistema','$datahora',".$arquivobean->getId_Usuario().",$id,$user)");
        }else{
        $gravandoLog = mysql_query("INSERT INTO log_sistema (ocorrido,dia_hora,id_usuario,id_arquivo,id_usuario_admin) VALUES ('Um arquivo foi atualizado no sistema','$datahora',".$arquivobean->getId_Usuario().",$id,null)");    
        }
        
        echo "<script type='text/javascript'>history.go(-1);</script>";
    } 
    
}

?>
