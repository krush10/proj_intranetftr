<div class="header">
    <div id="header_margin">
            <div id="logo">
                <script type="text/javascript">
                    if (screen.width<=480) 
                        document.write ("<img src='img/logo_320.png' />"); 
                    else 
                    if (screen.width>480) 
                        document.write ("<img src='img/logo.png' />");    
                </script>
            </div>
            <div id="header_usuario">
                <?php 
                    if(isset($_SESSION["id_usuario"])){
                        echo "<table>";
                            echo "<tr>";
                            if($_SESSION["usuario_perfil"] == "Administrador"){
                            echo "<td><a href='atualizar-usuario.php'>Editar</a></td>";    
                            }
                            echo "<td><a href='logoff.php'>Logoff</a></td>";
                            echo "</tr>";
                        echo "</table>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
