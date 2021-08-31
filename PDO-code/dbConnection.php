<?php

  function openCon () {

    // Cogemoos variables de conexión  del entorno,  para pasarlas vía docker cli o a través de
    // un fichero env y docker-compose

    $dbHost = 'db';
    $dbName = getenv('MYSQL_DATABASE');
    $dbUser = getenv('MYSQL_USER');
    $dbPass = getenv('MYSQL_PASSWORD');


    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    try{
        $pdo = new PDO("mysql:host=db;dbname=$dbName", $dbUser, $dbPass);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: No se ha podido conectar. " . $e->getMessage());
    }

    // si todo correcto, devolvemos conexión para operar
    return $pdo;

  }

  function CloseCon($pdo)
  {
    unset($pdo);
  }

?>