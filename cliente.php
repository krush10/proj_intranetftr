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
    <link rel="stylesheet" type="text/css" href="css/mobile_cliente_home.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_cliente_home.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <title>Cliente - IntranetFTR</title>
    <script type="text/javascript">
        $(document).ready(function(){
            if (screen.width<=480){
                $("#download").attr("src", "img/btn_download_320.png"); 
                $("#excluir_img").attr("src", "img/btn_excluir_320.png");
                $("#excluir_img").attr("width", "25");
                $("#excluir_img").attr("height", "20");
                $("#editar_img").attr("src", "img/btn_editar_320.png");
            }
        });
    </script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
            <div id="logo">
            <?php 
                if(isset($_GET['cliente'])){
                    $codigo = $_GET['cliente'];
                }else{
                    $codigo = $_SESSION['id_usuario'];
                }
                
                $query = mysql_query("SELECT logo_img FROM usuario WHERE id = $codigo");
                $array = @mysql_fetch_array($query);
                    
                $logo_img = $array['logo_img'];
                $logo_img_format = substr($logo_img,2);
                $logo_img_format = "http://".$_SERVER['SERVER_NAME']."/testes/novaintranetftr".$logo_img_format;	

                echo "<img src='$logo_img_format' border='0' width='142' height='67' />";	
            ?>
            </div>
            <div id="barra"></div>
            <div id="area_conteudo">
                <?php 
                    if(isset($_GET['cliente'])){
                        $codigo = $_GET['cliente'];
                    }else{
                        $codigo = $_SESSION['id_usuario'];
                    }
                    
                    $campos_query = "id, codigo, nome, descricao, url, id_usuario";
                    $final_query = "FROM arquivo WHERE id_usuario = $codigo AND exibir = 'sim'";
                    
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
                        $codigo = $array['codigo'];
                        $nome = $array['nome'];
                        $descricao = $array['descricao'];
                        $url = $array['url'];
                        $id_usuario = $array['id_usuario'];
                        
                        $nome_format = substr($nome,0,35);
                        $descricao_format = substr($descricao,0,30);
                        
                        $url_format = substr($url,2);
                        $url_format = "http://".$_SERVER['SERVER_NAME']."/testes/novaintranetftr".$url_format;
                        
                        echo "<table id='conteudo'>";
                        echo "<tr>";
                        echo "<td id='codigo'>".$codigo."</td>";
                        echo "<td id='nome'>".$nome_format."</td>";
                        echo "<td id='descricao'>".$descricao_format."</td>";
                        if(!(empty($url))){
                        echo "<td id='url'>"."<a href='$url_format'><img id='download' src='img/btn_download.png' border='0' title='Download'></a>"."</td>";
                        }else{
                        echo "<td id='url'>"."<a href='#'><img id='download' src='img/btn_download.png' border='0' title='Download'></a>"."</td>";		
                        }
                        echo "<td id='excluir'>"."
                        <form action='novaintranetftr.Controller/ExcluirArquivoController.php' method='post'>    
                        <input type='hidden' name='cod_arquivo' value='$id'/>
                        <input type='hidden' name='id_usuario' value='$id_usuario'/>
                        <input id='excluir_img' type='image' src='img/btn_excluir.png' width='65' height='20' title='Excluir'></form>"."</td>";
                        echo "<td id='atualizar'>"."<a href='atualizar-arquivo.php?arq=$id'><img id='editar_img' src='img/btn_editar.png' border='0' title='Editar'></a>"."</td>";
                        echo "</tr>";
                        echo "<tr><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td><td><hr style='border:1px solid #D8D8D8;' /></td></tr>";
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
                                        echo "<a title='in&iacute;cio' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/cliente.php?p=><strong>in&iacute;cio</strong> </a>";
                                }
                                if($menos >= 1) {
                                        $i = $_GET['p'] - 1;
                                        echo "<a title='Anterior' style='text-decoration:none;' href=http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/cliente.php?p=".($i)."><strong>anterior</strong> </a>";
                                }
                                for($i=$pagina; $i<$pagina+3; $i++) {
                                    if($i != $pagina) {
                                        echo " <a href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/cliente.php"."?p=".($i).">$i</a> <font color='#CCCCCC'>|</font>";
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
                                    
                                    echo " <a title='pr&oacute;xima' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/cliente.php"."?p=".($i)."> <strong>pr&oacute;xima</strong></a>";
                                }
                                if(($mais >= $pgs) || ($mais <= $pgs)) {
                                    echo " <a title='ultima p&aacute;gina' style='text-decoration:none;' href="."http://".$_SERVER['SERVER_NAME']."/testes/novaintranetFTR/cliente.php"."?p=".($pgs)."> ultima p&aacute;gina</a>";
                                }
                            }
                    echo "</div>";
                ?>
            </div>
            <div id="novo_altera_dados">
                <table>
                    <tr>
                        <?php
                        if(isset($_GET['cliente'])){
                            $codigo = $_GET['cliente'];
                            echo "<td><a href='cadastrar-arquivo.php?cliente=$codigo'><img src='img/btn_novo.png' border='0' /></a></td>";
                            echo "<td><a href='atualizar-usuario.php?cliente=$codigo'>Alterar dados de acesso</a></td>";
                        }else{
                            $codigo = $_SESSION['id_usuario'];
                            echo "<td><a href='cadastrar-arquivo.php'><img src='img/btn_novo.png' border='0' /></a></td>";
                            echo "<td><a href='atualizar-usuario.php'>Alterar dados de acesso</a></td>";
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>