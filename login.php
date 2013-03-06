<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mobile_login.css" media="all and (max-device-width : 480px)">
    <link rel="stylesheet" type="text/css" href="css/style_login.css" media="all and (min-width:481px)">
    <link rel="SHORTCUT ICON" href="img/icon.ico" />
    <title>Login - IntranetFTR</title>
    <script type="text/javascript">  
	function limpar(campo){  
		if (campo.value == campo.defaultValue){  
			campo.value = "";
			campo.style.color = "#666666";  
		} 
	}  
	  
	function escrever(campo){  
		if (campo.value == ""){  
			campo.value = "Nome";
			campo.style.color = "#666666";  
		}  
	}
	
	function limpar_senha(campo){  
		if (campo.value == campo.defaultValue){  
			campo.value = "";
			campo.style.color = "#666666";  
		} 
	}  
	  
	function escrever_senha(campo){  
		if (campo.value == ""){  
			campo.value = "12345";
			campo.style.color = "#666666";  
		}  
	}
    </script>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="corpo">
        <div id="corpo_margin">
            <div id="area_login">
                <form action="logando.php" method="post">
                <table>
                    <tr>
                        <td><strong>Usu&aacute;rio: </strong></td>
                        <td><input type="text" name="usuario" class="caixa" onfocus="limpar(this);" onblur="escrever(this);" value="Nome" /></td>
                    </tr>
                    <tr>
                        <td><strong>Senha: </strong></td>
                        <td><input type="password" name="senha" class="caixa" onfocus="limpar_senha(this);" onblur="escrever_senha(this);" value="12345" /></td>
                    </tr>
                </table>
                    <input type="image" src="img/btn_entrar.png" width="93" height="36" class="btn_entrar" />
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>
