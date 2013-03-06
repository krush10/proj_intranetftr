<?php

    include_once '../novaintranetftr.Bean/ArquivoBean.php';
    include_once '../novaintranetftr.Dao/ArquivoDao.php';
    
    
    $listaArquivo = new ArquivoBean();
    $arquivoDao = new ArquivoDao();
    
    if(isset($_POST['id_arquivo'])){$id_arquivo = $_POST['id_arquivo'];}
    
    $listaArquivo->setNome($_POST['nome_arquivo']);
    $listaArquivo->setDescricao($_POST['descricao']);
    $listaArquivo->setId_Usuario($_POST['id_usuario']);
    
    
    
    if(isset($_POST['upload'])){
            $pasta = '../imagens/';
            foreach($_FILES["img"]["error"] as $key => $error){
            if($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            $cod = date('dmy') . '-' . $_FILES["img"]["name"][$key];
            $nome = $_FILES["img"]["name"][$key];
            $uploadfile = $pasta . basename($cod);
            
                if(move_uploaded_file($tmp_name, $uploadfile)){
                    $listaArquivo->setUrl($uploadfile);
                }
                }    
            }
            }
            
            $arquivoDao->atualizarArquivo($listaArquivo, $id_arquivo);

?>
