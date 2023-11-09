<?php
//conexion a la base de datos (Usuarios)
//Variables

$host = "localhost";
$username = "root";
$password = "12345";
$database= "SILHOUETTE_db";

//Conexión

$con= mysqli_connect("$host","$username","$password","$database");

//Si hay algun error, se presenta el aviso propuesto

if(!$con)
{
    header("Location: ../errors/dberror.php");
    die();
}
?>