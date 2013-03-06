<?php session_start();
// Verifica se existe os dados da sessão de login

if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"])|| !isset($_SESSION["usuario_perfil"]))
{
    // Usuário não logado! Redireciona para a página de login
	
	echo "<script>location.href='login.php'</script>";

    exit;
}

?>