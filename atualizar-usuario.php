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
    <link rel="stylesheet" type="text/css" href="css/mobile_admin_atualiza_usuario.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_admin_atualiza_usuario.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Atualizar Usu&aacute;rio - IntranetFTR</title>
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
                <?php
                    
                    if(isset($_GET['cliente'])){
                        $codigo = $_GET['cliente'];
                    }else{
                        $codigo = $_SESSION['id_usuario'];
                    }
                
                    $query = mysql_query("SELECT nome_usuario, usuario, senha, perfil FROM usuario WHERE id = $codigo");
                    $array = @mysql_fetch_array($query);
                    $nome_usuario = $array['nome_usuario'];
                    $usuario = $array['usuario'];
                    $senha = $array['senha'];
                    $perfil = $array['perfil'];
                
                    echo "<form name='upload_files' action='novaintranetftr.Controller/AtualizarUsuarioController.php' method='post' enctype='multipart/form-data'>";
                        echo "<input type='hidden' name='upload' value='ok' />";
                        echo "<input type='hidden' name='cod_cliente' value='$codigo' />";
                        echo "<table id='conteudo'>";
                        echo "<tr>";
                                echo "<td>Nome Cliente</td>";
                            echo "<td><input type='text' name='cliente' value='$nome_usuario' class='campo_input' /></td>";
                        echo "</tr>";
                        echo "<tr>";
                                echo "<td>Usu&aacute;rio</td>";
                            echo "<td><input type='text' name='usuario' value='$usuario' class='campo_input' style='width:150px;' /></td>";
                        echo "</tr>";
                        echo "<tr>";
                                echo "<td>Senha</td>";
                            echo "<td><input type='password' name='senha' value='$senha' class='campo_input' style='width:150px;' /></td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Perfil</td>";
                            echo "<td><select style='border:1px solid #CCC; margin-left:0px;' name='perfil'>";
                            if($perfil == "Cliente"){
                            echo "<option value='Cliente' selected>Cliente</option>";
                            }else if($perfil == "Administrador"){
                            echo "<option value='Administrador' selected>Administrador</option>";
                            }
                            echo "</select></td>";
                        echo "</tr>";
                    echo "</table>";
                        echo "<input type='file' name='img[]' id='file' class='multi' maxlength='1' title='Selecione uma logo' accept='jpeg|jpg|png|bmp' />";
                echo "<div id='btn_cadastrar'>";
                    echo "<table>";
                    echo "<tr>";
                        echo "<td><input type='image' src='img/btn_atualizar.png' width='93' height='36' /></td>";
                        echo "<td><a href='javascript:void(0);' onclick='history.go(-1);'><img src='img/btn_voltar_.png' border='0' /></a></td>";
                        echo "<tr>";
                    echo "</table>";
                echo "</div>";
                echo "</form>";
                ?>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
