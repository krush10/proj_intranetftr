<?php 

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "intraftr_db";

//$host = "186.202.152.28";
//$usuario = "comunicacaomac9";
//$senha = "Krus2350";
//$banco = "comunicacaomac9";

$conn = mysql_connect($host,$usuario,$senha) or header("Location:login.php");

$db = mysql_select_db($banco,$conn);

?>
