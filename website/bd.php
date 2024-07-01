<?php

$servidor = "localhost";
$baseDeDatos = "website";//Arreglar esto y investigar como recuperar el app en phpmyadmin
$usuario = "root";
$constraseña = "";

try{

    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$constraseña);
    

}catch(Exception $error){
    echo $error->getMessage();
}

?>