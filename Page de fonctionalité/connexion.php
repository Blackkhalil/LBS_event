<?php

 $host = 'localhost'; 
 $username = 'root';
 $password = '';
 $database = 'mydb';
 
 $con = new mysqli($host, $username, $password, $database);
 
 // Vérifier la connexion
 if ($con->connect_error) {
     die("Connexion échouée : " . $connexion->connect_error);

 } else {
    
    
 }
 
 ?>
 