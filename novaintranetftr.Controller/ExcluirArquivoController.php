<?php

    include_once '../novaintranetftr.Bean/ArquivoBean.php';
    include_once '../novaintranetftr.Dao/ArquivoDao.php';
    
    
    $listaArquivo = new ArquivoBean();
    $arquivoDao = new ArquivoDao();
    
    $listaArquivo->setId($_POST['cod_arquivo']);
    $listaArquivo->setId_Usuario($_POST['id_usuario']);
    
    $arquivoDao->excluirArquivo($listaArquivo);

?>
