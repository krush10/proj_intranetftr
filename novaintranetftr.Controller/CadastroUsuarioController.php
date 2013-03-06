<?php

    include_once '../novaintranetftr.Bean/UsuarioBean.php';
    include_once '../novaintranetftr.Dao/UsuarioDao.php';
    
    
    $listaUsuario = new UsuarioBean();
    $usuarioDao = new UsuarioDao();
    
    
    $listaUsuario->setNome_Usuario($_POST['cliente']);
    $listaUsuario->setUsuario($_POST['usuario']);
    $listaUsuario->setSenha($_POST['senha']);
    $listaUsuario->setPerfil($_POST['perfil']);
    
    if(isset($_POST['upload'])){
            $pasta = '../imagens/';
            foreach($_FILES["img"]["error"] as $key => $error){
            if($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["img"]["tmp_name"][$key];
            $cod = date('dmy') . '-' . $_FILES["img"]["name"][$key];
            $nome = $_FILES["img"]["name"][$key];
            $uploadfile = $pasta . basename($cod);
            
                if(move_uploaded_file($tmp_name, $uploadfile)){
                    $listaUsuario->setLogo_Img($uploadfile);
                }
                }    
            }
            }
            
            $usuarioDao->gravarUsuario($listaUsuario);

?>
