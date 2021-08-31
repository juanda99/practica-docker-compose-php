<?php

  function openCon () {

    // Cogemoos variables de conexión  del entorno,  para pasarlas vía docker cli o a través de
    // un fichero env y docker-compose

    $dbHost = 'db';
    $dbName = getenv('MYSQL_DATABASE');
    $dbUser = getenv('MYSQL_USER');
    $dbPass = getenv('MYSQL_PASSWORD');

    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
  
    // Comprobamos conexión
    if($mysqli === false){
        die("ERROR: No se ha podido conectar. " . $mysqli->connect_error);
    }

    // si todo correcto, devolvemos conexión para operar
    return $mysqli;

  }

  function CloseCon($mysqli)
  {
    $mysqli -> close();
  }

?>