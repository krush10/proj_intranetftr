<?php

function SqlInjection($var){

    $var = stripslashes($var);

    $var = mysql_real_escape_string($var) ;

    return $var;
    
}
?>
