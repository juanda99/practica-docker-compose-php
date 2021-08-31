<?php
/* Establecemos conexión a MySQL */
include 'dbConnection.php';
$pdo = openCon();
 
// ejecutamos query
try{
    $sql = "SELECT * FROM users";   
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "<th>Correo electrónico</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // liberamos
        unset($result);
    } else{
        echo "No existe ningún usuario";
    }
} catch(PDOException $e){
    die("ERROR: No se ha podido ejecutar $sql. " . $e->getMessage());
}
 
// Cerramos conexión
CloseCon($pdo);
?>