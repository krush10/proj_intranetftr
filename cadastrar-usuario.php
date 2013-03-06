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
    <link rel="stylesheet" type="text/css" href="css/mobile_admin_cadastra_usuario.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_admin_cadastra_usuario.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Cadastrar Usu&aacute;rio - IntranetFTR</title>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.MultiFile.js"></script>
    <script type="text/javascript" src="js/jquery.limit-1.2.source.js"></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
            <div id="barra"></div>
            <div id="cadastro_usuario">
                <form name="upload_files" action="novaintranetftr.Controller/CadastroUsuarioController.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="upload" value="ok" />
                        <table id='conteudo'>
                        <tr>
                                <td>Nome Cliente</td>
                            <td><input type="text" name="cliente" class="campo_input" /></td>
                        </tr>
                        <tr>
                                <td>Usu&aacute;rio</td>
                            <td><input type="text" name="usuario" class="campo_input" style="width:150px;" /></td>
                        </tr>
                        <tr>
                                <td>Senha</td>
                            <td><input type="password" name="senha" class="campo_input" style="width:150px;" /></td>
                        </tr>
                        <tr>
                            <td>Perfil</td>
                            <td><select style="border:1px solid #CCC; margin-left:0px;" name="perfil">
                            <option value="Cliente">Cliente</option>
                            <option value="Administrador">Administrador</option>
                            </select></td>
                        </tr>
                    </table>
                        <input type="file" name="img[]" id="file" class="multi" maxlength="1" title="Selecione uma logo" accept="jpeg|jpg|png|bmp" />
                <div id="btn_cadastrar">
                    <table>
                    <tr>
                        <td><input type="image" src="img/btn_cadastrar.png" width="93" height="36" /></td>
                    <td><a href="admin.php"><img src="img/btn_voltar.png" border="0" /></a></td>
                        <tr>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
