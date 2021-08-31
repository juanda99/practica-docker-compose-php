



<?php
    /* Establecemos conexión a MySQL */
    include 'dbConnection.php';
    $mysqli = openCon();
    
    // Preparamos el insert statement
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (?, ?, ?)";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables
        $stmt->bind_param("sss", $first_name, $last_name, $email);
        
        // Recogemos  parámetros
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        
        // Ejecutamos el prepared statement
        if($stmt->execute()){
            echo "El usuario se ha insertado correctamente.";
        } else{
            echo "ERROR: No se ha podido ejecutar la query: $sql. " . $mysqli->error;
        }
    } else{
        echo "ERROR: No se ha podido preparar la query: $sql. " . $mysqli->error;
    }
    
    // Cerramos statement
    $stmt->close();
    
    // Cerramos conexión
    CloseCon($mysqli);

?>