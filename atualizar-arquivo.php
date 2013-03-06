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
    <link rel="stylesheet" type="text/css" href="css/mobile_cliente_atualiza_arquivo.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_cliente_atualiza_arquivo.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Atualizar Arquivo - IntranetFTR</title>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.MultiFile.js"></script>
    <script type="text/javascript" src="js/jquery.limit-1.2.source.js"></script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
        <div id="cadastro_usuario">
            <?php    
            
                if(isset($_GET['arq'])){$id_arquivo = $_GET['arq'];}
                
                $query = mysql_query("SELECT nome, descricao, id_usuario FROM arquivo WHERE id = $id_arquivo");
                $array = @mysql_fetch_array($query);
                $nome = $array['nome'];
                $descricao = $array['descricao'];
                $id_usuario = $array['id_usuario'];
            
                echo "<form name='upload_files' action='novaintranetftr.Controller/AtualizarArquivoController.php' method='post' enctype='multipart/form-data'>";
                   echo "<input type='hidden' name='id_arquivo' value='$id_arquivo' />";
                   echo "<input type='hidden' name='id_usuario' value='$id_usuario' />";
                   echo "<input type='hidden' name='upload' value='ok' />";
                   echo "<input type='file' name='img[]' id='file' class='multi' maxlength='1' title='Selecione uma logo' accept='jpeg|jpg|png|bmp|docx|doc|pdf|txt' />";
                echo "<table id='conteudo'>";
                    echo "<tr>";
                       echo "<td><input type='text' name='nome_arquivo' value='$nome' onfocus='limpar(this);' onblur='escrever(this);' class='campo_input' /></td>";
                    echo "</tr>";
                    echo "<tr>";
                       echo "<td><textarea name='descricao' class='campo_mensagem'>$descricao</textarea></td>";
                    echo "</tr>";
                echo "</table>";
                echo "<table>";
                    echo "<tr>";
                        echo "<td><input type='image' name='img' src='img/btn_atualizar.png' name='upload' value='Upload' width='93' height='36' /></td>";
                        echo "<td><a href='javascript:void(0);' onclick='history.go(-1)'><img src='img/btn_voltar_.png' border='0' /></a></td>";
                    echo "<tr>";
                echo "</table>";
                echo "</form>";
             ?>       
        </div>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
