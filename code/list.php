<?php

/* Establecemos conexión a MySQL */
include 'dbConnection.php';
$mysqli = openCon();
 
// Attempt select query execution
$sql = "SELECT * FROM users";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido</th>";
                echo "<th>Correo electrónico</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Liberamos query
        $result->free();
    } else{
        echo "No se ha encontrado ningún usuario.";
    }
} else{
    echo "ERROR: No se ha podido ejecutar la consula $sql. " . $mysqli->error;
}
 
// Cerramos conexión
CloseCon($mysqli);
?>