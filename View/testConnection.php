<?php 
    require_once("../Model/Connection.class.php");

    $conecta = new Connection();

    if($conecta->getInstance()){
        echo "Conexão Estabelecida! ";
    }


?>