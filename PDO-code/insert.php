<?php
/* Establecemos conexión a MySQL */
include 'dbConnection.php';
$pdo = openCon();
 
// codigo de query  para  insertar
try{
    // preparamos el insert statement
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $stmt = $pdo->prepare($sql);
    
    // bind de parametros
    $stmt->bindParam(':first_name', $_REQUEST['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(':last_name', $_REQUEST['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $_REQUEST['email'], PDO::PARAM_STR);
    
    // ejecutamos  prepared statement
    $stmt->execute();
    echo "El usuario se ha insertado correctamente.";
} catch(PDOException $e){
    die("ERROR: No se ha podido preparar/ejecutar la query: $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Cerramos conexión
CloseCon($pdo);
?>