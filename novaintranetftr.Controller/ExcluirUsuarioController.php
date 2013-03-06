<?php

    include_once '../novaintranetftr.Bean/UsuarioBean.php';
    include_once '../novaintranetftr.Dao/UsuarioDao.php';
    
    
    $listaUsuario = new UsuarioBean();
    $usuarioDao = new UsuarioDao();
    
    $listaUsuario->setId($_POST['cod_cliente']);
    
    $usuarioDao->excluirUsuario($listaUsuario);

?>