<?php
 
date_default_timezone_set('America/Sao_Paulo');
 
function Logger($msg){
 
    //pega o path completo de onde esta executanto
    $caminho_atual = getcwd(); 

    //muda o contexto de execução para a pasta logs
    chdir("../logs");

    $data = date("d-m-y");
    $hora = date("H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    //Nome do arquivo:
    $arquivo = "logs/Logger_$data.txt";

    //Texto a ser impresso no log:
    $texto = "[$hora][$ip]> $msg \n";

    $manipular = fopen("$arquivo", "a+b");
    fwrite($manipular, $texto);
    fclose($manipular);

    //Volta o contexto de execução para o caminho em que estava antes
    chdir($caminho_atual);

}

?>
