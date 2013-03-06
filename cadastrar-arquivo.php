<?php
    include("conn/configuracao.php");
    require "verifica_logado.php";  
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, 
    minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mobile_cliente_cadastra_arquivo.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_cliente_cadastra_arquivo.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Cadastrar Arquivo - IntranetFTR</title>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.MultiFile.js"></script>
    <script type="text/javascript" src="js/jquery.limit-1.2.source.js"></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
        <div id="cadastro_usuario">
            <form name="upload_files" action="novaintranetftr.Controller/CadastroArquivoController.php" method="post" enctype="multipart/form-data">
                <?php 

                if(isset($_GET['cliente'])){
                    $codigo = $_GET['cliente'];
                }else{
                    $codigo = $_SESSION['id_usuario'];
                }

                echo "<input type='hidden' name='id_usuario' value='$codigo' />";
                ?>
                <input type="hidden" name="upload" value="ok" />
                <input type="file" name="img[]" id="file" class="multi" maxlength="1" title="Selecione uma logo" accept="jpeg|jpg|png|bmp|docx|doc|pdf|txt" />
            <table id='conteudo'>
                <tr>
                    <td><input type="text" name="nome_arquivo" value=" Nome" onfocus="limpar(this);" onblur="escrever(this);" class="campo_input" /></td>
                </tr>
                <tr>
                    <td><textarea name="descricao" class="campo_mensagem">Descri&ccedil;&atilde;o</textarea></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><input type="image" name="img" src="img/btn_cadastrar.png" name="upload" value="Upload" width="93" height="36" /></td>
                    <td><a href="javascript:void(0);" onclick="history.go(-1)"><img src="img/btn_voltar_.png" border="0" /></a></td>
                <tr>
            </table>
            </form>
        </div>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
