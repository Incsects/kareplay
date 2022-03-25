<?php

try{
    $db = new PDO("mysql:host=host; dbname=dbname; charset=utf8", 'user', 'passwd');
    //echo "Data bağlantısı başarılı";
}

catch(Exception $e){
    echo $e ->getMessage();
}

?>