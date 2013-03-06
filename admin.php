<?php
    include("conn/configuracao.php");
    require "verifica_logado.php"; 
    
    $perfil = $_SESSION["usuario_perfil"];
    if($perfil != "Administrador"){
        echo "<script>location.href='login.php'</script>";
    }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, 
    minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mobile_admin_home.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_admin_home.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Administra&ccedil;&atilde;o - IntranetFTR</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
            <div id="barra"></div>
            <div id="clientes_cadastrados">
                <?php 
                    $campos_query = "id, nome_usuario";
                    $final_query = "FROM usuario WHERE perfil = 'Cliente' AND exibir = 'sim'";
                    
                    $maximo = 5;

                    $pagina = $_GET["p"];
                    if($pagina == "") {
                            $pagina = "1";
                    }

                    $inicio = $pagina - 1;
                    $inicio = $maximo * $inicio;
                    
                    $strCount = "SELECT COUNT(*) AS 'num_registros' $final_query";
                    $query = mysql_query($strCount);
                    $row = mysql_fetch_array($query);
                    $total = $row["num_registros"];

                    $recuperar = mysql_query("SELECT $campos_query $final_query LIMIT $inicio,$maximo");

                    while($array = mysql_fetch_array($recuperar)){
                        $id = $array['id'];
                        $nome_usuario = $array['nome_usuario'];
                        echo "<table id='conteudo'>";
                        echo "<tr>";
                            echo "<td id='cliente'>"."<a href='cliente.php?cliente=$id' title='Acesse este cliente'>".$nome_usuario."</a>"."</td>";
                            echo "<td id='excluir'>".
                                 "<form action='novaintranetftr.Controller/ExcluirUsuarioController.php' method='post'>
                                  <input type='hidden' name='cod_cliente' value='$id' />
                                  <input type='image' src='img/btn_excluir.png' width='65' height='20' title='Excluir' />
                                  </form>"."</td>";
                            echo "<td id='editar'>"."<a href='atualizar-usuario.php?cliente=$id'><img src='img/btn_editar.png' border='0' title='Editar'></a>"."</td>";
                        echo "</tr>";
                            echo "<tr><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td></tr>";
                        echo "</table>";
                    }
                    echo "<div id='paginador'>";	
                        $menos = $pagina - 1;
                        $mais = $pagina + 1;

                        $pgs = ceil($total / $maximo);

                        if($pgs > 1 ) {
                                echo "<br />";
                                if($menos >= 0) {
                                        $i = $_GET['p'] - 1;
                                        echo "<a title='in&iacute;cio' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php?p=><strong>in&iacute;cio</strong> </a>";
                                }
                                if($menos >= 1) {
                                        $i = $_GET['p'] - 1;
                                        echo "<a title='Anterior' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php?p=".($i)."><strong>anterior</strong> </a>";
                                }
                                for($i=$pagina; $i<$pagina+3; $i++) {
                                    if($i != $pagina) {
                                        echo " <a href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php"."?p=".($i).">$i</a> <font color='#CCCCCC'>|</font>";
                                    } else {
                                        echo " <strong>".$i."</strong> <font color='#CCCCCC'>|</font> ";
                                    }
                                    if($i == $pgs){
                                        break;
                                    }
                                }
                                if($mais <= $pgs) {
                                    if($_GET['p'] == 0){
                                        $_GET['p'] = 1;	
                                    }
                                    $i = $_GET['p'] + 1;
                                    
                                    echo " <a title='Pr&oacute;xima' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php"."?p=".($i)."> <strong>pr&oacute;xima</strong></a>";
                                }
                                if(($mais >= $pgs) || ($mais <= $pgs)) {
                                    echo " <a title='ultima p&aacute;gina' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/admin.php"."?p=".($pgs)."> ultima p&aacute;gina</a>";
                                }
                            }
                    echo "</div>";
                ?>
            </div>
            <div id="cadastrar">
                <a href="cadastrar-usuario.php"><img src="img/btn_cadastrar.png" border="0" /></a>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>